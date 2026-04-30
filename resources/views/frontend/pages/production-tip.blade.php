@extends('frontend.layouts.main')

@section('content')

<!-- HERO -->
<div class="relative h-[80vh] sm:h-[90vh] md:h-screen flex items-center justify-center bg-cover bg-center px-4"
    style="background-image: url('{{ asset('images/project1.jpg') }}');">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 text-white text-center max-w-4xl px-3 sm:px-6">

        <h1 class="uppercase leading-tight text-3xl sm:text-5xl md:text-7xl lg:text-[90px] font-bold">
            production tips
        </h1>

    </div>
</div>

<!-- CONTENT -->
<section class="bg-black text-white py-14 sm:py-20">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- TITLE -->
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-snug">
            5 Essential Event Production Tips for a Smooth Event
        </h1>

        <p class="mt-5 text-gray-300 leading-relaxed text-sm sm:text-base">
            Successful events depend on both planning and execution. Here are five essential tips to ensure your event runs smoothly and professionally.
        </p>

        <!-- TIP 1 -->
        <div class="mt-10 sm:mt-12">
            <h2 class="text-lg sm:text-xl font-semibold">
                1. Conduct Technical Rehearsals
            </h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base leading-relaxed">
                Always test your LED screens, sound systems, and lighting setup before the event begins.
            </p>
        </div>

        <!-- TIP 2 -->
        <div class="mt-8 sm:mt-10">
            <h2 class="text-lg sm:text-xl font-semibold">
                2. Prepare Backup Equipment
            </h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base leading-relaxed">
                Having backup systems ensures uninterrupted performance in case of technical issues.
            </p>
        </div>

        <!-- TIP 3 -->
        <div class="mt-8 sm:mt-10">
            <h2 class="text-lg sm:text-xl font-semibold">
                3. Follow a Clear Timeline
            </h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base leading-relaxed">
                Create a detailed event schedule and coordinate all teams to avoid delays.
            </p>
        </div>

        <!-- TIP 4 -->
        <div class="mt-8 sm:mt-10">
            <h2 class="text-lg sm:text-xl font-semibold">
                4. Work with Experienced Professionals
            </h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base leading-relaxed">
                An experienced production team ensures better coordination, faster problem-solving, and high-quality execution.
            </p>

            {{-- <a href="/why-us"
                class="mt-4 inline-block text-[#ED1C24] font-medium hover:underline text-sm sm:text-base">
                👉 Learn more about our Why Choose Us
            </a> --}}
            <p>👉 Learn more about our <a href="/why-us" class="text-red-500 underline">Why Choose Us</a></p>
        </div>

        <!-- TIP 5 -->
        <div class="mt-8 sm:mt-10">
            <h2 class="text-lg sm:text-xl font-semibold">
                5. Focus on Audience Experience
            </h2>
            <p class="mt-3 text-gray-300 text-sm sm:text-base leading-relaxed">
                Ensure clear visuals, balanced sound, and engaging lighting to create a memorable experience.
            </p>
        </div>

        <!-- CTA -->
        <div class="mt-12 border-t border-white/10 pt-8">

            {{-- <a href="/contact"
                class="inline-block bg-[#ED1C24] px-6 py-3 text-sm sm:text-base font-medium hover:opacity-90 transition">
                👉 Get in touch with our team
            </a> --}}
            <p>👉 <a href="/contact" class="text-red-500 underline">Get in touch with our team</a> to support your next event.
</p>

        </div>

    </div>
</section>

@endsection
