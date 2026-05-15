@extends('backend.layout.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back, overview of LED Events')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-4 sm:mb-6">

    {{-- Stat Card: Projects --}}
    <div class="relative overflow-hidden rounded-xl border border-orange-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Total Projects</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['projects'] ?? 0 }}</p>
                <p class="mt-1 text-xs text-green-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    +12% this month
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-orange-500/10 border border-orange-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-orange-500/5 blur-xl"></div>
    </div>

    {{-- Stat Card: Services --}}
    <div class="relative overflow-hidden rounded-xl border border-blue-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Services</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['services'] ?? 5 }}</p>
                <p class="mt-1 text-xs text-blue-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    All active
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-blue-500/5 blur-xl"></div>
    </div>

    {{-- Stat Card: Blog Posts --}}
    <div class="relative overflow-hidden rounded-xl border border-purple-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Blog Articles</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['articles'] ?? 0 }}</p>
                <p class="mt-1 text-xs text-purple-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Published
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-purple-500/5 blur-xl"></div>
    </div>

    {{-- Stat Card: Contacts --}}
    <div class="relative overflow-hidden rounded-xl border border-green-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Contact Forms</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['contacts'] ?? 0 }}</p>
                <p class="mt-1 text-xs text-green-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    New inquiries
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-green-500/5 blur-xl"></div>
    </div>

</div>

@endsection
