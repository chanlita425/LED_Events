@extends('backend.layout.app')

@section('title', 'Home Section')
@section('page-title', 'Home Section')
@section('page-subtitle', 'Manage homepage sections')

@section('content')

<div class="space-y-6">

    {{-- TOP HEADER --}}
    <div class="flex flex-col-2   justify-between ">

        {{-- LEFT --}}
        <div>

            <h1 class="text-2xl font-bold text-white">
                Home Sections
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Manage homepage section items dynamically
            </p>

        </div>

        {{-- RIGHT --}}
        <div class="mt-2">

            <a href="{{ route('admin.section-items.create', [
                    'page' => 'home'
                ]) }}"
               class="inline-flex items-center gap-2
                      px-5 py-3 rounded-xl
                      bg-orange-500 hover:bg-orange-600
                      text-white text-sm font-medium
                      transition-all duration-200">

                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 4v16m8-8H4"/>

                </svg>

                Create Item

            </a>

        </div>

    </div>


    {{-- SECTION NAVBAR --}}
    <div class="flex flex-wrap gap-2">

        {{-- ALL --}}
        <a href="{{ route('admin.sections.home_section') }}"
           class="px-4 py-2 rounded-xl text-sm transition-all duration-200

           {{ !request('section')
                ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20'
                : 'bg-[#0b1220] text-gray-300 border border-white/10 hover:bg-white/5'
           }}">

            All

        </a>


        {{-- DYNAMIC SECTIONS --}}
        @foreach($sections as $section)

            <a href="{{ route('admin.sections.home_section', [
                    'section' => $section
                ]) }}"
               class="px-4 py-2 rounded-xl text-sm transition-all duration-200

               {{ request('section') === $section
                    ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20'
                    : 'bg-[#0b1220] text-gray-300 border border-white/10 hover:bg-white/5'
               }}">

                {{ Str::headline($section) }}

            </a>

        @endforeach

    </div>


    {{-- SECTION ITEMS --}}
    <div class="space-y-6">

        @forelse($items as $sectionKey => $sectionItems)

            <div class="bg-[#0b1220]
                        border border-white/10
                        rounded-2xl
                        overflow-hidden">

                {{-- SECTION HEADER --}}
                <div class="px-6 py-4 border-b border-white/10
                            flex items-center justify-between">

                    <div>

                        <h2 class="text-lg font-semibold text-orange-400">
                            {{ Str::headline($sectionKey) }}
                        </h2>

                        <p class="text-xs text-gray-500 mt-1">
                            {{ $sectionItems->count() }} item(s)
                        </p>

                    </div>

                </div>


                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-white/5">

                            <tr>

                                <th class="px-6 py-4 text-left text-gray-400 font-medium">
                                    Content
                                </th>

                                <th class="px-6 py-4 text-left text-gray-400 font-medium">
                                    Image
                                </th>

                                <th class="px-6 py-4 text-left text-gray-400 font-medium">
                                    Sort
                                </th>

                                <th class="px-6 py-4 text-left text-gray-400 font-medium">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-right text-gray-400 font-medium">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($sectionItems as $item)

                                <tr class="border-t border-white/5 hover:bg-white/[0.02] transition">

                                    {{-- CONTENT --}}
                                    <td class="px-6 py-5">

                                        <div class="space-y-1">

                                            <h3 class="text-white font-medium">
                                                {{ $item->title_en ?: 'Untitled' }}
                                            </h3>

                                            @if($item->description_en)

                                                <p class="text-xs text-gray-500 leading-relaxed">
                                                    {{ Str::limit(strip_tags($item->description_en), 100) }}
                                                </p>

                                            @endif

                                        </div>

                                    </td>


                                    {{-- IMAGE --}}
                                    <td class="px-6 py-5">

                                        @if($item->image)

                                            <img
                                                src="{{ asset('storage/' . $item->image) }}"
                                                class="w-20 h-14 rounded-xl
                                                       object-cover
                                                       border border-white/10"
                                            >

                                        @else

                                            <div class="w-20 h-14 rounded-xl
                                                        border border-dashed border-white/10
                                                        flex items-center justify-center
                                                        text-[11px] text-gray-500">

                                                No Image

                                            </div>

                                        @endif

                                    </td>


                                    {{-- SORT --}}
                                    <td class="px-6 py-5 text-gray-300">
                                        {{ $item->sort_order }}
                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-6 py-5">

                                        @if($item->is_active)

                                            <span class="inline-flex items-center
                                                         px-2.5 py-1 rounded-lg
                                                         text-xs font-medium
                                                         bg-green-500/15
                                                         text-green-400">

                                                Active

                                            </span>

                                        @else

                                            <span class="inline-flex items-center
                                                         px-2.5 py-1 rounded-lg
                                                         text-xs font-medium
                                                         bg-red-500/15
                                                         text-red-400">

                                                Inactive

                                            </span>

                                        @endif

                                    </td>
                                    
                                    {{-- ACTIONS --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end gap-2">

                                            {{-- VIEW --}}
                                            <a href="{{ route('admin.section-items.show', $item->id) }}"
                                            class="px-3 py-1.5 rounded-lg
                                                    bg-purple-500/15
                                                    text-purple-400
                                                    hover:bg-purple-500/25
                                                    text-xs transition">

                                                View

                                            </a>


                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.section-items.edit', $item->id) }}"
                                            class="px-3 py-1.5 rounded-lg
                                                    bg-blue-500/15
                                                    text-blue-400
                                                    hover:bg-blue-500/25
                                                    text-xs transition">

                                                Edit

                                            </a>


                                            {{-- DELETE --}}
                                            <form action="{{ route('admin.section-items.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this item?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-3 py-1.5 rounded-lg
                                                            bg-red-500/15
                                                            text-red-400
                                                            hover:bg-red-500/25
                                                            text-xs transition">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @empty

            {{-- EMPTY STATE --}}
            <div class="bg-[#0b1220]
                        border border-white/10
                        rounded-2xl
                        p-14 text-center">

                <div class="space-y-3">

                    <div class="text-5xl">
                        📂
                    </div>

                    <h3 class="text-lg font-semibold text-white">
                        No Home Sections Found
                    </h3>

                    <p class="text-sm text-gray-500 max-w-md mx-auto">
                        Start by creating your first homepage section item.
                    </p>

                    <a href="{{ route('admin.section-items.create', [
                            'page' => 'home'
                        ]) }}"
                       class="inline-flex items-center gap-2
                              mt-4 px-5 py-3 rounded-xl
                              bg-orange-500 hover:bg-orange-600
                              text-white text-sm font-medium transition">

                        Create First Item

                    </a>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection