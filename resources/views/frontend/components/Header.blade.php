<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LED Events</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .nav-link {
            position: relative;
            display: inline-block;
            padding: 0 10px;
        }

        /* center underline */
        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -17px;
            height: 2px;
            width: 0;
            background: white;
            transition: 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- MOBILE MENU PANEL -->
    <div id="mobileMenu"
        class="fixed top-0 right-0 w-full h-full bg-white z-100 translate-x-full transition-transform duration-300">

        <!-- CLOSE BUTTON -->
        <div class="absolute top-5 right-5">
            <button onclick="toggleMenu()" class="text-2xl text-black">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>



        <!-- HEADER -->
        <div class="flex items-center justify-between p-5 border-b">
            <p class="font-bold text-xl">Menu</p>
            <button onclick="toggleMenu()" class="text-2xl">✕</button>
        </div>

        <!-- CONTENT -->
        <div class="p-6 space-y-8 text-black">

            <!-- HOME -->
            <div>
                <button onclick="toggleSub('home-menu')" class="text-3xl font-bold w-full text-left">
                    Home
                </button>

                <div id="home-menu" class="submenu hidden mt-4 flex flex-col gap-3 text-lg pl-3">
                    <a href="/#why-us">Why Us</a>
                    <a href="/#services">Our Service</a>
                    <a href="/#features">Features</a>
                    <a href="/#how-we-work">How We Work</a>
                </div>
            </div>

            <!-- SERVICES -->
            <div>
                <button onclick="toggleSub('services-menu')" class="text-3xl font-bold w-full text-left">
                    Services
                </button>

                <div id="services-menu" class="submenu hidden mt-4 flex flex-col gap-3 text-lg pl-3">

                    <a href="{{ route('services') }}">All Services</a>

                    <a href="{{ route('services', ['type' => 'LED Screen']) }}">
                        LED Screen Retail
                    </a>

                    <a href="{{ route('services', ['type' => 'Stage']) }}">
                        Stage Rental
                    </a>

                    <a href="{{ route('services', ['type' => 'Lighting']) }}">
                        Lighting Production
                    </a>

                </div>
            </div>

            <!-- PROJECTS -->
            <div>
                <button onclick="toggleSub('projects-menu')" class="text-3xl font-bold w-full text-left">
                    Projects
                </button>

                <div id="projects-menu" class="submenu hidden mt-4 flex flex-col gap-3 text-lg pl-3">
                    <a href="/projects">All Projects</a>
                    <a href="/projects#concert">Concert</a>
                    <a href="/projects#corporate">Corporate</a>
                    <a href="/projects#festival">Festival</a>
                </div>
            </div>

            <!-- why us -->
            <a href="/why-us" class="text-3xl font-bold block" onclick="closeMenu()">
                Why Us
            </a>

            <div>
                <button onclick="toggleSub('media-menu')" class="text-3xl font-bold w-full text-left">
                    Media
                </button>

                <div id="media-menu" class="submenu hidden mt-4 flex flex-col gap-3 text-lg pl-3">
                    <a href="/media#event_video">Event Videos</a>
                    <a href="/media#gallery">Gallery</a>
                    <a href="/media#behind_the_scenes">Behind the Scenes</a>
                </div>
            </div>




            <!-- blog -->
            <div>
                <button onclick="toggleSub('blog-menu')" class="text-3xl font-bold w-full text-left">
                    Blog
                </button>

                <div id="blog-menu" class="submenu hidden mt-4 flex flex-col gap-3 text-lg pl-3">

                    <a href="{{ route('blog') }}">
                        All Articles
                    </a>

                    <a href="{{ route('blog', ['type' => 'Event Guides']) }}">
                        Event Guides
                    </a>

                    <a href="{{ route('blog', ['type' => 'LED Knowledge']) }}">
                        LED Knowledge
                    </a>

                    <a href="{{ route('blog', ['type' => 'Production Tips']) }}">
                        Production Tips
                    </a>

                </div>
            </div>


            <!-- product -->
            <div>
                <button onclick="toggleSub('products-menu')" class="text-3xl font-bold w-full text-left">
                    Products
                </button>

                <div id="products-menu" class="submenu hidden mt-4 flex flex-col gap-3 text-lg pl-3">
                    <a href="https://ledmedia.com.kh/" target="_blank" rel="noopener noreferrer">Fog & Effects</a>
                    <a href="https://ledmedia.com.kh/" target="_blank" rel="noopener noreferrer"
                        class="hover:opacity-70">
                        LED Display Sales
                    </a>
                </div>
            </div>

            <!-- CONTACT -->
            <a href="/contact" class="text-3xl font-bold block" onclick="closeMenu()">
                Contact
            </a>

        </div>
    </div>

    <div class="absolute top-0 left-0 w-full z-50">

        <div>
            <!-- HEADER TOP -->
            <div class="w-full lg:border-none  border-white border-b-1">
                <div class="max-w-6xl mx-auto py-5 px-6 flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="LED Events Logo" class="h-10">
                        <p class="uppercase "> <span class="font-bold">led</span> events </p>
                    </a>
                    {{-- hambuger menu --}}
                    <div class="block lg:hidden">
                        <i onclick="toggleMenu()" class="fa-solid fa-bars text-2xl cursor-pointer"></i>
                    </div>
                </div>

            </div>
            <!-- NAVBAR -->
            <div class="w-full bg-black border-b border-gray-800 relative hidden lg:block">
                <div class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
                    <!-- MENU -->
                    <ul class="flex items-center gap-6 text-white capitalize">
                        <!-- HOME (MEGA MENU) -->
                        <li class="group">
                            <a href="/" class="nav-link">home</a>
                            <!-- FLEX MEGA MENU -->
                            <div
                                class="absolute left-0 top-full w-full bg-black/95 border-t border-gray-800 opacity-70 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 ">
                                <div class="max-w-6xl mx-auto px-6 py-6 flex items-start gap-10 text-white">
                                    <a href="{{ route('home') }}#why-us" class="hover:opacity-70">Why Us</a>
                                    <a href="{{ route('home') }}#services" class="hover:opacity-70">Our
                                        Service</a>
                                    <a href="{{ route('home') }}#features" class="hover:opacity-70">Features</a>

                                    <a href="{{ route('home') }}#how-we-work" class="hover:opacity-70">How We
                                        Work</a>
                                </div>
                            </div>
                        </li>
                        <!-- OTHER LINKS -->
                        <li class="group">
                            <a class="nav-link" href="{{ route('services') }}">services</a>

                            <div
                                class="absolute left-0 top-full w-full bg-black/95 border-t border-gray-800 opacity-70 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">

                                <div class="max-w-6xl mx-auto px-6 py-6 flex items-start gap-10 text-white">

                                    <a href="{{ route('services') }}" class="hover:opacity-70">
                                        All Services
                                    </a>

                                    <a href="{{ route('services', ['type' => 'LED Screen']) }}"
                                        class="hover:opacity-70">
                                        LED Screen Retail
                                    </a>

                                    <a href="{{ route('services', ['type' => 'Stage']) }}" class="hover:opacity-70">
                                        Stage Rental
                                    </a>

                                    <a href="{{ route('services', ['type' => 'Lighting']) }}"
                                        class="hover:opacity-70">
                                        Lighting Production
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li class="group"><a class="nav-link" href="/projects">projects</a>
                            <div
                                class="absolute left-0 top-full w-full bg-black/95 border-t border-gray-800 opacity-70 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 ">
                                <div class="max-w-6xl mx-auto px-6 py-6 flex items-start gap-10 text-white">
                                    <a href="{{ route('projects') }}" class="nav-link">All Projects</a>
                                    <a href="{{ route('projects', ['type' => 'Concert Events']) }}" class="nav-link">
                                        Concert Events
                                    </a>
                                    <a href="{{ route('projects', ['type' => 'Corporate Events']) }}"
                                        class="nav-link">
                                        Corporate Events
                                    </a>
                                    <a href="{{ route('projects', ['type' => 'Festival Events']) }}"
                                        class="nav-link">
                                        Festival Events
                                    </a>
                                    <a href="{{ route('projects', ['type' => 'Outdoor Events']) }}" class="nav-link">
                                        Outdoor Events
                                    </a>
                                </div>
                            </div>
                        </li>
                        <a class="nav-link" href="/why-us">why us</a>

                        <li class="group"><a class="nav-link" href="/media">media</a>
                            <div
                                class="absolute left-0 top-full w-full bg-black/95 border-t border-gray-800 opacity-70 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 ">
                                <div class="max-w-6xl mx-auto px-6 py-6 flex items-start gap-10 text-white">
                                    <a href="/media#event_video" class="hover:opacity-70">Event Videos</a>
                                    <a href="/media#gallery" class="hover:opacity-70">Gallery</a>
                                    <a href="/media#behind_the_scenes" class="hover:opacity-70">Behind the Scenes</a>

                                </div>
                            </div>
                        </li>
                        <li class="group">
                            <a class="nav-link" href="/blog">blog</a>

                            <div
                                class="absolute left-0 top-full w-full bg-black/95 border-t border-gray-800 opacity-70 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">

                                <div class="max-w-6xl mx-auto px-6 py-6 flex items-start gap-10 text-white">

                                    <a href="{{ route('blog') }}" class="hover:opacity-70">
                                        All Articles
                                    </a>

                                    <a href="{{ route('blog', ['type' => 'Event Guides']) }}"
                                        class="hover:opacity-70">
                                        Event Guides
                                    </a>

                                    <a href="{{ route('blog', ['type' => 'LED Knowledge']) }}"
                                        class="hover:opacity-70">
                                        LED Knowledge
                                    </a>

                                    <a href="{{ route('blog', ['type' => 'Production Tips']) }}"
                                        class="hover:opacity-70">
                                        Production Tips
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li class="group">
                            <div class="nav-link cursor-pointer">products</div>
                            <div
                                class="absolute left-0 top-full w-full bg-black/95 border-t border-gray-800 opacity-70 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 ">
                                <div class="max-w-6xl mx-auto px-6 py-6 flex items-start gap-10 text-white">
                                    <a href="/why-us" class="hover:opacity-70">Fog & Effects </a>
                                    <a href="https://ledmedia.com.kh/" target="_blank" rel="noopener noreferrer"
                                        class="hover:opacity-70">
                                        LED Display Sales
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="group"><a class="nav-link" href="/contact">contact</a>
                        </li>
                    </ul>
                    <!-- RIGHT -->
                    <div class="flex items-center gap-4 text-black">
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

</body>
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        const isOpen = menu.classList.contains('translate-x-full');

        menu.classList.toggle('translate-x-full');

        // 🔒 lock/unlock body scroll
        if (isOpen) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    function closeMenu() {
        document.getElementById('mobileMenu')
            .classList.add('translate-x-full');

        document.body.style.overflow = ''; // unlock scroll

        document.querySelectorAll('.submenu').forEach(el => {
            el.classList.add('hidden');
        });
    }

    function toggleSub(id) {
        const target = document.getElementById(id);

        document.querySelectorAll('.submenu').forEach(el => {
            if (el !== target) el.classList.add('hidden');
        });

        target.classList.toggle('hidden');
    }

    // FIX: ensure links always scroll correctly
    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', function() {

            const href = this.getAttribute('href');

            closeMenu();

            // ONLY handle hash links
            if (href && href.startsWith('#')) {
                const id = href.replace('#', '');

                setTimeout(() => {
                    const target = document.getElementById(id);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }, 150);
            }

            // IMPORTANT: do NOT block normal routes like /blog?type=
        });
    });
</script>

</html>
