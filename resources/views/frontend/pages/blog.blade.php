@php
    $activeType = request('type');
@endphp

@extends('frontend.layouts.main')

@section('content')
    <!-- HERO -->
    <div class="relative h-[100vh] flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('storage/' . $section->media_url)}}');">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 text-white text-center">
            <h1 class="uppercase leading-tight text-4xl sm:text-6xl md:text-7xl lg:text-[100px] font-bold">
                {{ $activeType ?? $section->title_en }}
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-center leading-relaxed">
                {{ $section->subtitle_en }}
            </p>
        </div>
    </div>

    <!-- BLOG LIST -->
    <div class="py-20 bg-black text-white">

        <div class="max-w-6xl mx-auto space-y-16">

            @forelse ($blog as $item)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-center">

                    @if ($loop->iteration % 2 == 1)
                        <img src="{{ $item->image ? Storage::url($item->image) : asset('images/no-photo.png') }}"
                            class="md:col-span-2 w-full h-[250px] object-cover">

                        <div class="flex flex-col gap-3">
                            <h2 class="text-2xl font-bold">{{ $item->title_en }}</h2>
                            <p class="mt-3 text-sm line-clamp-3">{{ $item->description_en }}</p>
                            <a href="{{ route('blog.show', $item->id) }}"
                                class="mt-4 border px-6 py-2 cursor-pointer w-fit">
                                Read More
                            </a>
                        </div>
                    @else
                        <div class="flex flex-col gap-3">
                            <h2 class="text-2xl font-bold">{{ $item->title_en }}</h2>
                            <p class="mt-3 text-sm line-clamp-3">{{ $item->description_en }}</p>
                            <a href="{{ route('blog.show', $item->id) }}"
                                class="mt-4 border px-6 py-2 cursor-pointer w-fit">
                                Read More
                            </a>
                        </div>

                        <img src="{{ $item->image ? Storage::url($item->image) : asset('images/no-photo.png') }}"
                            class="md:col-span-2 w-full h-[250px] object-cover">
                    @endif

                </div>

            @empty
                <p class="text-center">No articles found.</p>
            @endforelse

        </div>
    </div>
@endsection
