@extends('backend.layout.app')

@section('title', 'Blog Section')
@section('page-title', 'Blog Section')
@section('page-subtitle', 'Manage blog page sections')

@section('content')

<div class="space-y-6">

    {{-- TOP HEADER --}}
    <div class="flex flex-col-2 justify-between ">

        <div>
            <h1 class="text-2xl font-bold text-white">
                Blog Sections
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Manage blog page content blocks
            </p>
        </div>

        <div class="mt-2">
            <a href="{{ route('admin.section-items.create', [
                    'page' => 'blog',
                    'type' => 'blog'
                ]) }}"
               class="inline-flex items-center gap-2 px-5 py-3 rounded-xl
                      bg-orange-500 hover:bg-orange-600
                      text-white text-sm font-medium transition">

                + Create Blog Item
            </a>
        </div>

    </div>

    {{-- FILTER NAV --}}
    <div class="flex flex-wrap gap-2">

        {{-- ALL --}}
        <a href="{{ route('admin.sections.blog_section') }}"
           class="px-4 py-2 rounded-xl text-sm transition
           {{ !request('section')
                ? 'bg-orange-500 text-white'
                : 'bg-[#0b1220] text-gray-300 border border-white/10 hover:bg-white/5'
           }}">
            All
        </a>

        {{-- DYNAMIC SECTIONS --}}
        @foreach($sections as $section)

            <a href="{{ route('admin.sections.blog_section', [
                    'section' => $section
                ]) }}"
               class="px-4 py-2 rounded-xl text-sm transition
               {{ request('section') === $section
                    ? 'bg-orange-500 text-white'
                    : 'bg-[#0b1220] text-gray-300 border border-white/10 hover:bg-white/5'
               }}">

                {{ Str::headline($section) }}

            </a>

        @endforeach

    </div>

    {{-- CONTENT --}}
    <div class="space-y-6">

        @forelse($items as $sectionKey => $sectionItems)

            <div class="bg-[#0b1220] border border-white/10 rounded-2xl overflow-hidden">

                {{-- HEADER --}}
                <div class="px-6 py-4 border-b border-white/10">
                    <h2 class="text-lg font-semibold text-orange-400">
                        {{ Str::headline($sectionKey) }}
                    </h2>
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-white/5">
                            <tr>
                                <th class="px-6 py-4 text-left text-gray-400">Blog</th>
                                <th class="px-6 py-4 text-left text-gray-400">Image</th>
                                <th class="px-6 py-4 text-left text-gray-400">Sort</th>
                                <th class="px-6 py-4 text-left text-gray-400">Status</th>
                                <th class="px-6 py-4 text-right text-gray-400">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($sectionItems as $item)

                                <tr class="border-t border-white/5 hover:bg-white/[0.02]">

                                    {{-- BLOG INFO --}}
                                    <td class="px-6 py-5">
                                        <div class="text-white font-medium">
                                            {{ $item->title_en }}
                                        </div>

                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ Str::limit($item->description_en, 90) }}
                                        </div>
                                    </td>

                                    {{-- IMAGE --}}
                                    <td class="px-6 py-5">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                 class="w-20 h-14 object-cover rounded-xl border border-white/10">
                                        @else
                                            <span class="text-xs text-gray-500">No Image</span>
                                        @endif
                                    </td>

                                    {{-- SORT --}}
                                    <td class="px-6 py-5 text-gray-300">
                                        {{ $item->sort_order }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-6 py-5">
                                        @if($item->is_active)
                                            <span class="px-2 py-1 text-xs rounded bg-green-500/20 text-green-400">
                                                Active
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded bg-red-500/20 text-red-400">
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

                                            <a href="{{ route('admin.section-items.edit', $item->id) }}"
                                               class="px-3 py-1 text-xs rounded bg-blue-500/20 text-blue-400">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.section-items.destroy', $item->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete this blog?')">

                                                @csrf
                                                @method('DELETE')

                                                <button class="px-3 py-1 text-xs rounded bg-red-500/20 text-red-400">
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

            <div class="bg-[#0b1220] border border-white/10 rounded-2xl p-10 text-center text-gray-400">
                No blog items found.
            </div>

        @endforelse

    </div>

</div>

@endsection