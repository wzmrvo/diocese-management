<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin') - CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-[#f7f6f1]">

    <div
        x-data="{ sidebarOpen: false }"
        class="min-h-screen"
    >

        {{-- MOBILE OVERLAY --}}
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black/30 lg:hidden"
            style="display: none;"
        ></div>


        {{-- ================================================= --}}
        {{-- ADMIN SIDEBAR --}}
        {{-- ================================================= --}}

        <aside
            class="fixed inset-y-0 left-0 z-50 flex w-[285px] -translate-x-full flex-col overflow-hidden bg-[#103c30] text-white shadow-xl transition-transform duration-300 lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >

            {{-- Logo / Organization --}}
            <div class="relative px-6 pb-6 pt-7">

                <div class="flex items-center gap-4">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border-2 border-[#d8ae45] bg-[#f8f5e9] shadow-md">

                        <div class="text-center leading-none">
                            <div class="text-xl font-bold text-[#174638]">
                                CWL
                            </div>

                            <div class="mt-1 text-[7px] font-semibold tracking-wide text-[#8d7130]">
                                DIOCESE
                            </div>
                        </div>

                    </div>

                    <div>
                        <h1 class="text-[17px] font-semibold tracking-wide text-white">
                            CWL DIOCESE OF IMUS
                        </h1>

                        <p class="mt-1 text-xs text-white/60">
                            Faith • Service • Community
                        </p>
                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- NAVIGATION --}}
            {{-- ================================================= --}}

            <nav class="flex-1 overflow-y-auto px-4 py-3">

                <p class="mb-3 px-3 text-[10px] font-semibold uppercase tracking-[0.18em] text-white/40">
                    Main Menu
                </p>

                <div class="space-y-1">

                    {{-- Dashboard --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M3 10.5L12 3l9 7.5M5.5 9.5V21h13V9.5M9 21v-6h6v6"
                            />
                        </svg>

                        <span>Dashboard</span>
                    </a>


                    {{-- Account Requests --}}
                    <a
                        href="{{ route('admin.account-requests.index') }}"
                        class="flex items-center justify-between rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <span class="flex items-center gap-3">

                            <svg class="h-5 w-5 text-white/75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                                />
                            </svg>

                            Account Requests

                        </span>

                        @php
                            $pendingRequests = \App\Models\User::where('role', 'member')
                                ->where('status', 'pending')
                                ->count();
                        @endphp

                        @if($pendingRequests > 0)
                            <span class="flex h-5 min-w-5 items-center justify-center rounded-full bg-red-500 px-1.5 text-[10px] font-bold text-white">
                                {{ $pendingRequests }}
                            </span>
                        @endif

                    </a>


                    {{-- Members --}}
                    <a
                        href="{{ route('admin.members.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Members</span>
                    </a>


                    {{-- Diocesan Officers --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Diocesan Officers</span>
                    </a>


                    {{-- Vicariates --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Vicariates</span>
                    </a>


                    {{-- Units --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Units</span>
                    </a>


                    {{-- Meeting Records --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Meeting Records</span>
                    </a>


                    {{-- Minutes --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Minutes / MOTM</span>
                    </a>


                    {{-- Financial Reports --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Financial Reports</span>
                    </a>


                    {{-- Reports --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Reports</span>
                    </a>


                    {{-- Settings --}}
                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >
                        <span>Settings</span>
                    </a>

                </div>

            </nav>


            {{-- Sidebar bottom --}}
            <div class="border-t border-white/10 px-5 py-5">

                <div class="mb-5 text-center">

                    <p class="font-serif text-sm italic text-white/70">
                        Together in Faith
                    </p>

                    <p class="font-serif text-sm italic text-white/70">
                        for a Stronger
                    </p>

                    <p class="font-serif text-base italic text-[#e8c96b]">
                        CWL Community
                    </p>

                </div>

                <div class="h-px bg-[#d5ad45]/60"></div>

                <div class="mt-4 text-center text-[10px] text-white/35">
                    Organizational Records & Transparency
                </div>

            </div>

        </aside>


        {{-- ================================================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ================================================= --}}

        <div class="lg:pl-[285px]">

            {{-- TOP HEADER --}}
            <header class="sticky top-0 z-30 border-b border-stone-200/80 bg-[#f7f6f1]/95 backdrop-blur">

                <div class="flex h-[76px] items-center justify-between px-5 sm:px-7 lg:px-8">

                    {{-- Mobile menu --}}
                    <button
                        type="button"
                        @click="sidebarOpen = true"
                        class="rounded-lg p-2 text-[#174638] hover:bg-white lg:hidden"
                    >
                        ☰
                    </button>


                    {{-- User --}}
                    <div class="ml-auto flex items-center gap-4">

                        <div class="h-8 w-px bg-stone-300"></div>

                        <div class="flex items-center gap-3">

                            <div class="hidden text-right sm:block">

                                <p class="text-sm font-semibold text-[#173d32]">
                                    {{ Auth::user()->name }}
                                </p>

                                <p class="text-xs text-stone-500">
                                    System Administrator
                                </p>

                            </div>

                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#173f33] text-white shadow-sm">

                                <span class="text-sm font-medium">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </header>


            {{-- PAGE CONTENT --}}
            <main class="px-5 py-7 sm:px-7 lg:px-8">

                @yield('content')

            </main>


            {{-- FOOTER --}}
            <footer class="px-5 pb-7 text-center sm:px-7 lg:px-8">

                <p class="text-[11px] text-stone-400">
                    CWL Diocese of Imus · Organizational Records and Transparency Management System
                </p>

            </footer>

        </div>

    </div>

    @stack('scripts')

</body>
</html>