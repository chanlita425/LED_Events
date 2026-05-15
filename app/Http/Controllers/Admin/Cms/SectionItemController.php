<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\SectionItem;
use App\Models\Cms\MenuGroup;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionItemController extends Controller
{
    public function index(Request $request)
    {
        $query = SectionItem::query();

        if ($request->page_filter) {
            $query->where('page', $request->page_filter);
        }

        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%$search%")
                    ->orWhere('title_km', 'like', "%$search%")
                    ->orWhere('description_en', 'like', "%$search%")
                    ->orWhere('section_key', 'like', "%$search%")
                    ->orWhere('group_title', 'like', "%$search%")
                    ->orWhere('type', 'like', "%$search%");
            });
        }

        $items = $query->orderBy('page')
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('page');

        $menuGroups = MenuGroup::orderBy('sort_order')->get(['id', 'slug', 'name_en']);

        $sections = SectionItem::select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view('backend.page.cms.section-items.index', compact('items', 'menuGroups', 'sections'));
    }

    public function show(string $id)
    {
        $item = SectionItem::findOrFail($id);

        $backRoute = match ($item->page) {
            'home'     => route('admin.sections.home_section'),
            'services' => route('admin.sections.service_section'),
            'projects' => route('admin.sections.project_section'),
            'blog'     => route('admin.sections.blog_section'),
            'media'    => route('admin.sections.media_section'),
            'why_us'   => route('admin.sections.whyus_section'),
            default    => route('admin.section-items.index'),
        };

        return view(
            'backend.page.cms.section-items.show',
            compact('item', 'backRoute')
        );
    }

    public function create()
    {
        $pages = MenuGroup::orderBy('sort_order')->get();
        $groups = collect();

        $sectionKeys = SectionItem::whereNotNull('section_key')
            ->where('section_key', '!=', '')
            ->distinct()
            ->pluck('section_key');

        return view('backend.page.cms.section-items.create', compact('pages', 'groups', 'sectionKeys'));
    }

    public function getGroups($id)
    {
        $groups = Menu::where('menu_group_id', $id)
            ->orderBy('sort_order')
            ->get(['id', 'name_en']);

        return response()->json($groups);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_key'    => 'required|string|max:255',
            'component_type' => 'nullable|string|max:255',
            'group_title'    => 'nullable|string|max:255',
            'page'           => 'nullable|string|max:255',

            'title_en'       => 'nullable|string|max:255',
            'title_km'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_km' => 'nullable|string',

            'image'          => 'nullable|file|mimes:jpg,jpeg,png,gif,webp',
            'icon'           => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',

            'link'           => 'nullable|string|max:255',
            'button_text_en' => 'nullable|string|max:255',
            'button_text_km' => 'nullable|string|max:255',

            'sort_order'     => 'nullable|integer',
            'is_active'      => 'boolean',
            'type'           => 'nullable|string|max:255',
            'meta'           => 'nullable',
            'images'         => 'nullable|array|max:40',
            'images.*'       => 'file|mimes:jpg,jpeg,png,gif,webp',
        ]);

        // MAIN IMAGE
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('section-items', 'public');
        }

        // ICON
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('section-items/icons', 'public');
        }

        // GALLERY IMAGES (BEHIND THE SCENES)
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('section-items/gallery', 'public');
            }
        }
        $data['images'] = $images;

        $data['is_active'] = $request->boolean('is_active', true);

        // META JSON
        if (!empty($data['meta'])) {
            $decoded = json_decode($data['meta'], true);
            $data['meta'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        SectionItem::create($data); 

        // SMART REDIRECT BASED ON PAGE
        $page = $data['page'] ?? null;

        $redirectRoute = match ($page) {
            'home'     => 'admin.sections.home_section',
            'services' => 'admin.sections.service_section',
            'projects' => 'admin.sections.project_section',
            'blog'     => 'admin.sections.blog_section',
            'media'    => 'admin.sections.media_section',
            'why_us'   => 'admin.sections.why_us_section',
            default    => 'admin.section-items.index',
        };

        return redirect()
            ->route($redirectRoute)
            ->with('success', 'Item created successfully.');
    }

    public function edit(string $id)
    {
        $item = SectionItem::findOrFail($id);
        $pages = MenuGroup::orderBy('sort_order')->get();

        $groups = collect();

        if ($item->page) {
            $pageGroup = MenuGroup::where('slug', $item->page)->first();

            if ($pageGroup) {
                $groups = Menu::where('menu_group_id', $pageGroup->id)
                    ->orderBy('sort_order')
                    ->get(['id', 'name_en']);
            }
        }

        return view('backend.page.cms.section-items.edit', compact('item', 'pages', 'groups'));
    }

    public function update(Request $request, string $id)
    {
        $item = SectionItem::findOrFail($id);

        $data = $request->validate([
            'section_key'    => 'required|string|max:255',
            'component_type' => 'nullable|string|max:255',
            'group_title'    => 'nullable|string|max:255',
            'page'           => 'nullable|string|max:255',

            'title_en'       => 'nullable|string|max:255',
            'title_km'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_km' => 'nullable|string',

            'image'          => 'nullable|file|mimes:jpg,jpeg,png,gif,webp',
            'icon'           => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',

            'link'           => 'nullable|string|max:255',
            'button_text_en' => 'nullable|string|max:255',
            'button_text_km' => 'nullable|string|max:255',

            'sort_order'     => 'nullable|integer',
            'is_active'      => 'boolean',
            'type'           => 'nullable|string|max:255',
            'meta'           => 'nullable',
            'images'         => 'nullable|array',
            'images.*'       => 'file|mimes:jpg,jpeg,png,gif,webp',
            'remove_images'  => 'nullable|array',
            'remove_images.*'=> 'integer',
        ]);

        // MAIN IMAGE UPDATE
        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('section-items', 'public');
        }

        // ICON UPDATE
        if ($request->hasFile('icon')) {
            if ($item->icon) {
                Storage::disk('public')->delete($item->icon);
            }
            $data['icon'] = $request->file('icon')->store('section-items/icons', 'public');
        }

        // GALLERY — remove selected, append new
        $images   = $item->images ?? [];
        $toRemove = array_map('intval', $request->input('remove_images', []));

        if ($toRemove) {
            foreach ($toRemove as $index) {
                if (isset($images[$index])) {
                    Storage::disk('public')->delete($images[$index]);
                }
            }
            $images = array_values(array_filter($images,
                fn($k) => !in_array($k, $toRemove, true),
                ARRAY_FILTER_USE_KEY
            ));
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('section-items/gallery', 'public');
            }
        }

        $data['images'] = $images;

        $data['is_active'] = $request->boolean('is_active');

        // META
        if (!empty($data['meta'])) {
            $decoded = json_decode($data['meta'], true);
            $data['meta'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        $item->update($data); 

        // SMART REDIRECT AFTER UPDATE
        $page = $item->page ?? null;

        $redirectRoute = match ($page) {
            'home'     => 'admin.sections.home_section',
            'services' => 'admin.sections.service_section',
            'projects' => 'admin.sections.project_section',
            'blog'     => 'admin.sections.blog_section',
            'media'    => 'admin.sections.media_section',
            'why_us'   => 'admin.sections.why_us_section',
            default    => 'admin.section-items.index',
        };

        return redirect()
            ->route($redirectRoute)
            ->with('success', 'Item updated successfully.'); 
    }

    public function destroy(string $id)
    {
        $item = SectionItem::findOrFail($id);

        // SAVE PAGE BEFORE DELETE
        $page = $item->page;

        // DELETE MAIN IMAGE
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        // DELETE ICON
        if ($item->icon) {
            Storage::disk('public')->delete($item->icon);
        }

        // DELETE GALLERY
        if ($item->images) {
            foreach ($item->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        // DELETE ITEM
        $item->delete();

        // SMART REDIRECT
        $redirectRoute = match ($page) {
            'home'     => 'admin.sections.home_section',
            'services' => 'admin.sections.service_section',
            'projects' => 'admin.sections.project_section',
            'blog'     => 'admin.sections.blog_section',
            'media'    => 'admin.sections.media_section',
            'why_us'   => 'admin.sections.why_us_section',
            default    => 'admin.section-items.index',
        };

        return redirect()
            ->route($redirectRoute)
            ->with('success', 'Item deleted successfully.');
    }


    public function homeSections(Request $request)
    {
        $query = SectionItem::query()
            ->where('page', 'home');

        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        $items = $query
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section_key');

        $sections = SectionItem::where('page', 'home')
            ->select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view(
            'backend.page.cms.sections.home_section',
            compact('items', 'sections')
        );
    }

    public function serviceSections(Request $request)
    {
        $query = SectionItem::query()
            ->where('page', 'services');

        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        $items = $query
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section_key');

        $sections = SectionItem::where('page', 'services')
            ->select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view(
            'backend.page.cms.sections.service_section',
            compact('items', 'sections')
        );
    }

    public function projectSections(Request $request)
    {
        $query = SectionItem::query()
            ->where('page', 'projects');

        // filter section
        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        // filter status (same as index style)
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // search (same behavior as index)
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%$search%")
                ->orWhere('title_km', 'like', "%$search%")
                ->orWhere('description_en', 'like', "%$search%")
                ->orWhere('section_key', 'like', "%$search%");
            });
        }

        $items = $query
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section_key');

        $sections = SectionItem::where('page', 'projects')
            ->select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view(
            'backend.page.cms.sections.project_section',
            compact('items', 'sections')
        );
    }

    public function blogSections(Request $request)
    {
        $query = SectionItem::query()
            ->where('page', 'blog');

        // filter section
        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        // status filter
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // search
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%$search%")
                ->orWhere('title_km', 'like', "%$search%")
                ->orWhere('description_en', 'like', "%$search%")
                ->orWhere('section_key', 'like', "%$search%");
            });
        }

        $items = $query
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section_key');

        $sections = SectionItem::where('page', 'blog')
            ->select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view(
            'backend.page.cms.sections.blog_section',
            compact('items', 'sections')
        );
    }

    public function mediaSections(Request $request)
    {
        $query = SectionItem::query()
            ->where('page', 'media');

        // filter section
        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        // status filter
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // search
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%$search%")
                ->orWhere('title_km', 'like', "%$search%")
                ->orWhere('description_en', 'like', "%$search%")
                ->orWhere('section_key', 'like', "%$search%");
            });
        }

        $items = $query
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section_key');

        $sections = SectionItem::where('page', 'media')
            ->select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view(
            'backend.page.cms.sections.media_section',
            compact('items', 'sections')
        );
    }


    public function whyUsSections(Request $request)
    {
        $query = SectionItem::query()
            ->where('page', 'why-us');

        // filter section
        if ($request->section) {
            $query->where('section_key', $request->section);
        }

        // status filter
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // search
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%$search%")
                ->orWhere('title_km', 'like', "%$search%")
                ->orWhere('description_en', 'like', "%$search%")
                ->orWhere('section_key', 'like', "%$search%");
            });
        }

        $items = $query
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('section_key');

        $sections = SectionItem::where('page', 'why_us')
            ->select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view(
            'backend.page.cms.sections.whyus_section',
            compact('items', 'sections')
        );
    }

}
