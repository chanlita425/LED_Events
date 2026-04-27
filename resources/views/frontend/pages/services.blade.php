@php
    $activeType = request('type');
    // $isLeft = $loop->iteration % 2 == 1;
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
    <div
        class="py-30 relative overflow-hidden text-white
    bg-[radial-gradient(circle_at_center,_black_40%,_#1100FF33_100%)]">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl sm:text-3xl md:text-[40px] font-bold pb-10 sm:pb-16">
                What We Provide
            </h2>

            <div class=" space-y-16 px-5 ">



                @forelse ($service as $item)
                    @php
                        $isLeft = $loop->iteration % 2 == 1;
                    @endphp

                    <div id="{{ $item->link }}"
                        class="grid grid-cols-1 md:grid-cols-3 gap-10 items-center py-3 px-8 rounded-md border border-[#272727]
    {{ $isLeft ? 'bg-gradient-to-r from-white/10 to-black' : 'bg-gradient-to-r from-black to-white/10' }}">
                        @if ($isLeft)
                            {{-- IMAGE LEFT --}}
                            @if ($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title_en }}"
                                    class="md:col-span-2 w-full h-[276px] object-cover rounded-md"
                                    alt={{ $item->title_en }}>
                            @else
                                <div
                                    class="md:col-span-2 w-full h-[276px] bg-gray-800 flex items-center justify-center text-white text-sm">
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
                            {{-- IMAGE RIGHT --}}
                            <div>
                                <h2 class="text-2xl font-bold">{{ $item->title_en }}</h2>
                                <p class="mt-3 text-sm line-clamp-3">{{ $item->description_en }}</p>
                                <a href="/contact" class="mt-4 inline-block border px-6 py-2">
                                    Contact Us
                                </a>
                            </div>

                            @if ($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title_en }}"
                                    class="md:col-span-2 w-full h-[276px] object-cover rounded-md">
                            @else
                                <div
                                    class="md:col-span-2 w-full h-[276px] bg-gray-800 flex items-center justify-center text-white text-sm">
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

        {{-- why led event --}}
        <div class="relative xl:h-[100vh] flex items-center justify-center  overflow-hidden ">

            <!-- 🔵 Top glow, black bottom -->
            {{-- <div
                class="absolute w-[1400px] aspect-square rounded-full
           bg-[radial-gradient(circle_at_top,#1100FF_0%,#0E00D480_40%,rgba(0,0,0,0)_100%)]
           blur-3xl opacity-70">
            </div> --}}

            <div>
                <h2 class="text-2xl sm:text-3xl md:text-[40px] font-bold mt-30 sm:pb-16">
                    Why LED EVENTS
                </h2>

                {{-- responsive mobile --}}
                <div class="flex flex-col items-center gap-5 md:hidden my-30">

                    @foreach ($us as $item)
                        <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                            <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->title_en }}"
                                class="absolute top-5 right-5 w-[38.78px] h-auto filter brightness-0 invert" />
                            <p></p>
                            <p class="text-[20px]">{{ $item->title_en }}</p>
                            <p class="text-[12px] line-clamp-4">{{ $item->description_en }}</p>
                        </div>
                    @endforeach


                </div>

                {{-- responsive tablet --}}
                <div class="hidden md:block xl:hidden px-5 py-10">
                    <div class="max-w-6xl mx-auto flex flex-col">

                        {{-- ROW 1 --}}
                        <div class="grid grid-cols-3">
                            @foreach ($us->take(2) as $item)
                                <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                                    <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->title_en }}"
                                        class="absolute top-5 right-5 w-[38px] invert" />

                                    <p class="text-[20px]">{{ $item->title_en }}</p>
                                    <p class="text-[12px] line-clamp-4">{{ $item->description_en }}</p>
                                </div>

                                {{-- add empty space ONLY if not last item --}}
                                @if (!$loop->last)
                                    <div class="w-[239px] h-[239px]"></div>
                                @endif
                            @endforeach
                        </div>

                        {{-- ROW 2 (center single) --}}
                        <div class="grid grid-cols-3">

                            @if ($us->get(2))
                                <div class="w-[239px] h-[239px]"></div>
                                <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                                    <img src="{{ Storage::url($us->get(2)->icon) }}" alt="{{ $item->title_en }}"
                                        class="absolute top-5 right-5 w-[38px] invert" />

                                    <p class="text-[20px]">{{ $us->get(2)->title_en }}</p>
                                    <p class="text-[12px] line-clamp-4">{{ $us->get(2)->description_en }}</p>
                                </div>
                                <div class="w-[239px] h-[239px]"></div>
                            @endif
                        </div>

                        {{-- ROW 3 --}}
                        <div class="grid grid-cols-3">
                            @foreach ($us->skip(3)->take(2) as $item)
                                <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                                    <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->title_en }}"
                                        class="absolute top-5 right-5 w-[38px] invert" />

                                    <p class="text-[20px]">{{ $item->title_en }}</p>
                                    <p class="text-[12px] line-clamp-4">{{ $item->description_en }}</p>
                                </div>
                                <div class="w-[239px] h-[239px]"></div>
                            @endforeach
                        </div>

                    </div>
                </div>

                {{-- responsive 1280 up --}}
                <div class="hidden xl:block my-30">

                    {{-- ROW 1 (3 cards) --}}
                    <div class="grid grid-cols-5">
                        @foreach ($us->take(3) as $item)
                            <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                                <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->title_en }}"
                                    class="absolute top-5 right-5 w-[38px] invert" />

                                <p class="text-[20px]">{{ $item->title_en }}</p>
                                <p class="text-[12px] line-clamp-4">{{ $item->description_en }}</p>
                            </div>

                            @if (!$loop->last)
                                <div></div>
                            @endif
                        @endforeach
                    </div>

                    {{-- ROW 2 (next 2 cards centered style) --}}
                    <div class="grid grid-cols-5">

                        @php
                            $row2 = $us->skip(3)->take(2)->values();
                        @endphp

                        {{-- left empty --}}
                        <div></div>

                        {{-- card 1 (center-left) --}}
                        @if (isset($row2[0]))
                            <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                                <img src="{{ Storage::url($row2[0]->icon) }}" alt="{{ $item->title_en }}"
                                    class="absolute top-5 right-5 w-[38px] invert" />

                                <p class="text-[20px]">{{ $row2[0]->title_en }}</p>
                                <p class="text-[12px] line-clamp-4">{{ $row2[0]->description_en }}</p>
                            </div>
                        @else
                            <div></div>
                        @endif

                        {{-- middle empty --}}
                        <div></div>

                        {{-- card 2 (center-right) --}}
                        @if (isset($row2[1]))
                            <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                                <img src="{{ Storage::url($row2[1]->icon) }}" alt="{{ $item->title_en }}"
                                    class="absolute top-5 right-5 w-[38px] invert" />

                                <p class="text-[20px]">{{ $row2[1]->title_en }}</p>
                                <p class="text-[12px] line-clamp-4">{{ $row2[1]->description_en }}</p>
                            </div>
                        @else
                            <div></div>
                        @endif

                        {{-- right empty --}}
                        <div></div>

                    </div>

                </div>
            </div>
        </div>


        {{-- case example --}}
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl sm:text-3xl md:text-[40px] font-bold py-30 sm:pb-16">
                Case Example
            </h2>

            <div class="grid grid-cols-4 gap-3">
                {{-- card --}}
                @foreach ($case as $item)
                    <div class="p-5 rounded-md border border-white">
                        <img src="{{ $item->image ? Storage::url($item->image) : asset('images/no-image.jpg') }}"
                            alt="{{ $item->title_en }}" class="w-[247px] h-[248px]">
                        <div class="flex flex-col gap-3 pt-5">
                            <p class="text-[30px]">{{ str_pad($item->sort_order, 2, '0', STR_PAD_LEFT) }}</p>
                            <p class="font-bold text-[20px] capitalize line-clamp-1">{{ $item->title_en }}</p>
                            <p class="line-clamp-5">{{ $item->description_en }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>




@endsection
