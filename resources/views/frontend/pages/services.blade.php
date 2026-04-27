@php
    $activeType = request('type');
@endphp

@extends('frontend.layouts.main')

@section('content')

    <!-- HERO -->
    <div class="relative h-[100vh] flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('storage/' . $section->media_url) }}');">

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


    <!-- SERVICES LIST -->
    <div class="py-20 bg-black text-white">

        <div class="max-w-6xl mx-auto space-y-16 px-5">

            @forelse ($service as $item)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-center ">

                    @if ($loop->iteration % 2 == 1)
                        @if ($item->image)
                            <img src="{{ Storage::url($item->image) }}" class="md:col-span-2 w-full h-[250px] object-cover">
                        @else
                            <div
                                class="md:col-span-2 w-full h-[250px] bg-gray-800 flex items-center justify-center text-white text-sm">
                                No Image
                            </div>
                        @endif
                        <div>
                            <h2 class="text-2xl font-bold">{{ $item->title_en }}</h2>
                            <p class="mt-3 text-sm line-clamp-3">{{ $item->description_en }}</p>
                            <a href="/contact" class="mt-4 inline-block border px-6 py-2">
                                Contact Us
                            </a>
                        </div>
                    @else
                        <div>
                            <h2 class="text-2xl font-bold">{{ $item->title_en }}</h2>
                            <p class="mt-3 text-sm line-clamp-3">{{ $item->description_en }}</p>
                            <a href="/contact" class="mt-4 inline-block border px-6 py-2">
                                Contact Us
                            </a>
                        </div>

                        @if ($item->image)
                            <img src="{{ Storage::url($item->image) }}" class="md:col-span-2 w-full h-[250px] object-cover">
                        @else
                            <div
                                class="md:col-span-2 w-full h-[250px] bg-gray-800 flex items-center justify-center text-white text-sm">
                                No Image
                            </div>
                        @endif
                    @endif

                </div>

            @empty
                <p class="text-center">No services found.</p>
            @endforelse

        </div>
    </div>

@endsection
