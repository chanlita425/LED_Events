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
                    LED Events is a full-service event production company providing LED screens, staging, sound, and
                    lighting solutions. Since 2012, we have been delivering reliable and high-quality event experiences
                    for projects of all sizes.
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
                    {{-- <li><a href="#">Products</a></li> --}}

                    {{-- PRODUCTS SECTION --}}
                    <li class="mt-4 font-bold text-white">Products</li>

                    <li>
                        <a href="https://fog-website.com" target="_blank"
                            class="text-gray-400 hover:text-white transition">
                            Fog & Effect
                        </a>
                    </li>

                    <li>
                        <a href="https://ledmedia.com.kh/" target="_blank"
                            class="text-gray-400 hover:text-white transition">
                            LED Display Sale
                        </a>
                    </li>

                    <li><a href="/contact">Contact</a></li>

                </ul>
            </div>


            {{-- right --}}
            <div class="flex flex-col  gap-10">

                <!-- CONTACT -->
                <div>
                    <p class="text-[20px] font-bold">Contact</p>

                    <div class="flex flex-col mt-6 gap-5">
                        <p class="flex items-start gap-3 leading-relaxed">
                            <i class="fa-solid fa-location-dot mt-1"></i>
                            #159A, Street 2011, Dei Thmey Village, Khmuonh Commune, Sen Sok District, Phnom Penh.
                        </p>

                        <p class="flex items-center gap-3">
                            <i class="fa-solid fa-phone"></i>
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
                            @if ($item->key_name === 'linkdin')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if ($item->key_name === 'whatsapp')
                                <a href="{{ $item->value_en }}"
                                    class="w-7 h-7 flex items-center justify-center bg-white rounded-full hover:bg-gray-200 transition">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            @endif
                        @endforeach

                    </div>
                </div>

                <div style="width: 100%; height: 200px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.757068260551!2d104.85095277590435!3d11.569265188631892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109510061cb408b%3A0x415db76a8186c438!2sLED%20Media!5e0!3m2!1sen!2skh!4v1777529761700!5m2!1sen!2skh"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>


            </div>
        </div>
    </div>

    <!-- BOTTOM BAR -->
    <div class="bg-black border-t border-gray-800">
        <div
            class="max-w-6xl mx-auto px-4 py-6
        flex flex-col md:flex-row items-center justify-between gap-4 text-white text-sm">

            <!-- LEFT -->
            <div class="text-center md:text-left">
                <p>© <span id="year"></span> LED EVENTS.</p>
                <p class="text-gray-400">All rights reserved.</p>
            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-6">
                <p onclick="openPrivacy()" class="hover:underline text-gray-300 hover:text-white transition">
                    Privacy Policy
                </p>


            </div>

        </div>
    </div>

    <!-- PRIVACY MODAL -->
    <div id="privacyModal" class="fixed inset-0 bg-black/70 hidden flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-3xl h-[80vh] rounded-lg shadow-lg flex flex-col">

            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-xl font-bold">Privacy Policy</h2>
                <button onclick="closePrivacy()" class="text-2xl font-bold">✕</button>
            </div>

            <div class="p-6 overflow-y-auto text-black leading-relaxed">
                {!! $privacy->description_km ?? '' !!}
            </div>

        </div>
    </div>

</div>
<script>
    function openPrivacy() {
        const modal = document.getElementById('privacyModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closePrivacy() {
        const modal = document.getElementById('privacyModal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // click outside
    document.getElementById('privacyModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closePrivacy();
        }
    });
</script>
