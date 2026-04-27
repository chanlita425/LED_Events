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

        $pageFilter    = $request->input('page_filter');
        $sectionFilter = $request->input('section');
        $statusFilter  = $request->input('status');
        $search        = $request->input('search');

        if ($pageFilter) {
            $query->where('page', $pageFilter);
        }

        if ($sectionFilter) {
            $query->where('section_key', $sectionFilter);
        }

        if ($statusFilter !== null && $statusFilter !== '') {
            $query->where('is_active', $statusFilter);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title_en',     'like', "%{$search}%")
                  ->orWhere('title_km',      'like', "%{$search}%")
                  ->orWhere('description_en','like', "%{$search}%")
                  ->orWhere('section_key',   'like', "%{$search}%")
                  ->orWhere('group_title',   'like', "%{$search}%")
                  ->orWhere('type',          'like', "%{$search}%");
            });
        }

        $items = $query->orderBy('page')
            ->orderBy('section_key')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('page');

        // filter dropdowns
        $menuGroups = MenuGroup::orderBy('sort_order')->get(['id', 'slug', 'name_en']);
        $sections   = SectionItem::select('section_key')->distinct()->orderBy('section_key')->pluck('section_key');

        return view('backend.page.cms.section-items.index', compact('items', 'menuGroups', 'sections'));
    }

    public function show(string $id)
    {
        $item = SectionItem::findOrFail($id);

        return view('backend.page.cms.section-items.show', compact('item'));
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

   // AJAX: GET MENUS BY MENU GROUP ID
    public function getGroups($id)
    {
        $groups = Menu::where('menu_group_id', $id)
            ->orderBy('sort_order')
            ->get(['id', 'name_en', 'menu_group_id']);

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
            'description_en' => 'nullable|string',
            'description_km' => 'nullable|string',

            'image'          => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'icon'           => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'link'           => 'nullable|string|max:255',

            'button_text_en' => 'nullable|string|max:255',
            'button_text_km' => 'nullable|string|max:255',

            'sort_order'     => 'nullable|integer',
            'is_active'      => 'boolean',
            'type'           => 'nullable|string|max:255',
            'meta'           => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('section-items', 'public');
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('section-items/icons', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        if (!empty($data['meta'])) {
            $decoded = json_decode($data['meta'], true);
            $data['meta'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        SectionItem::create($data);

        return redirect()->route('admin.section-items.index')
            ->with('success', 'Item created successfully.');
    }


    public function edit(string $id)
    {
        $item  = SectionItem::findOrFail($id);
        $pages = MenuGroup::orderBy('sort_order')->get();

        // Pre-load groups for the currently selected page
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
            'description_en' => 'nullable|string',
            'description_km' => 'nullable|string',
            'image'          => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'icon'           => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'link'           => 'nullable|string|max:255',
            'button_text_en' => 'nullable|string|max:255',
            'button_text_km' => 'nullable|string|max:255',
            'sort_order'     => 'nullable|integer',
            'is_active'      => 'boolean',
            'type'           => 'nullable|string|max:255',
            'meta'           => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('section-items', 'public');
        }

        if ($request->hasFile('icon')) {
            if ($item->icon) {
                Storage::disk('public')->delete($item->icon);
            }
            $data['icon'] = $request->file('icon')->store('section-items/icons', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        if (!empty($data['meta'])) {
            $decoded = json_decode($data['meta'], true);
            $data['meta'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        $item->update($data);

        return redirect()->route('admin.section-items.index')->with('success', 'Item updated.');
    }

    public function destroy(string $id)
    {
        $item = SectionItem::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.section-items.index')->with('success', 'Item deleted.');
    }
}
