@extends('frontend.layouts.main')


@section('content')
    {{-- HERO SECTION --}}
    @foreach ($section as $key => $items)
        @foreach ($items as $item)
            <div class="relative h-screen flex items-center justify-center bg-cover bg-center px-4"
                style="background-image: url('{{ asset('storage/' . $item->media_url) }}');">

                <div class="absolute inset-0 bg-black/50"></div>

                <div class="relative z-10 flex flex-col items-center text-white text-center">

                    {{-- <img src="{{ asset('images/logo.png') }}" alt="" class="w-10"> --}}

                    <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[90px] uppercase leading-tight font-bold">
                        {{ $item->title_en }}
                    </h1>

                    <p class="mt-4 max-w-2xl mx-auto text-center leading-relaxed">
                        {{ $item->subtitle_en }}
                    </p>

                    <div class="my-5 flex flex-col sm:flex-row gap-4 sm:gap-10">
                        <a href="/media#event_video"
                            class="border w-[183px] h-[44px] cursor-pointer flex items-center justify-center">
                            Explore More
                        </a>

                        <a href="/contact"
                            class="bg-black w-[183px] h-[44px] cursor-pointer flex items-center justify-center">
                            Contact Us
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    @endforeach

    {{-- youtube  --}}
    {{-- <div class="relative h-screen overflow-hidden flex items-center justify-center px-4">

        <!-- YOUTUBE BACKGROUND -->
        <div class="absolute inset-0 -z-10 overflow-hidden bg-black">

            <iframe class="w-[120vw] h-[120vh] scale-[1.2] pointer-events-none"
                src="https://www.youtube.com/embed/-wTLvPuFK7I?autoplay=1&mute=1&controls=0&loop=1&playlist=-wTLvPuFK7I&playsinline=1&rel=0&modestbranding=1&enablejsapi=1"
                frameborder="0" allow="autoplay; fullscreen" allow="autoplay" loading="lazy"></iframe>

        </div>

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- CONTENT -->
        <div class="relative z-10 flex flex-col items-center text-white text-center">

            <img src="{{ asset('images/logo.png') }}" class="w-10">

            <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[90px] uppercase">
                <span class="font-bold">led</span> events
            </h1>

            <p class="text-sm sm:text-base md:text-lg lg:text-[20px]">
                The Most Reliable Event Production
            </p>

            <p class="text-sm sm:text-base md:text-lg lg:text-[20px]">
                System in Cambodia
            </p>

        </div>

    </div> --}}


    {{-- why us --}}
    <div class="bg-black relative overflow-hidden px-5 bg-gradient-to-b from-[#1100FF]/30 to-black py-20">

        <!-- 🔵 Visible bottom glow -->
        {{-- <div
            class="absolute top-[-250px] -left-40
    w-[900px] aspect-square rounded-full
    bg-[radial-gradient(circle_at_left,#0E00D480_30%,rgba(0,0,0,0.95)_75%)]
    blur-2xl opacity-50 pointer-events-none">
        </div> --}}
        <div class="max-w-6xl mx-auto relative z-50">

            {{-- header --}}
            <div id="why-us" class="pt-30 grid grid-cols-1 md:grid-cols-3 items-center gap-5">

                <h2 class="text-2xl md:text-[40px] uppercase">
                    why led events
                </h2>

                <div class="md:col-span-2">
                    <p class="w-full h-1 rounded-full bg-white"></p>
                </div>

            </div>

            {{-- features --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 my-10">

                @foreach ($why_led as $item)
                    <div class="flex flex-col gap-2">
                        <p class="text-[15px]">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                        <p class="text-lg md:text-[20px] font-bold">{{ $item->title_en }}</p>
                        <p class="md:w-[270px] line-clamp-5">
                            {{ $item->description_en }}

                        </p>
                    </div>
                @endforeach

            </div>

            <p class="w-full h-1 rounded-full bg-white"></p>

        </div>

        {{-- services --}}
        <div id="services" class="mt-16 max-w-6xl mx-auto px-5 mt-30">
            <h2 class="text-2xl md:text-[40px] uppercase font-bold">
                Our LED Event Services
            </h2>

            <p class="text-sm md:text-base mt-3">
                Professional LED screen rental, stage production, lighting, and event display solutions in Cambodia.
            </p>
        </div>


        {{-- CAROUSEL --}}
        <div class="relative mt-10 max-w-6xl mx-auto px-5">

            <div class="relative mt-10 max-w-6xl mx-auto px-5">

                <!-- LEFT -->
                <button onclick="prevSlide()"
                    class="absolute left-5 sm:left-4 top-1/2 -translate-y-1/2 z-20
           xl:-left-16 2xl:-left-24
        w-10 h-10 flex items-center justify-center
        bg-white/80 text-black rounded-full cursor-pointer">
                    ‹
                </button>

                <!-- RIGHT -->
                <button onclick="nextSlide()"
                    class="absolute right-5 sm:right-4 top-1/2 -translate-y-1/2 z-20
           xl:-right-16 2xl:-right-24
        w-10 h-10 flex items-center justify-center
        bg-white/80 text-black rounded-full cursor-pointer">
                    ›
                </button>

                <!-- VIEWPORT -->
                <div class="overflow-hidden">
                    <div id="carousel" class="flex transition-transform duration-500 ease-in-out"></div>
                </div>

            </div>


        </div>

    </div>



    {{-- feature project --}}
    <div id="features" class="my-20">

        <!-- TITLE -->
        <h2 class="max-w-6xl mx-auto my-20 text-2xl sm:text-3xl md:text-[40px] px-5">
            Featured LED Event Projects
        </h2>

        <div class="flex flex-col gap-10">
            @foreach ($project as $item)
                <div class="relative w-full h-[300px] sm:h-[350px] md:h-[406px] bg-cover bg-center"
                    style="background-image: url('{{ asset('storage/' . $item->image)}}');">

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-black/50 flex items-center">

                        <div class="max-w-6xl mx-auto w-full px-5 sm:px-6 text-white">

                            {{-- odd = left, even = right --}}
                            <div
                                class="max-w-xl {{ $loop->iteration % 2 == 0 ? 'ml-auto text-right' : 'mr-auto text-left' }}">

                                <p class="text-lg sm:text-xl md:text-2xl font-bold">
                                    Project {{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}
                                </p>

                                <p class="mt-3 text-sm sm:text-base md:text-lg line-clamp-3">
                                    {{ $item->description_en }}
                                </p>

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

    {{-- how we work --}}
    <div id="how-we-work" class="max-w-6xl mx-auto px-4 sm:px-6">


        <!-- TITLE -->
        <h2 class="text-2xl sm:text-3xl md:text-[40px] font-bold pb-10 sm:pb-16">
            How We Work
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-10 pb-20">

            @foreach ($work as $item)
                <div class="space-y-3">
                    <p class="text-3xl sm:text-4xl font-bold">{{ $item->title_en }}</p>
                    <p class="text-sm sm:text-base leading-relaxed">
                        {{ $item->description_en }}
                    </p>
                </div>
            @endforeach


        </div>
    </div>

    <div>

        <!-- HERO -->
        {{-- <div class="relative h-[300px] sm:h-[400px] md:h-[500px] w-full bg-cover bg-center"
            style="background-image: url('{{ asset('images/article1.jpg') }}');">

            <div class="absolute inset-0 bg-black/50"></div>

            <div class="absolute inset-0 flex items-center justify-center text-white px-4">
                <p class="text-lg sm:text-2xl md:text-3xl text-center max-w-2xl">
                    The Most Reliable Event Production System in Cambodia
                </p>
            </div>
        </div> --}}
        <div class="relative w-full h-[300px] sm:h-[400px] md:h-[500px] overflow-hidden">

            {{-- VIDEO --}}
            <iframe
                src="https://www.youtube.com/embed/b4e4_R6W8jA?autoplay=1&mute=1&loop=1&playlist=b4e4_R6W8jA&controls=0&rel=0&playsinline=1"
                class="absolute inset-0 w-full h-full object-cover" frameborder="0" allow="autoplay; " allowfullscreen>
            </iframe>

            {{-- DARK OVERLAY --}}
            <div class="absolute inset-0 bg-black/50"></div>

            {{-- TEXT --}}
            <div class="absolute inset-0 flex items-center justify-center text-white px-4 z-10">

                <p class="text-lg sm:text-2xl md:text-3xl text-center max-w-2xl">
                    The Most Reliable Event Production System in Cambodia
                </p>

            </div>

        </div>

        <!-- GRID -->
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">

                @foreach ($projects as $item)
                    <!-- item -->
                    <div class="relative group overflow-hidden">
                        <img src="{{ asset('images/article1.jpg') }}"
                            class="w-full h-52 sm:h-56 md:h-60 object-cover transition-transform duration-300 group-hover:scale-110">

                        <!-- overlay -->
                        <div
                            class="absolute inset-0 bg-black/60
                    opacity-100 sm:opacity-0 sm:group-hover:opacity-100
                    transition duration-300 flex flex-col justify-end text-white p-4 cursor-pointer">

                            <p class="text-base sm:text-lg font-bold mb-1 sm:mb-2">
                                Project Title
                            </p>

                            <p class="text-xs sm:text-sm line-clamp-3 sm:line-clamp-4">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        </div>
                    </div>
                @endforeach



            </div>



        </div>

    </div>
@endsection

{{-- JS --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const mediaItems = @json($event)

        const container = document.getElementById("carousel");
        let currentIndex = 0;

        function getVisibleCards() {
            if (window.innerWidth < 640) return 1;
            if (window.innerWidth < 1024) return 2;
            return 3;
        }

        function renderCards() {
            container.innerHTML = "";

            mediaItems.forEach(item => {
                container.innerHTML += `
            <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
    <div class="bg-gradient-to-b from-[#383535] to-[#000000]
        p-5 border border-[#272727] rounded-md
        flex flex-col h-full"> <!-- IMPORTANT -->

        <img src="${item.image ? '/storage/' + item.image : '/images/no-image.jpg'}"
             class="rounded-md w-full h-48 object-cover">

        <div class="p-3 flex flex-col flex-1 text-white"> <!-- IMPORTANT -->

            <p class="font-bold">${item.title_en ?? ''}</p>

            <p class="text-sm mt-2 line-clamp-3">
                ${item.description_en ?? ''}
            </p>

            <div class="mt-auto"> <!-- PUSH BUTTON DOWN -->
                <a href="/media/${item.id}"
   class="mt-4 border px-6 py-2 text-sm cursor-pointer w-fit inline-block">
   Read More
</a>
            </div>

        </div>
    </div>
</div>
            `;
            });
        }

        function updateCarousel() {
            const visible = getVisibleCards();
            const itemWidth = 100 / visible;
            container.style.transform = `translateX(-${currentIndex * itemWidth}%)`;
        }

        window.nextSlide = function() {
            const visible = getVisibleCards();
            if (currentIndex < mediaItems.length - visible) {
                currentIndex++;
                updateCarousel();
            }
        }

        window.prevSlide = function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }

        window.addEventListener("resize", () => {
            currentIndex = 0;
            updateCarousel();
        });

        renderCards();
    });
</script>
