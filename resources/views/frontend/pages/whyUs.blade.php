@extends('frontend.layouts.main')

@section('content')
    <div class="relative h-screen flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('storage/' . $section->media_url)}}');">

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- CONTENT -->
        <div class="relative z-10 flex flex-col items-center gap-5 text-white text-center">

            <h1
                class="uppercase leading-tight
                   text-4xl sm:text-6xl md:text-7xl lg:text-[90px] xl:text-[120px]">
                <span class="font-bold">{{ $activeType ?? $section->title_en }}</span>
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-center leading-relaxed">
                {{ $section->subtitle_en }}
            </p>

            <a href="/contact" class="w-[183px] h-[44px] flex items-center justify-center cursor-pointer bg-black">
                Contact Us
            </a>

        </div>



    </div>

    <div class="relative xl:h-[100vh]  flex items-center justify-center overflow-hidden bg-black">

        <!-- 🔵 Top glow, black bottom -->
        <div
            class="absolute w-[1400px] aspect-square rounded-full
           bg-[radial-gradient(circle_at_top,#1100FF_0%,#0E00D480_40%,rgba(0,0,0,0)_100%)]
           blur-3xl opacity-70">
        </div>

        {{-- responsive mobile --}}
        <div class="flex flex-col items-center gap-5 md:hidden my-10">

            @foreach ($us as $item)
                <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                    <img src="{{ Storage::url($item->icon) }}"
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
                            <img src="{{ Storage::url($item->icon) }}" class="absolute top-5 right-5 w-[38px] invert" />

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
                            <img src="{{ Storage::url($us->get(2)->icon) }}"
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
                            <img src="{{ Storage::url($item->icon) }}" class="absolute top-5 right-5 w-[38px] invert" />

                            <p class="text-[20px]">{{ $item->title_en }}</p>
                            <p class="text-[12px] line-clamp-4">{{ $item->description_en }}</p>
                        </div>
                        <div class="w-[239px] h-[239px]"></div>
                    @endforeach
                </div>

            </div>
        </div>

        {{-- responsive 1280 up --}}
        <div class="hidden xl:block">

            {{-- ROW 1 (3 cards) --}}
            <div class="grid grid-cols-5">
                @foreach ($us->take(3) as $item)
                    <div class="w-[239px] h-[239px] bg-black flex flex-col justify-end p-5 gap-3 relative">
                        <img src="{{ Storage::url($item->icon) }}" class="absolute top-5 right-5 w-[38px] invert" />

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
                        <img src="{{ Storage::url($row2[0]->icon) }}" class="absolute top-5 right-5 w-[38px] invert" />

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
                        <img src="{{ Storage::url($row2[1]->icon) }}" class="absolute top-5 right-5 w-[38px] invert" />

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
@endsection
