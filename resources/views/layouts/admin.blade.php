<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin') - CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-[#f5f7fb] text-slate-800">

<div
    x-data="{
        sidebarOpen: false,
        organizationOpen: {{ request()->routeIs('admin.organization.*') ? 'true' : 'false' }}
    }"
    class="min-h-screen"
>

    {{-- ========================================================= --}}
    {{-- MOBILE OVERLAY --}}
    {{-- ========================================================= --}}

    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-[#071b45]/45 backdrop-blur-sm lg:hidden"
        style="display: none;"
        aria-hidden="true"
    ></div>


    {{-- ========================================================= --}}
    {{-- ADMIN SIDEBAR --}}
    {{-- ========================================================= --}}

    <aside
        class="fixed inset-y-0 left-0 z-50 flex w-[270px]
               -translate-x-full flex-col
               border-r border-[#0d347e]
               bg-[#123B8F] text-white
               shadow-[8px_0_30px_rgba(15,45,100,0.12)]
               transition-transform duration-300
               lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >

        {{-- ===================================================== --}}
        {{-- SIDEBAR BRAND --}}
        {{-- ===================================================== --}}

        <div class="shrink-0 px-5 pb-5 pt-6">

            <div class="flex items-center gap-3.5">

                {{-- LOGO --}}

                <div
                    class="flex h-[58px] w-[58px] shrink-0
                           items-center justify-center
                           overflow-hidden rounded-full
                           border-2 border-[#D4AF37]
                           bg-white shadow-md"
                >

                    <img
                        src="{{ asset('images/cwl/logo/cwl-logo.png') }}"
                        alt="Catholic Women's League Diocese of Imus Logo"
                        class="h-full w-full object-contain"
                    >

                </div>


                {{-- ORGANIZATION NAME --}}

                <div class="min-w-0">

                    <h1
                        class="text-[15px] font-bold
                               leading-tight tracking-wide
                               text-white"
                    >
                        CWL DIOCESE
                    </h1>

                    <h2
                        class="text-[15px] font-bold
                               leading-tight tracking-wide
                               text-[#F4D77D]"
                    >
                        OF IMUS
                    </h2>

                    <p class="mt-1 text-[10px] text-white/65">
                        Catholic Women's League
                    </p>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- SIDEBAR DIVIDER --}}
        {{-- ===================================================== --}}

        <div class="mx-5 h-px bg-white/10"></div>


        {{-- ===================================================== --}}
        {{-- NAVIGATION --}}
        {{-- ===================================================== --}}

        <nav
            class="flex-1 overflow-y-auto px-3 py-5
                   scrollbar-thin scrollbar-thumb-white/10
                   scrollbar-track-transparent"
        >

            {{-- SECTION LABEL --}}

            <div class="mb-3 px-3">

                <p
                    class="text-[10px] font-bold
                           uppercase tracking-[0.2em]
                           text-[#F4D77D]/70"
                >
                    Main Menu
                </p>

            </div>


            <div class="space-y-1">


                {{-- ================================================= --}}
                {{-- DASHBOARD --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.dashboard') }}"
                    @if(request()->routeIs('admin.dashboard'))
                        aria-current="page"
                    @endif
                    class="group relative flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           transition-all duration-200
                           {{ request()->routeIs('admin.dashboard')
                                ? 'bg-white/15 text-white shadow-sm'
                                : 'text-white/80 hover:bg-white/8 hover:text-white' }}"
                >

                    @if(request()->routeIs('admin.dashboard'))
                        <span
                            class="absolute left-0 top-2 bottom-2
                                   w-1 rounded-r-full
                                   bg-[#D4AF37]"
                        ></span>
                    @endif

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg
                               {{ request()->routeIs('admin.dashboard')
                                    ? 'bg-white/10'
                                    : 'bg-transparent group-hover:bg-white/10' }}"
                    >

                        <svg
                            class="h-[18px] w-[18px]
                                   {{ request()->routeIs('admin.dashboard')
                                        ? 'text-[#F4D77D]'
                                        : 'text-white/75 group-hover:text-[#F4D77D]' }}"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M3 10.5L12 3l9 7.5M5.5 9.5V21h13V9.5M9 21v-6h6v6"
                            />
                        </svg>

                    </span>

                    <span>Dashboard</span>

                </a>


                {{-- ================================================= --}}
                {{-- ACCOUNT REQUESTS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.account-requests.index') }}"
                    @if(request()->routeIs('admin.account-requests.*'))
                        aria-current="page"
                    @endif
                    class="group relative flex items-center justify-between
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           transition-all duration-200
                           {{ request()->routeIs('admin.account-requests.*')
                                ? 'bg-white/15 text-white shadow-sm'
                                : 'text-white/80 hover:bg-white/8 hover:text-white' }}"
                >

                    @if(request()->routeIs('admin.account-requests.*'))
                        <span
                            class="absolute left-0 top-2 bottom-2
                                   w-1 rounded-r-full
                                   bg-[#D4AF37]"
                        ></span>
                    @endif

                    <span class="flex items-center gap-3">

                        <span
                            class="flex h-8 w-8 shrink-0
                                   items-center justify-center
                                   rounded-lg
                                   {{ request()->routeIs('admin.account-requests.*')
                                        ? 'bg-white/10'
                                        : 'group-hover:bg-white/10' }}"
                        >

                            <svg
                                class="h-[18px] w-[18px]
                                       {{ request()->routeIs('admin.account-requests.*')
                                            ? 'text-[#F4D77D]'
                                            : 'text-white/75 group-hover:text-[#F4D77D]' }}"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                                />
                            </svg>

                        </span>

                        <span>Account Requests</span>

                    </span>


                    {{-- PENDING COUNT --}}

                    @php
                        $pendingRequests = \App\Models\User::where('role', 'member')
                            ->where('status', 'pending')
                            ->count();
                    @endphp

                    @if($pendingRequests > 0)

                        <span
                            class="flex h-5 min-w-5 items-center
                                   justify-center rounded-full
                                   bg-[#D4AF37]
                                   px-1.5 text-[10px]
                                   font-bold text-[#123B8F]"
                        >
                            {{ $pendingRequests }}
                        </span>

                    @endif

                </a>


                {{-- ================================================= --}}
                {{-- MEMBERS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.members.index') }}"
                    @if(request()->routeIs('admin.members.*'))
                        aria-current="page"
                    @endif
                    class="group relative flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           transition-all duration-200
                           {{ request()->routeIs('admin.members.*')
                                ? 'bg-white/15 text-white shadow-sm'
                                : 'text-white/80 hover:bg-white/8 hover:text-white' }}"
                >

                    @if(request()->routeIs('admin.members.*'))
                        <span
                            class="absolute left-0 top-2 bottom-2
                                   w-1 rounded-r-full
                                   bg-[#D4AF37]"
                        ></span>
                    @endif

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg
                               {{ request()->routeIs('admin.members.*')
                                    ? 'bg-white/10'
                                    : 'group-hover:bg-white/10' }}"
                    >

                        <svg
                            class="h-[18px] w-[18px]
                                   {{ request()->routeIs('admin.members.*')
                                        ? 'text-[#F4D77D]'
                                        : 'text-white/75 group-hover:text-[#F4D77D]' }}"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1M12 12a4 4 0 100-8 4 4 0 000 8z"
                            />
                        </svg>

                    </span>

                    <span>Members</span>

                </a>


                {{-- ================================================= --}}
                {{-- DIOCESAN OFFICERS --}}
                {{-- ================================================= --}}

                <div
                    class="group relative flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           text-white/45"
                    title="Coming soon"
                >

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg"
                    >

                        <svg
                            class="h-[18px] w-[18px] text-white/35"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M8 21h8M12 17v4M7 4h10l2 4H5l2-4zM5 8h14v3a7 7 0 01-14 0V8z"
                            />
                        </svg>

                    </span>

                    <span>Diocesan Officers</span>

                </div>


                {{-- ================================================= --}}
                {{-- ORGANIZATION --}}
                {{-- ================================================= --}}

                <div class="pt-1">

                    <button
                        type="button"
                        @click="organizationOpen = !organizationOpen"
                        class="group relative flex w-full
                               items-center justify-between
                               rounded-xl px-3.5 py-3
                               text-[13px] font-medium
                               transition-all duration-200
                               {{ request()->routeIs('admin.organization.*')
                                    ? 'bg-white/15 text-white'
                                    : 'text-white/80 hover:bg-white/8 hover:text-white' }}"
                    >

                        @if(request()->routeIs('admin.organization.*'))
                            <span
                                class="absolute left-0 top-2 bottom-2
                                       w-1 rounded-r-full
                                       bg-[#D4AF37]"
                            ></span>
                        @endif

                        <span class="flex items-center gap-3">

                            <span
                                class="flex h-8 w-8 shrink-0
                                       items-center justify-center
                                       rounded-lg
                                       {{ request()->routeIs('admin.organization.*')
                                            ? 'bg-white/10'
                                            : 'group-hover:bg-white/10' }}"
                            >

                                <svg
                                    class="h-[18px] w-[18px]
                                           {{ request()->routeIs('admin.organization.*')
                                                ? 'text-[#F4D77D]'
                                                : 'text-white/75 group-hover:text-[#F4D77D]' }}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                                    />
                                </svg>

                            </span>

                            <span>Organization</span>

                        </span>


                        <svg
                            class="h-4 w-4 text-white/55
                                   transition-transform duration-200"
                            :class="organizationOpen ? 'rotate-180 text-[#F4D77D]' : ''"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m6 9 6 6 6-6"
                            />
                        </svg>

                    </button>


                    {{-- ORGANIZATION CHILDREN --}}

                    <div
                        x-show="organizationOpen"
                        x-collapse
                        class="ml-7 mt-1 space-y-1
                               border-l border-white/15 pl-3"
                    >

                        {{-- VICARIATES --}}

                        <a
                            href="{{ route('admin.organization.vicariates.index') }}"
                            @if(request()->routeIs('admin.organization.vicariates.*'))
                                aria-current="page"
                            @endif
                            class="group flex items-center gap-3
                                   rounded-lg px-3 py-2.5
                                   text-[13px]
                                   transition
                                   {{ request()->routeIs('admin.organization.vicariates.*')
                                        ? 'bg-white/12 text-white'
                                        : 'text-white/65 hover:bg-white/8 hover:text-white' }}"
                        >

                            <span
                                class="h-1.5 w-1.5 shrink-0 rounded-full
                                       {{ request()->routeIs('admin.organization.vicariates.*')
                                            ? 'bg-[#D4AF37]'
                                            : 'bg-[#F4D77D]/70' }}"
                            ></span>

                            <span>Vicariates</span>

                        </a>


                        {{-- UNITS --}}

                        <a
                            href="{{ route('admin.organization.units.index') }}"
                            @if(request()->routeIs('admin.organization.units.*'))
                                aria-current="page"
                            @endif
                            class="group flex items-center gap-3
                                   rounded-lg px-3 py-2.5
                                   text-[13px]
                                   transition
                                   {{ request()->routeIs('admin.organization.units.*')
                                        ? 'bg-white/12 text-white'
                                        : 'text-white/65 hover:bg-white/8 hover:text-white' }}"
                        >

                            <span
                                class="h-1.5 w-1.5 shrink-0 rounded-full
                                       {{ request()->routeIs('admin.organization.units.*')
                                            ? 'bg-[#D4AF37]'
                                            : 'bg-[#F4D77D]/70' }}"
                            ></span>

                            <span>Units</span>

                        </a>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- MEETING RECORDS --}}
                {{-- ================================================= --}}

                <div
                    class="group flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           text-white/45"
                    title="Coming soon"
                >

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg"
                    >

                        <svg
                            class="h-[18px] w-[18px] text-white/35"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM8 7h8M8 11h8M8 15h5"
                            />
                        </svg>

                    </span>

                    <span>Meeting Records</span>

                </div>


                {{-- ================================================= --}}
                {{-- MINUTES / MOTM --}}
                {{-- ================================================= --}}

                <div
                    class="group flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           text-white/45"
                    title="Coming soon"
                >

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg"
                    >

                        <svg
                            class="h-[18px] w-[18px] text-white/35"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM8 8h8M8 12h8M8 16h5"
                            />
                        </svg>

                    </span>

                    <span>Minutes / MOTM</span>

                </div>


                {{-- ================================================= --}}
                {{-- FINANCIAL REPORTS --}}
                {{-- ================================================= --}}

                <div
                    class="group flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           text-white/45"
                    title="Coming soon"
                >

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg"
                    >

                        <svg
                            class="h-[18px] w-[18px] text-white/35"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2zM8 8h8M8 12h5M8 16h6"
                            />
                        </svg>

                    </span>

                    <span>Financial Reports</span>

                </div>


                {{-- ================================================= --}}
                {{-- REPORTS --}}
                {{-- ================================================= --}}

                <div
                    class="group flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           text-white/45"
                    title="Coming soon"
                >

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg"
                    >

                        <svg
                            class="h-[18px] w-[18px] text-white/35"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 3h9l4 4v14H6a2 2 0 01-2-2V5a2 2 0 012-2zM14 3v5h5M8 12h7M8 16h5"
                            />
                        </svg>

                    </span>

                    <span>Reports</span>

                </div>


                {{-- ================================================= --}}
                {{-- SETTINGS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('settings') }}"
                    class="group flex items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-[13px] font-medium
                           text-white/80
                           transition-all duration-200
                           hover:bg-white/8 hover:text-white"
                >

                    <span
                        class="flex h-8 w-8 shrink-0
                               items-center justify-center
                               rounded-lg
                               group-hover:bg-white/10"
                    >

                        <svg
                            class="h-[18px] w-[18px]
                                   text-white/75
                                   group-hover:text-[#F4D77D]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 15.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7zM19.4 15a1.7 1.7 0 00.34 1.88l.06.06-1.8 1.8-.06-.06a1.7 1.7 0 00-1.88-.34 1.7 1.7 0 00-1.04 1.56V22h-2.54v-.1a1.7 1.7 0 00-1.04-1.56 1.7 1.7 0 00-1.88.34l-.06.06-1.8-1.8.06-.06A1.7 1.7 0 008 15a1.7 1.7 0 00-1.56-1.04H6v-2.54h.1A1.7 1.7 0 007.66 10a1.7 1.7 0 00-.34-1.88l-.06-.06 1.8-1.8.06.06A1.7 1.7 0 0011 6.66 1.7 1.7 0 0012.04 5.1V5h2.54v.1A1.7 1.7 0 0015.62 6.66a1.7 1.7 0 001.88-.34l.06-.06 1.8 1.8-.06.06A1.7 1.7 0 0019 10a1.7 1.7 0 001.56 1.04h.1v2.54h-.1A1.7 1.7 0 0019.4 15z"
                            />
                        </svg>

                    </span>

                    <span>Settings</span>

                </a>

            </div>

        </nav>


        {{-- ===================================================== --}}
        {{-- SIDEBAR FOOTER --}}
        {{-- ===================================================== --}}

        <div
            class="shrink-0 border-t border-white/10
                   px-5 py-5"
        >

            <div class="text-center">

                <p
                    class="font-serif text-[13px]
                           font-medium italic
                           text-white/65"
                >
                    Together in Faith
                </p>

                <p
                    class="font-serif text-[13px]
                           font-medium italic
                           text-white/65"
                >
                    for a Stronger
                </p>

                <p
                    class="mt-0.5 font-serif text-[15px]
                           font-bold italic
                           text-[#F4D77D]"
                >
                    CWL Community
                </p>

            </div>


            <div class="my-4 h-px bg-[#D4AF37]/45"></div>


            <p
                class="text-center text-[9px]
                       leading-4 text-white/35"
            >
                Organizational Records & Transparency
            </p>

        </div>

    </aside>


    {{-- ========================================================= --}}
    {{-- MAIN AREA --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen lg:pl-[270px]">


        {{-- ===================================================== --}}
        {{-- TOP HEADER --}}
        {{-- ===================================================== --}}

        <header
            class="sticky top-0 z-30
                   border-b border-slate-200
                   bg-white/95 backdrop-blur"
        >

            <div
                class="flex h-[72px]
                       items-center justify-between
                       px-4 sm:px-6 lg:px-8"
            >

                {{-- MOBILE MENU BUTTON --}}

                <button
                    type="button"
                    @click="sidebarOpen = true"
                    class="inline-flex h-10 w-10
                           items-center justify-center
                           rounded-xl
                           text-[#123B8F]
                           transition
                           hover:bg-blue-50
                           lg:hidden"
                    aria-label="Open navigation"
                >

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                </button>


                {{-- MOBILE BRAND --}}

                <div class="ml-3 flex items-center gap-2 lg:hidden">

                    <div
                        class="flex h-9 w-9
                               items-center justify-center
                               overflow-hidden rounded-full
                               border border-[#D4AF37]
                               bg-white"
                    >

                        <img
                            src="{{ asset('images/cwl/logo/cwl-logo.png') }}"
                            alt="CWL Logo"
                            class="h-full w-full object-contain"
                        >

                    </div>

                    <div class="hidden xs:block">

                        <p
                            class="text-[11px] font-bold
                                   leading-tight text-[#123B8F]"
                        >
                            CWL DIOCESE
                        </p>

                        <p
                            class="text-[11px] font-bold
                                   leading-tight text-[#B18B1F]"
                        >
                            OF IMUS
                        </p>

                    </div>

                </div>


                {{-- RIGHT HEADER --}}

                <div class="ml-auto flex items-center gap-2 sm:gap-3">


                    {{-- NOTIFICATIONS --}}

                    <button
                        type="button"
                        class="relative flex h-10 w-10
                               items-center justify-center
                               rounded-xl
                               text-[#123B8F]
                               transition
                               hover:bg-blue-50"
                        aria-label="Notifications"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M15 17H9m9-5a6 6 0 10-12 0c0 7-3 7-3 8h18c0-1-3-1-3-8z"
                            />
                        </svg>

                    </button>


                    <div class="hidden h-8 w-px bg-slate-200 sm:block"></div>


                    {{-- ================================================= --}}
                    {{-- ADMIN PROFILE --}}
                    {{-- ================================================= --}}

                    <div
                        x-data="{ profileOpen: false }"
                        class="relative"
                    >

                        <button
                            type="button"
                            @click="profileOpen = !profileOpen"
                            class="flex items-center gap-2
                                   rounded-xl px-2 py-1.5
                                   text-sm font-medium
                                   text-[#123B8F]
                                   transition
                                   hover:bg-blue-50"
                        >

                            {{-- SMALL PROFILE AVATAR --}}

                            <div
                                class="flex h-10 w-10
                                       items-center justify-center
                                       rounded-full
                                       border-2 border-[#D4AF37]
                                       bg-[#123B8F]
                                       text-white shadow-sm"
                            >

                                <span class="text-sm font-bold">
                                    {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}
                                </span>

                            </div>


                            {{-- FIRST NAME --}}

                            <span class="hidden sm:block">
                                {{ Auth::user()->first_name ?? Auth::user()->name }}
                            </span>


                            {{-- ARROW --}}

                            <svg
                                class="hidden h-4 w-4
                                       text-slate-400
                                       transition
                                       sm:block"
                                :class="profileOpen ? 'rotate-180' : ''"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m6 9 6 6 6-6"
                                />
                            </svg>

                        </button>


                        {{-- ================================================= --}}
                        {{-- PROFILE DROPDOWN --}}
                        {{-- ================================================= --}}

                        <div
                            x-show="profileOpen"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            @click.outside="profileOpen = false"
                            class="absolute right-0 top-full z-[100]
                                   mt-3 w-[320px]
                                   overflow-hidden
                                   rounded-2xl
                                   border border-slate-200
                                   bg-white shadow-2xl"
                            style="display: none;"
                        >

                            {{-- PROFILE HEADER --}}

                            <div
                                class="border-b border-slate-200
                                       bg-[#f8faff]"
                            >

                                <div
                                    class="px-6 pb-5 pt-6
                                           text-center"
                                >

                                    {{-- PROFILE AVATAR --}}

                                    <div
                                        class="mx-auto flex h-20 w-20
                                               items-center justify-center
                                               rounded-full
                                               border-4 border-[#D4AF37]
                                               bg-[#123B8F]
                                               text-white shadow-md"
                                    >

                                        <span class="text-2xl font-bold">
                                            {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}
                                        </span>

                                    </div>


                                    {{-- FULL NAME --}}

                                    <h3
                                        class="mt-4 text-lg
                                               font-semibold
                                               text-[#123B8F]"
                                    >
                                        {{ Auth::user()->name }}
                                    </h3>


                                    {{-- USERNAME --}}

                                    <p
                                        class="mt-1 text-xs
                                               text-slate-500"
                                    >
                                        {{ '@' . (Auth::user()->username ?? Str::before(Auth::user()->email, '@')) }}
                                    </p>


                                    {{-- ROLE --}}

                                    <span
                                        class="mt-3 inline-flex
                                               rounded-full
                                               bg-[#FFF8E5]
                                               px-3 py-1
                                               text-[10px]
                                               font-bold
                                               uppercase
                                               tracking-wide
                                               text-[#B18B1F]"
                                    >
                                        System Administrator
                                    </span>

                                </div>


                                {{-- ADMIN INFORMATION --}}

                                <div class="px-5 pb-5">

                                    <div
                                        class="overflow-hidden
                                               rounded-xl
                                               border border-slate-200
                                               bg-white"
                                    >

                                        {{-- EMAIL --}}

                                        <div
                                            class="flex items-center
                                                   justify-between
                                                   gap-4 px-4 py-3"
                                        >

                                            <span
                                                class="text-xs
                                                       text-slate-400"
                                            >
                                                Email
                                            </span>

                                            <span
                                                class="max-w-[190px]
                                                       truncate text-right
                                                       text-xs font-medium
                                                       text-slate-700"
                                            >
                                                {{ Auth::user()->email }}
                                            </span>

                                        </div>


                                        {{-- ROLE --}}

                                        <div
                                            class="flex items-center
                                                   justify-between
                                                   gap-4
                                                   border-t
                                                   border-slate-100
                                                   px-4 py-3"
                                        >

                                            <span
                                                class="text-xs
                                                       text-slate-400"
                                            >
                                                Role
                                            </span>

                                            <span
                                                class="text-right
                                                       text-xs font-medium
                                                       capitalize
                                                       text-slate-700"
                                            >
                                                {{ Auth::user()->role ?? 'admin' }}
                                            </span>

                                        </div>


                                        {{-- STATUS --}}

                                        <div
                                            class="flex items-center
                                                   justify-between
                                                   border-t
                                                   border-slate-100
                                                   px-4 py-3"
                                        >

                                            <span
                                                class="text-xs
                                                       text-slate-400"
                                            >
                                                Status
                                            </span>

                                            <span
                                                class="rounded-full
                                                       bg-[#FFF5D6]
                                                       px-2.5 py-1
                                                       text-[10px]
                                                       font-semibold
                                                       text-[#96700B]"
                                            >
                                                Active
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- ACCOUNT SETTINGS --}}

                            <div class="space-y-1 p-2">


                                {{-- PROFILE --}}

                                <a
                                    href="{{ url('/settings') }}"
                                    class="flex items-center gap-3
                                           rounded-xl px-3 py-3
                                           transition
                                           hover:bg-[#f8faff]"
                                >

                                    <div
                                        class="flex h-10 w-10 shrink-0
                                               items-center justify-center
                                               rounded-lg bg-blue-50
                                               text-[#123B8F]"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 21a8 8 0 0116 0"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p
                                            class="text-sm
                                                   font-medium
                                                   text-slate-700"
                                        >
                                            Profile
                                        </p>

                                        <p
                                            class="text-[11px]
                                                   text-slate-400"
                                        >
                                            View your profile
                                        </p>

                                    </div>

                                </a>


                                {{-- EMAIL --}}

                                <a
                                    href="{{ url('/settings/profile') }}"
                                    class="flex items-center gap-3
                                           rounded-xl px-3 py-3
                                           transition
                                           hover:bg-[#f8faff]"
                                >

                                    <div
                                        class="flex h-10 w-10 shrink-0
                                               items-center justify-center
                                               rounded-lg bg-blue-50
                                               text-[#123B8F]"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M3 6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v10.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 17.25V6.75zM4.5 6l7.5 6 7.5-6"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p
                                            class="text-sm
                                                   font-medium
                                                   text-slate-700"
                                        >
                                            Email Address
                                        </p>

                                        <p
                                            class="text-[11px]
                                                   text-slate-400"
                                        >
                                            Update your email address
                                        </p>

                                    </div>

                                </a>


                                {{-- SECURITY --}}

                                <a
                                    href="{{ url('/settings/security') }}"
                                    class="flex items-center gap-3
                                           rounded-xl px-3 py-3
                                           transition
                                           hover:bg-[#fffaf0]"
                                >

                                    <div
                                        class="flex h-10 w-10 shrink-0
                                               items-center justify-center
                                               rounded-lg bg-[#FFF8E5]
                                               text-[#B18B1F]"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M16.5 10.5V7a4.5 4.5 0 00-9 0v3.5M6 10.5h12v9H6v-9z"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p
                                            class="text-sm
                                                   font-medium
                                                   text-slate-700"
                                        >
                                            Security
                                        </p>

                                        <p
                                            class="text-[11px]
                                                   text-slate-400"
                                        >
                                            Change your password
                                        </p>

                                    </div>

                                </a>


                                {{-- ACCOUNT --}}

                                <a
                                    href="{{ url('/settings/account') }}"
                                    class="flex items-center gap-3
                                           rounded-xl px-3 py-3
                                           transition
                                           hover:bg-[#f8faff]"
                                >

                                    <div
                                        class="flex h-10 w-10 shrink-0
                                               items-center justify-center
                                               rounded-lg bg-blue-50
                                               text-[#123B8F]"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 21a8 8 0 0116 0"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p
                                            class="text-sm
                                                   font-medium
                                                   text-slate-700"
                                        >
                                            Account
                                        </p>

                                        <p
                                            class="text-[11px]
                                                   text-slate-400"
                                        >
                                            View account information
                                        </p>

                                    </div>

                                </a>

                            </div>


                            {{-- SIGN OUT --}}

                            <div
                                class="border-t border-slate-200 p-2"
                            >

                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="flex w-full
                                               items-center gap-3
                                               rounded-xl px-3 py-3
                                               text-left text-sm
                                               text-red-600
                                               transition
                                               hover:bg-red-50"
                                    >

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                                   items-center justify-center
                                                   rounded-lg bg-red-50"
                                        >

                                            <svg
                                                class="h-5 w-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M15 12H3m0 0l4-4m-4 4l4 4M21 5v14a2 2 0 01-2 2h-4"
                                                />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="font-medium">
                                                Sign Out
                                            </p>

                                            <p
                                                class="text-[11px]
                                                       text-red-400"
                                            >
                                                End your session
                                            </p>

                                        </div>

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- ========================================================= --}}
        {{-- PAGE CONTENT --}}
        {{-- ========================================================= --}}

        <main
            class="min-h-[calc(100vh-72px)]
                   px-4 py-6
                   sm:px-6 sm:py-7
                   lg:px-8"
        >

            @yield('content')

        </main>


        {{-- ========================================================= --}}
        {{-- FOOTER --}}
        {{-- ========================================================= --}}

        <footer
            class="border-t border-slate-200
                   bg-white px-4 py-6
                   text-center sm:px-6 lg:px-8"
        >

            <p class="text-[11px] text-slate-400">
                CWL Diocese of Imus · Organizational Records
                and Transparency Management System
            </p>

        </footer>

    </div>

</div>


@stack('scripts')

</body>

</html>