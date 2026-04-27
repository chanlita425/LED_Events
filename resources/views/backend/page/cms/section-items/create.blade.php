@extends('backend.layout.app')

@section('title', 'Create Section Item')
@section('page-title', 'Create Section Item')
@section('page-subtitle', 'Add new CMS item')

@section('content')

<div class="max-w-full mx-auto">

    <form action="{{ route('admin.section-items.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-gray-900  border-gray-800 rounded-xl p-6 space-y-5">

        @csrf

        {{-- PAGE + SECTION --}}
        <div class="grid grid-cols-2 gap-4 mb-4">

            {{-- PAGE --}}
            <div >
                <label class="text-xs text-gray-100">Page</label>

                <select id="pageSelect"
                        name="page"
                        class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl">

                    <option value="">Select Page</option>

                    @foreach($pages as $page)
                        <option value="{{ $page->slug }}" data-id="{{ $page->id }}">
                            {{ $page->name_en }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- SECTION KEY --}}
            <div>
                <label class="text-xs text-white">Section Key *</label>

                <div class="grid grid-cols-2 gap-3 mt-1">

                    {{-- SELECT EXISTING --}}
                    <select id="sectionSelect"
                            class="w-full  border  bg-gray-800 text-gray-400 p-2 rounded-xl">
                        <option value="">Select Existing</option>
                        @foreach($sectionKeys as $key)
                            <option value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>

                    {{-- INPUT SUBMITTED TO BACKEND --}}
                    <input type="text"
                        id="sectionInput"
                        name="section_key"
                        value="{{ old('section_key') }}"
                        placeholder="Or type new key..."
                        class="w-full border  bg-gray-800 text-gray-400 p-2 rounded-xl @error('section_key') border-red-500 @enderror">

                </div>

                @error('section_key')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- GROUP --}}
        <div class="mb-4">
            <label class="text-xs text-gray-100">Group (Menu)</label>

            <select id="groupSelect"
                    name="group_title"
                    class="w-full mt-1 border bg-gray-800 text-gray-400 p-2 rounded-xl">

                <option value="">Select Group</option>

            </select>
        </div>

        {{-- TYPE --}}
        <div class="grid grid-cols-2 gap-4 mt-4">

            <input type="text" name="component_type" placeholder="component_type ..."
                   class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

            <input type="text" name="type" placeholder="Type"
                   class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

        </div>

        
        <div class="grid grid-cols-2 gap-4 mt-4">

            {{-- TITLE --}}
            <input type="text" name="title_en" placeholder="Title EN"
                   class="border bg-gray-800 text-gray-400 px-2 rounded-xl">

            {{-- DESCRIPTION --}}
            <textarea name="description_en" placeholder="Description EN"
                class="w-full border bg-gray-800 text-gray-400  px-2 rounded-xl"></textarea>

        </div>


        <div class="grid grid-cols-2 gap-4 mt-4">
            {{-- IMAGE --}}
            <div class="">
                <label class="text-xs text-gray-100">Image</label>
                <input type="file" name="image"
                    class="w-full  border bg-gray-800 text-gray-400 p-2 rounded-xl">
            </div>

            {{-- ICON --}}
            <div class="">
                <label class="text-xs text-gray-100">Icon</label>
                <input type="file" name="icon"
                        accept="image/*,.svg"
                        class="w-full  border bg-gray-800 text-gray-400 p-2 rounded-xl">
            </div>
        </div>
    
        <div class="grid grid-cols-2 gap-4 mt-4">
            {{-- LINK --}}
            <input type="text" name="link" placeholder="Link"
                    class="border bg-gray-800 text-gray-400 p-2 rounded-xl">
    
            {{-- BUTTON --}}
            <input type="text" name="button_text_en" placeholder="Button EN"
                    class=" border bg-gray-800 text-gray-400 px-2 rounded-xl">
        </div>
      
       

    

        {{-- SORT + STATUS --}}
        <div class="grid grid-cols-2 gap-4 mb-4 mt-4">

            <input type="number" name="sort_order" placeholder="Sort Order"
                   class=" border bg-gray-800 text-gray-400 p-2 rounded-xl">

            <select name="is_active"
                    class=" border bg-gray-800 text-gray-400 p-2 rounded-xl">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </div>

        {{-- META --}}
        <div>
            <label class="text-xs text-gray-100">Meta (JSON)</label>
            <textarea name="meta"
                    class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl"
                    placeholder='{"key":"value"}'></textarea>
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-2 mt-4">

            <a href="{{ route('admin.section-items.index') }}"
               class="px-4 py-2 border rounded-xl bg-gray-700 text-white   hover:bg-gray-600">
                Cancel
            </a>

            <button class="px-4 py-2 m-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
                Create Item
            </button>

        </div>

    </form>

</div>

@endsection
@push('scripts')
<script>
// Section select → copy to input
document.getElementById('sectionSelect').addEventListener('change', function () {
    const input = document.getElementById('sectionInput');
    if (this.value) {
        input.value = this.value;
    }
});

document.getElementById('pageSelect').addEventListener('change', function () {

    let pageId = this.options[this.selectedIndex]?.dataset?.id;
    let groupSelect = document.getElementById('groupSelect');

    if (!pageId) {
        groupSelect.innerHTML = '<option value="">Select Group</option>';
        return;
    }

    groupSelect.innerHTML = '<option value="">Loading...</option>';

    fetch(`/admin/get-groups/${pageId}`)
        .then(res => res.json())
        .then(data => {

            groupSelect.innerHTML = '<option value="">Select Group</option>';

            data.forEach(group => {
                groupSelect.innerHTML += `<option value="${group.name_en}">${group.name_en}</option>`;
            });

        })
        .catch(() => {
            groupSelect.innerHTML = '<option value="">Select Group</option>';
        });
});
</script>
@endpush