<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function index()
    {
        $groups = MenuGroup::with(['menus' => function ($q) {
            $q->orderBy('sort_order');
        }])->orderBy('sort_order')->get();

        return view('backend.page.cms.menus.index', compact('groups'));
    }

    public function create()
    {
        $groups = MenuGroup::where('is_active', true)->orderBy('sort_order')->get();

        return view('backend.page.menus.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_group_id' => 'nullable|exists:menu_groups,id',
            'slug'          => 'required|string|max:255|unique:menus,slug',
            'name_en'       => 'required|string|max:255',
            'name_km'       => 'required|string|max:255',
            'route'         => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        Menu::create($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu item created.');
    }

    public function edit(string $id)
    {
        $menu   = Menu::findOrFail($id);
        $groups = MenuGroup::where('is_active', true)->orderBy('sort_order')->get();

        return view('backend.page.menus.edit', compact('menu', 'groups'));
    }

    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $data = $request->validate([
            'menu_group_id' => 'nullable|exists:menu_groups,id',
            'slug'          => 'required|string|max:255|unique:menus,slug,' . $menu->id,
            'name_en'       => 'required|string|max:255',
            'name_km'       => 'required|string|max:255',
            'route'         => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $menu->update($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu item updated.');
    }

    public function destroy(string $id)
    {
        Menu::findOrFail($id)->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu item deleted.');
    }
}
