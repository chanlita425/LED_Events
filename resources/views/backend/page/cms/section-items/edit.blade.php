@extends('backend.layout.app')

@section('title', 'Update Section Item')
@section('page-title', 'Update Section Item')
@section('page-subtitle', 'Edit CMS section item')

@section('content')

<div class="max-w-full mx-auto">

<form action="{{ route('admin.section-items.update', $item->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">

    @csrf
    @method('PUT')

    {{-- PAGE + SECTION --}}
    <div class="grid grid-cols-2 gap-4 mb-4">

        {{-- PAGE --}}
        <div>
            <label class="text-xs text-gray-100">Page</label>

            <select id="pageSelect"
                    name="page"
                    class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl">

                <option value="">Select Page</option>

                @foreach($pages as $page)
                    <option value="{{ $page->slug }}"
                            data-id="{{ $page->id }}"
                            {{ $item->page == $page->slug ? 'selected' : '' }}>
                        {{ $page->name_en }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- SECTION KEY --}}
        <div>
            <label class="text-xs text-white">Section Key *</label>

            <input type="text"
                   name="section_key"
                   value="{{ old('section_key', $item->section_key) }}"
                   class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl @error('section_key') border-red-500 @enderror"
                   placeholder="services, projects, why-us">
        </div>

    </div>

    {{-- GROUP --}}
    <div>
        <label class="text-xs text-gray-100">Group (Menu)</label>

        <select id="groupSelect"
                name="group_title"
                class="w-full mt-1 border bg-gray-800 text-gray-400 p-2 rounded-xl">

            <option value="">Select Group</option>

            @foreach($groups as $group)
                <option value="{{ $group->name_en }}"
                        {{ $item->group_title == $group->name_en ? 'selected' : '' }}>
                    {{ $group->name_en }}
                </option>
            @endforeach

        </select>
    </div>

    {{-- TYPE --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="text"
               name="component_type"
               value="{{ old('component_type', $item->component_type) }}"
               placeholder="component_type..."
               class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

        <input type="text"
               name="type"
               value="{{ old('type', $item->type) }}"
               placeholder="Type"
               class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

    </div>

    {{-- TITLE + DESCRIPTION --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="text"
               name="title_en"
               value="{{ old('title_en', $item->title_en) }}"
               placeholder="Title EN"
               class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

        <textarea name="description_en"
                  placeholder="Description EN"
                  class="border bg-gray-800 text-gray-400 p-2 rounded-xl">{{ old('description_en', $item->description_en) }}</textarea>

    </div>

    {{-- IMAGE + ICON --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <div>
            <label class="text-xs text-gray-100">Image</label>
            <input type="file" name="image"
                   class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl">

            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}"
                     class="h-16 mt-2 rounded border border-gray-700">
            @endif
        </div>

        <div>
            <label class="text-xs text-gray-100">Icon</label>
            <input type="file" name="icon"
                   class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl">

            @if($item->icon)
                <img src="{{ asset('storage/' . $item->icon) }}"
                     class="h-10 mt-2 rounded border border-gray-700">
            @endif
        </div>

    </div>

    {{-- LINK + BUTTON --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="text"
               name="link"
               value="{{ old('link', $item->link) }}"
               placeholder="Link"
               class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

        <input type="text"
               name="button_text_en"
               value="{{ old('button_text_en', $item->button_text_en) }}"
               placeholder="Button EN"
               class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

    </div>

    {{-- SORT + STATUS --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $item->sort_order) }}"
               placeholder="Sort Order"
               class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

        <select name="is_active"
                class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

            <option value="1" {{ $item->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Inactive</option>

        </select>

    </div>

    {{-- META --}}
    <div class="mt-4">
        <label class="text-xs text-gray-100">Meta (JSON)</label>

        <textarea name="meta"
                  class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl"
                  placeholder='{"key":"value"}'>{{ $item->meta ? json_encode($item->meta) : '' }}</textarea>
    </div>

    {{-- ACTION --}}
    <div class="flex justify-end gap-2">

        <a href="{{ route('admin.section-items.index') }}"
           class="px-4 py-2 border rounded-xl bg-gray-700 text-white hover:bg-gray-600">
            Cancel
        </a>

        <button class="px-4 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
            Update Item
        </button>

    </div>

</form>

</div>

@endsection