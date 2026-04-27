@extends('frontend.layouts.main')

@section('content')
    {{-- HERO --}}
    <div class="relative h-screen flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('storage/' . $section->media_url)}}');">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 flex flex-col items-center text-white text-center">


            <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[90px] font-bold">
               {{ $activeType ?? $section->title_en }}
            </h1>

           <p class="mt-4 max-w-2xl mx-auto text-center leading-relaxed">
                {{ $section->subtitle_en }}
            </p>

            <a href="/contact" class="bg-black w-[183px] h-[44px] flex items-center justify-center mt-5">
                Contact Us
            </a>
        </div>
    </div>


    {{-- EVENT VIDEOS --}}
    <div id="event_video" class="mt-20 max-w-6xl mx-auto px-5">
        <h1 class="text-2xl md:text-[40px] font-bold">
            Event Videos
        </h1>
    </div>


    {{-- CAROUSEL --}}
    <div class="relative mt-10 max-w-6xl mx-auto px-5">

        <!-- LEFT -->
        <button onclick="prevSlide()"
            class="absolute left-5 sm:left-4 top-1/2 -translate-y-1/2 z-20
           xl:-left-16 2xl:-left-24
           w-10 h-10 flex items-center justify-center
           bg-white/80 text-black rounded-full cursor-pointer transition">
            ‹
        </button>

        <!-- RIGHT -->
        <button onclick="nextSlide()"
            class="absolute right-5 sm:right-4 top-1/2 -translate-y-1/2 z-20
           xl:-right-16 2xl:-right-24
           w-10 h-10 flex items-center justify-center
           bg-white/80 text-black rounded-full cursor-pointer transition">
            ›
        </button>
        <!-- container -->
        <div class="overflow-hidden">
            <div id="carousel" class="flex transition-transform duration-500 ease-in-out"></div>
        </div>

    </div>

    {{-- gallery --}}
    <div id="gallery" class="mt-20 max-w-6xl mx-auto px-5">
        <div class="mt-20 max-w-6xl mx-auto px-5">
            <h1 class="text-2xl md:text-[40px] font-bold">
                Gallery
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-10">
            @foreach ($gallery as $item)
                <a href="{{ url('/media/' . $item->id) }}" class="relative group overflow-hidden block">

                    <img src="{{ $item->image ? Storage::url($item->image) : asset('images/no-image.jpg') }}"
                        class="w-full h-52 sm:h-56 md:h-60 object-cover transition-transform duration-300 group-hover:scale-110">

                    <!-- overlay -->
                    <div
                        class="absolute inset-0 bg-black/60
                opacity-0 group-hover:opacity-100
                transition duration-300 flex flex-col justify-end text-white p-4">

                        <p class="text-base font-bold mb-2">
                            {{ $item->title_en }}
                        </p>

                        <p class="text-sm line-clamp-3">
                            {{ $item->description_en }}
                        </p>
                    </div>

                </a>
            @endforeach
        </div>
    </div>


    {{-- behind the scenes --}}
    <div id="behind_the_scenes" class="mt-20 max-w-6xl mx-auto px-5">
        <div class="mt-20 max-w-6xl mx-auto px-5">
            <h1 class="text-2xl md:text-[40px] font-bold">
                Behind the Scenes
            </h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
    @foreach($behind as $item)
        <a href="{{ url('/media/'.$item->id) }}"
           class="relative group overflow-hidden block">

            <img src="{{ $item->image ? Storage::url($item->image) : asset('images/no-image.jpg') }}"
                class="w-full h-60 object-cover transition-transform duration-300 group-hover:scale-110">

            <!-- overlay -->
            <div class="absolute inset-0 bg-black/60
                opacity-0 group-hover:opacity-100
                transition duration-300 flex flex-col justify-end text-white p-4">

                <p class="text-lg font-bold mb-2">
                    {{ $item->title_en }}
                </p>

                <p class="text-sm line-clamp-3">
                    {{ $item->description_en }}
                </p>
            </div>

        </a>
    @endforeach
</div>
    </div>


    {{-- JS --}}
    <script>
        const mediaItems = @json($event);

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
            const percent = 100 / visible;
            container.style.transform = `translateX(-${currentIndex * percent}%)`;
        }

        function nextSlide() {
            const visible = getVisibleCards();
            if (currentIndex < mediaItems.length - visible) {
                currentIndex++;
                updateCarousel();
            }
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }

        window.addEventListener('resize', () => {
            currentIndex = 0;
            updateCarousel();
        });

        renderCards();
    </script>
@endsection
