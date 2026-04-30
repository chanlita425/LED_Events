@extends('frontend.layouts.main')

@section('content')
    {{-- HERO --}}
    <div class="relative h-[80vh] sm:h-[90vh] md:h-screen flex items-center justify-center bg-cover bg-center px-4"
        style="background-image: url('{{ asset('images/project1.jpg') }}');">

        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 text-white text-center max-w-4xl px-2 sm:px-6">

            <h1 class="uppercase text-3xl sm:text-5xl md:text-7xl lg:text-[90px] font-bold leading-tight">
                event guides
            </h1>

            <p class="mt-4 sm:mt-6 text-sm sm:text-base md:text-lg text-gray-200 max-w-2xl mx-auto">
                Insights and strategies to help you plan successful events in Cambodia
            </p>

        </div>
    </div>

    {{-- CONTENT --}}
    <section class="bg-black text-white py-14 sm:py-20">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- TITLE --}}
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-[40px] font-bold uppercase leading-snug">
                How to Plan a Successful Event in Phnom Penh
            </h2>

            <p class="mt-5 sm:mt-6 text-gray-300 leading-relaxed text-sm sm:text-base">
                Planning a successful event in Phnom Penh requires careful preparation, the right technology, and a reliable
                production partner. Whether you are organizing a concert, corporate event, or outdoor festival, having a
                structured plan is essential to ensure smooth execution.
            </p>

            {{-- SECTION 1 --}}
            <div class="mt-10 sm:mt-12">
                <h3 class="text-lg sm:text-xl font-semibold">
                    Define Your Event Objectives
                </h3>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    Start by identifying your event goals, target audience, and expected attendance. This helps determine
                    your venue, budget, and technical requirements such as <span class="font-bold">LED screens, sound
                        systems, and stage setup.</span>
                </p>
            </div>

            {{-- SECTION 2 --}}
            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-semibold">
                    Choose the Right Event Production Partner
                </h3>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    Working with an experienced team ensures that every aspect—from <span class="font-bold">LED display to
                        lighting and sound</span>—is professionally managed. A trusted partner will handle planning,
                    installation, and live operation.
                </p>

                <p>👉 Learn more about our <a href="/services" class="text-red-500 underline">Event Services</a></p>
                <p> 👉 Explore our <a href="/services" class="text-red-500 underline">Projects</a></p>
            </div>

            {{-- SECTION 3 --}}
            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-semibold">
                    Plan Technical Setup Early
                </h3>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    Ensure proper positioning of LED screens, lighting, and audio systems to maximize audience engagement. Conduct rehearsals and technical checks before the event day.
                </p>
            </div>

            {{-- SECTION 4 --}}
            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-semibold">
                    Ensure Smooth Execution
                </h3>

                <p class="mt-3 text-gray-300 leading-relaxed text-sm sm:text-base">
                    Coordination between teams is key. A structured workflow and backup systems help avoid delays
                    and technical issues.
                </p>

                👉 <a href="/contact" class="text-red-500 underline">Contact us today</a> to plan your next event with confidence.
            </div>

        </div>
    </section>


@endsection
