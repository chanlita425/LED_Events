@extends('frontend.layouts.main')

@php
    $minimalFooter = true;
@endphp


@section('content')
    {{-- HERO SECTION --}}
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center px-4 pt-28 p-4 lg:py-40 lg:px-10"
        style="background-image: url('{{ asset('images/hero-section.jpg') }}');">

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 max-w-6xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 ">

            {{-- LEFT: FORM --}}
            <div class="bg-black p-5 sm:p-8">

                <div class="flex flex-col gap-5">
                    <p class="text-base sm:text-lg">Get in Touch</p>

                    <p class="text-3xl sm:text-5xl lg:text-[50px] leading-tight">
                        Let's Build Vision
                    </p>

                    <p class="text-sm sm:text-base text-gray-300">
                        Ready to start your project? Contact our team today for a free consultation and quote.
                        We are here to answer any questions you may have about our services.
                    </p>
                </div>

                <p class="my-6 text-xl sm:text-2xl lg:text-[30px] font-semibold">
                    Information
                </p>

                {{-- FORM --}}
                <form method="POST" action="{{ route('contact.store') }}" class="flex flex-col gap-3">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-5">
                        <input type="text" name="first_name" placeholder="First Name"
                            class="outline-none border border-white px-3 py-2 w-full bg-transparent text-white">

                        <input type="text" name="last_name" placeholder="Last Name"
                            class="outline-none border border-white px-3 py-2 w-full bg-transparent text-white">
                    </div>

                    <input type="email" name="email" placeholder="Email Address"
                        class="outline-none border border-white px-3 py-2 w-full bg-transparent text-white">

                    <select name="project_type" required
                        class="outline-none border border-white px-3 py-2 w-full bg-black text-gray-400">

                        <option value="" disabled selected hidden>Project Type</option>
                        <option value="concert_event">Concert Event</option>
                        <option value="corporate_event">Corporate Event</option>
                        <option value="festival_event">Festival Event</option>
                        <option value="outdoor_event">Outdoor Event</option>
                    </select>

                    <textarea name="message" rows="5" placeholder="Your Message"
                        class="w-full outline-none border border-white px-3 py-2 bg-transparent text-white"></textarea>

                    <button class="bg-white w-full text-black font-bold py-2 hover:bg-gray-200 transition">
                        Send Message
                    </button>

                </form>

            </div>

            {{-- RIGHT: CONTACT INFO --}}
            <div class="flex flex-col gap-5 text-center lg:text-left lg:py-10">

                <h1 class="text-4xl sm:text-6xl lg:text-[70px] font-bold">
                    Contact
                </h1>

                <p class="text-sm sm:text-base text-gray-200">
                    #159A, Street 2011, Dei Thmey Village, Khmuonh Commune, Sen Sok District, Phnom Penh.
                </p>

                <div class="text-sm sm:text-base text-gray-200 space-y-2">

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-phone"></i>
                        <span>015 999 235</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Info@ledevents.asia</span>
                    </div>

                </div>

                {{-- SOCIAL ICONS --}}
                {{-- <div class="flex justify-center  lg:justify-start">

                    <div class="flex items-center gap-3 sm:gap-4 text-black">

                        @foreach ($contact as $item)
                            @if ($item->key_name === 'youtube')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-square-youtube text-sm"></i>
                                </a>
                            @endif

                            @if ($item->key_name === 'facebook')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-facebook-f text-sm"></i>
                                </a>
                            @endif

                            @if ($item->key_name === 'tiktok')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-tiktok text-sm"></i>
                                </a>
                            @endif

                            @if ($item->key_name === 'instagram')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-instagram text-sm"></i>
                                </a>
                            @endif

                            @if ($item->key_name === 'telegram')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-telegram text-sm"></i>
                                </a>
                            @endif
                        @endforeach

                    </div>
                </div> --}}

                <div style="width: 100%; height: 400px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.757068260551!2d104.85095277590435!3d11.569265188631892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109510061cb408b%3A0x415db76a8186c438!2sLED%20Media!5e0!3m2!1sen!2skh!4v1777529761700!5m2!1sen!2skh"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>


            </div>

        </div>
    </div>
@endsection
