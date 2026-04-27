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

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>
