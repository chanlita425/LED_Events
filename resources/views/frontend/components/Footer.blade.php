<div class="bg-black pt-5 relative overflow-hidden">

    <!-- 🔵 GLOW (FIXED + PROPER ELLIPSE) -->
    {{-- <div
        class="absolute bottom-[-100px] right-0 -translate-x-1/2 translate-y-1/2
        w-[974px] h-[700px] rounded-full
        bg-[radial-gradient(ellipse_at_center,#1100FF_0%,#0E00D4_40%,rgba(0,0,0,0)_60%)]
        blur-3xl opacity-70 pointer-events-none z-0">
    </div> --}}

    <!-- MAIN CONTENT -->
    <div class="relative z-10 bg-gradient-to-t from-[#1100FF]/30 to-black py-20">

        <div
            class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
        gap-10 md:gap-5 lg:gap-2  px-3 md:px-10 lg:px-6 xl:px-6 text-white">
            {{-- left --}}
            <div>
                <div class="flex items-center justify-center lg:justify-normal gap-3">
                    <img src="{{ asset('images/logo.png') }}" class="w-[48px] h-[48px]">
                    <div class="uppercase text-[22px]">
                        <p class="font-bold">LED</p>
                        <p>Events</p>
                    </div>
                </div>

                <p class="mt-5 text-center lg:text-left">
                    LED EVENTS aims to build a high-performance, SEO-driven website to generate qualified
                    leads, build strong trust, support long-term content growth, position as a premium event
                    production company, and support expansion to Southeast Asia.
                </p>
            </div>

            {{-- center --}}
            <div class="flex flex-col md:items-center">
                <p class="text-[20px] font-bold">Company</p>
                <ul class="flex flex-col mt-5 gap-4">
                    <li><a href="/">Home</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/projects">Projects</a></li>
                    <li><a href="/why-us">Why Us</a></li>
                    <li><a href="/media">Media</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>


            {{-- right --}}
            <div class="flex flex-col justify-between gap-10">

                <!-- CONTACT -->
                <div>
                    <p class="text-[20px] font-bold">Contact</p>

                    <div class="flex flex-col mt-6 gap-5">
                        <p class="flex items-start gap-3 leading-relaxed">
                            <i class="fa-solid fa-location-dot mt-1"></i>
                            Phnom Penh
                        </p>

                        <p class="flex items-center gap-3">
                            <i class="fa-brands fa-telegram"></i>
                            015 999 235
                        </p>

                        <p class="flex items-center gap-3 break-all">
                            <i class="fa-solid fa-envelope"></i>
                            Info@ledevents.asia
                        </p>
                    </div>
                </div>

                <!-- SOCIAL -->
                <div>
                    <p class="text-[22px] font-semibold mb-4">Follow us on</p>

                    <div class="flex items-center gap-4 flex-wrap text-black">

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
                </div>

            </div>
        </div>
    </div>

    <!-- BOTTOM BAR -->
<div class="bg-black border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-4 py-6
        flex flex-col md:flex-row items-center justify-between gap-4 text-white text-sm">

        <!-- LEFT -->
        <div class="text-center md:text-left">
            <p>© <span id="year"></span> LED EVENTS.</p>
            <p class="text-gray-400">All rights reserved.</p>
        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-6">
            <a href="#" class="hover:underline text-gray-300 hover:text-white transition">
                Privacy Policy
            </a>

            <a href="#" class="hover:underline text-gray-300 hover:text-white transition">
                Terms of Service
            </a>
        </div>

    </div>
</div>

</div>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>
