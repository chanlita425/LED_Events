@extends('frontend.layouts.main')

@section('content')

    <!-- HERO -->
    <div class="relative h-screen w-full flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ Storage::url($project->image) }}');">

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Title -->
        <div class="relative z-10 text-center px-6">
            <h1 class="text-white text-4xl md:text-6xl font-bold capitalize">
                {{ $project->title_en }}
            </h1>
        </div>

    </div>

    <div class="max-w-4xl mx-auto py-20 text-white px-5">

        @foreach (explode("\n", $project->description_km) as $line)
            @if (trim($line))
                <p class="prose text-gray-300 text-lg leading-relaxed mb-4">
                    {!! $line !!}
                </p>
            @endif
        @endforeach
        <br>
        <br>
        @if (!empty($project->images))
            <div class="max-w-6xl mx-auto px-5 pb-20">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[200px]">

                    @foreach ($project->images as $index => $img)
                        <div
                            class="
                        overflow-hidden rounded-xl
                        {{ $index == 0 ? 'md:col-span-3 md:row-span-2' : '' }}
                        {{ $index == 1 ? 'md:col-span-2' : '' }}
                    ">
                            <img src="{{ Storage::url($img) }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                    @endforeach

                </div>

            </div>
        @endif

    </div>

@endsection
