<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <title>LED Events Cambodia | LED Display for Events, Supermarkets & Advertising</title>

    <meta name="description"
        content="LED Events provides high-quality LED screen rental and sales in Cambodia for events, concerts, exhibitions, supermarkets, and advertising displays. Reliable, bright, and professional LED display solutions.">

    <meta name="keywords"
        content="LED screen Cambodia, LED display rental, event LED screen, supermarket LED display, LED wall Cambodia, stage LED screen, advertising LED display, LED events production, LED screen Phnom Penh">

    <meta name="author" content="LED Events">

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    {{-- facebook & messanger --}}
    <meta property="og:title" content="LED Events Cambodia | LED Display Solutions">
    <meta property="og:description"
        content="Professional LED screen rental and sales for events, concerts, supermarkets, and advertising in Cambodia.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="LED Events Cambodia">
    <meta name="twitter:description"
        content="LED screen rental & sales for events, supermarkets, concerts, and advertising.">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">


    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen text-white bg-black">

    {{-- HEADER --}}
    @include('frontend.components.Header')

    {{-- PAGE CONTENT --}}
    <main class="flex-1 relative">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @if (!isset($minimalFooter))
        @include('frontend.components.Footer')
    @else
        @include('frontend.components.FooterMinimal')
    @endif

    {{-- 🔝 Scroll to Top Button --}}
    <div id="scrollTopBtn"
        class="fixed bottom-5 right-5 sm:bottom-20 sm:right-20 z-50 cursor-pointer hidden transition-all duration-300 hover:scale-110 "
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">

        <img src="{{ asset('icons/down-arrow.png') }}" alt="scroll top"
            class="w-12 h-auto invert brightness-0 rotate-180">
    </div>

    {{-- JS --}}
    <script>
        const scrollBtn = document.getElementById("scrollTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                scrollBtn.classList.remove("hidden");
            } else {
                scrollBtn.classList.add("hidden");
            }
        });
    </script>

</body>

</html>
