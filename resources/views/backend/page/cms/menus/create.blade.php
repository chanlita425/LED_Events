@extends('backend.layout.app')

@section('title', isset($menu) ? 'Edit Menu' : 'Create Menu')
@section('page-title', isset($menu) ? 'Edit Menu' : 'Create Menu')
@section('page-subtitle', 'Manage system menu')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="px-5 py-4 border-b border-gray-800">
            <h2 class="text-white font-semibold">
                {{ isset($menu) ? 'Edit Menu' : 'Create Menu' }}
            </h2>
        </div>

        {{-- FORM --}}
        <form action="{{ isset($menu)
                ? route('admin.menus.update', $menu->id)
                : route('admin.menus.store') }}"
              method="POST">

            @csrf

            @if(isset($menu))
                @method('PUT')
            @endif

            <div class="p-5 space-y-4">

                {{-- GROUP --}}
                <div>
                    <label class="text-gray-400 text-xs">Menu Group</label>
                    <select name="menu_group_id"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">

                        <option value="">-- Select Group --</option>

                        @foreach($groups as $group)
                            <option value="{{ $group->id }}"
                                {{ isset($menu) && $menu->menu_group_id == $group->id ? 'selected' : '' }}>
                                {{ $group->name_en }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- NAME EN --}}
                <div>
                    <label class="text-gray-400 text-xs">Name (EN)</label>
                    <input type="text" name="name_en"
                        value="{{ $menu->name_en ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- NAME KM --}}
                <div>
                    <label class="text-gray-400 text-xs">Name (KM)</label>
                    <input type="text" name="name_km"
                        value="{{ $menu->name_km ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- SLUG --}}
                <div>
                    <label class="text-gray-400 text-xs">Slug</label>
                    <input type="text" name="slug"
                        value="{{ $menu->slug ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- ROUTE --}}
                <div>
                    <label class="text-gray-400 text-xs">Route</label>
                    <input type="text" name="route"
                        value="{{ $menu->route ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- SORT ORDER --}}
                <div>
                    <label class="text-gray-400 text-xs">Sort Order</label>
                    <input type="number" name="sort_order"
                        value="{{ $menu->sort_order ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- ACTIVE --}}
                <label class="flex items-center gap-2 text-gray-300 text-sm">
                    <input type="checkbox" name="is_active"
                        {{ isset($menu) && $menu->is_active ? 'checked' : '' }}>
                    Active
                </label>

                {{-- ACTIONS --}}
                <div class="flex justify-between pt-4 border-t border-gray-800">

                    <a href="{{ route('admin.menus.index') }}"
                       class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">
                        Back
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                        {{ isset($menu) ? 'Update Menu' : 'Create Menu' }}
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection