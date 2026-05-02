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
            <a href="#" onclick="openPrivacy()" class="hover:underline text-gray-300 hover:text-white transition">
                Privacy Policy
            </a>


        </div>

    </div>

    <!-- PRIVACY MODAL -->
    <div id="privacyModal"
    class="fixed inset-0 bg-black/70 hidden flex items-center justify-center z-50">

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
document.getElementById('privacyModal').addEventListener('click', function (e) {
    if (e.target === this) {
        closePrivacy();
    }
});
</script>
