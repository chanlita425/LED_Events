@php
    $activeType = request('type');
@endphp
@extends('frontend.layouts.main')

<style>
    .nav-link {
        position: relative;
        display: inline-block;
        padding: 0 10px;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -8px;
        height: 2px;
        width: 0;
        background: black;
        transition: 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after {
        width: 100%;
    }
</style>

@section('content')
    <!-- HERO SECTION -->
    <header class="relative h-screen flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('storage/' . $section->media_url) }}');">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 flex flex-col items-center text-white text-center max-w-5xl">

            <h1 class="uppercase leading-tight text-4xl sm:text-6xl md:text-7xl lg:text-[100px]">
                <span class="font-bold">
                    {{ $activeType ?? $section->title_en }}
                </span>
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-center leading-relaxed">
                {{ $section->subtitle_en }}
            </p>

            <a href="/contact" class="mt-6 w-[183px] h-[44px] flex items-center justify-center bg-black">
                Contact Us
            </a>

        </div>
    </header>


    <!-- FILTER NAVIGATION -->
    <div class="bg-gradient-to-b from-[#1100FF]/30 to-black py-20">
        <nav class="max-w-6xl mx-auto my-30 px-5" aria-label="Project categories">

            <ul class="flex flex-wrap items-center justify-between gap-6 text-white text-[20px]">

                <li><a href="{{ route('projects') }}" class="nav-link">All Projects</a></li>

                <li><a href="{{ route('projects', ['type' => 'Concert Events']) }}" class="nav-link">Concert Events</a></li>

                <li><a href="{{ route('projects', ['type' => 'Corporate Events']) }}" class="nav-link">Corporate Events</a>
                </li>

                <li><a href="{{ route('projects', ['type' => 'Festival Events']) }}" class="nav-link">Festival Events</a>
                </li>

                <li><a href="{{ route('projects', ['type' => 'Outdoor Events']) }}" class="nav-link">Outdoor Events</a></li>

            </ul>
        </nav>
    </div>


    <!-- PROJECT LIST -->
    <main class="space-y-10">

        @foreach ($project as $index => $item)
            <article class="relative w-full h-[300px] sm:h-[350px] md:h-[406px] bg-cover bg-center"
                style="background-image: url('{{ Storage::url($item->image) }}');">

                <div class="absolute inset-0 bg-black/50 flex items-center">

                    <div
                        class="max-w-6xl mx-auto w-full px-5 sm:px-6
                {{ $index % 2 == 1 ? 'flex justify-end' : '' }}">

                        <div
                            class="max-w-xl text-white
                    {{ $index % 2 == 1 ? 'text-right' : 'text-left' }}">

                            <h2 class="text-lg sm:text-xl md:text-2xl font-bold capitalize">
                                {{ $item->title_en }}
                            </h2>

                            <p class="mt-3 text-sm sm:text-base md:text-lg line-clamp-3">
                                {{ $item->description_en }}
                            </p>

                            <a href="{{ url('/project/'.$item->id) }}"
                                class="inline-flex items-center justify-center mt-3 px-6 py-2 border border-white text-white ">
                                Read More
                            </a>
                        </div>



                    </div>

                </div>
            </article>
        @endforeach

    </main>


    <!-- CTA BUTTON -->
    @if (!request('all'))
        <div class="flex items-center justify-center">
            <a href="{{ route('projects', array_merge(request()->all(), ['all' => 1])) }}"
                class="w-[327px] h-[67px] border border-white my-20 flex items-center justify-center text-white">
                Find Out More
            </a>
        </div>
    @endif
@endsection
