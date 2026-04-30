@extends('frontend.layouts.main')

@section('content')
    <!-- HERO -->
    <div class="relative h-[80vh] sm:h-[90vh] md:h-screen flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('images/project1.jpg') }}');">

        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 text-white text-center max-w-4xl px-3 sm:px-6">

            <h1 class="uppercase leading-tight text-3xl sm:text-5xl md:text-7xl lg:text-[100px] font-bold">
                led knowledge
            </h1>

        </div>
    </div>

    <!-- CONTENT -->
    <section class="bg-black text-white py-14 sm:py-20">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- TITLE -->
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-snug">
                Why LED Screens Are Essential for Events in Cambodia
            </h1>

            <!-- INTRO -->
            <p class="mt-5 sm:mt-6 text-gray-300 leading-relaxed text-sm sm:text-base">
                In today’s event industry, <span class="font-bold">LED screens</span> have become a must-have solution for
                delivering impactful visuals.
                From concerts to corporate events in Phnom Penh, LED technology enhances audience engagement and overall
                experience.
            </p>

            <!-- SECTION 1 -->
            <div class="mt-10 sm:mt-12">
                <h2 class="text-lg sm:text-xl font-semibold text-white">
                    High Brightness & Visibility
                </h2>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    Unlike projectors, LED screens provide clear and bright visuals even in outdoor environments,
                    making them ideal for <span class="font-bold">festival and outdoor events</span>.
                </p>
            </div>

            <!-- SECTION 2 -->
            <div class="mt-8 sm:mt-10">
                <h2 class="text-lg sm:text-xl font-semibold text-white">
                    Flexible for Any Event Type
                </h2>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    LED screens can be customized in size and setup, making them suitable for:
                </p>

                <ul class="mt-3 list-disc pl-5 space-y-1 text-gray-300 text-sm sm:text-base">
                    <li>Concerts</li>
                    <li>Corporate presentations</li>
                    <li>Exhibitions</li>
                    <li>Outdoor events</li>
                </ul>

                {{-- <a href="/services#led-screen-rental"
                class="mt-4 inline-block text-[#ED1C24] font-medium hover:underline text-sm sm:text-base">
                👉 Discover our LED Screen Rental Services
            </a> --}}
                <p>👉 Discover our <a href="/services#led-screen-rental" class=" text-red-500 underline">LED Screen Rental
                        Services</a></p>
            </div>

            <!-- SECTION 3 -->
            <div class="mt-8 sm:mt-10">
                <h2 class="text-lg sm:text-xl font-semibold text-white">
                    Improve Audience Engagement
                </h2>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    High-quality visuals capture attention and keep audiences engaged throughout the event.
                    This is especially important for branding and live performances.
                </p>
            </div>

            <!-- SECTION 4 -->
            <div class="mt-8 sm:mt-10">
                <h2 class="text-lg sm:text-xl font-semibold text-white">
                    Reliable and Professional Setup
                </h2>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    With proper installation and technical support, LED systems ensure smooth performance without
                    interruptions.
                </p>
            </div>

            <!-- CTA -->
            <div class="mt-12 border-t border-white/10 pt-8 flex flex-col gap-3">

                {{-- <a href="/projects"
                class="text-[#ED1C24] font-medium hover:underline text-sm sm:text-base">
                👉 Check out our Recent Projects
            </a> --}}
                <p>👉 Check out our <a href="" class="text-red-500 underline">Recent Projects</a></p>

                {{-- <a href="/contact" class="text-[#ED1C24] font-medium hover:underline text-sm sm:text-base">
                    👉 Request a quotation for your next event
                </a> --}}
                <p>👉 <a href="/contact" class="text-red-500 underline">Request a quotation</a> for your next event</p>

            </div>

        </div>
    </section>
@endsection
