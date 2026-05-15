


<aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-gray-900 border-r border-orange-500/10 flex flex-col z-50 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

    {{-- Logo --}}
    <div class="flex items-center justify-between px-5 py-5 border-b border-orange-500/10">
        <div class="flex items-center gap-3">
              @if ($logo)
                <img src="{{ asset('storage/' . $logo) }}"
                        class="h-9 w-auto object-contain">
            @else
                <div class="w-9 h-9 bg-orange-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                        <path d="M8 21h8M12 17v4"/>
                    </svg>
                </div>
            @endif

                <div>
                    <p class="text-sm font-semibold text-white leading-tight">
                        {{ $title }}
                    </p>
                    <p class="text-[11px] text-gray-500">
                        {{ $subtitle }}
                    </p>
                </div>
        </div>
        {{-- Close button — mobile only --}}
        <button id="sidebar-close"
                class="lg:hidden p-1.5 rounded-lg text-gray-500 hover:text-white hover:bg-white/10 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto py-4 space-y-1 scrollbar-thin">

        {{-- MAIN --}}
        <x-admin.nav-label>Main</x-admin.nav-label>
        <x-admin.nav-item route="admin.dashboard" icon="grid">Dashboard</x-admin.nav-item>
        <x-admin.nav-item route="admin.users.index">Users</x-admin.nav-item>
        <x-admin.nav-item route="admin.contact-messages.index">Contact</x-admin.nav-item>
        
        {{-- CMS SYSTEM --}}
        <x-admin.nav-label>CMS System</x-admin.nav-label>
        {{-- <x-admin.nav-item route="admin.pages.index">Pages</x-admin.nav-item> --}}
        <x-admin.nav-item route="admin.page-sections.index">Banner Page</x-admin.nav-item>
        
        <x-admin.nav-item route="admin.sections.home_section">Home Section</x-admin.nav-item>
        <x-admin.nav-item route="admin.sections.service_section">Service Section</x-admin.nav-item>
        <x-admin.nav-item route="admin.sections.project_section">Project Section</x-admin.nav-item>
        <x-admin.nav-item route="admin.sections.blog_section">Blog Section</x-admin.nav-item>
        <x-admin.nav-item route="admin.sections.whyus_section">WhyUs Section</x-admin.nav-item>
        <x-admin.nav-item route="admin.sections.media_section">Media Section</x-admin.nav-item>

        {{-- CONTACT SYSTEM --}}
        <x-admin.nav-label>System</x-admin.nav-label>
        <x-admin.nav-item route="admin.menu-groups.index">Menu Groups</x-admin.nav-item>
        <x-admin.nav-item route="admin.menus.index">Menu items</x-admin.nav-item>
        <x-admin.nav-item route="admin.section-items.index">Section Items</x-admin.nav-item>
        <x-admin.nav-item route="admin.settings.index">Settings</x-admin.nav-item>

    </nav>

    {{-- Footer --}}
    <div class="px-5 py-4 border-t border-orange-500/10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center text-xs font-medium text-white flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-xs font-medium truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-[11px] text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </div>
    </div>

</aside>