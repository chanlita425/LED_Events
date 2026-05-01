@extends('frontend.layouts.main')

@section('content')
    <!-- HERO -->
    <div class="relative h-[60vh] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ Storage::url($service->image) }}');">

        <div class="absolute inset-0 bg-black/60"></div>

        <h1 class="relative z-10 text-white text-4xl font-bold text-center px-4 capitalize">
            {{ $service->title_en }}
        </h1>

    </div>

    <div class="max-w-4xl mx-auto py-20 text-white px-5">

        @foreach (explode("\n", $service->description_en) as $line)
            @if (trim($line))
                <p class="prose text-gray-300 text-lg leading-relaxed mb-4">
                    {!! $line !!}
                </p>
            @endif
        @endforeach
        @if (!empty($service->images))
            <div class="max-w-6xl mx-auto px-5 pb-20">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[200px]">

                    @foreach ($service->images as $index => $img)
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
