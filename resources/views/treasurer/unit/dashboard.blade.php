<x-app-layout>

    <div
        x-data="{ sidebarOpen: false }"
        class="min-h-screen bg-[#f7f8fc] text-slate-800"
    >

        {{-- ========================================================= --}}
        {{-- MOBILE OVERLAY --}}
        {{-- ========================================================= --}}

        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black/40 lg:hidden"
            style="display: none;"
        ></div>


        {{-- ========================================================= --}}
        {{-- SIDEBAR --}}
        {{-- ========================================================= --}}

        <aside
            class="fixed inset-y-0 left-0 z-50 flex w-[285px]
                   -translate-x-full flex-col overflow-hidden
                   bg-[#0b2e6f] text-white shadow-2xl
                   transition-transform duration-300
                   lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >

            {{-- SIDEBAR HEADER --}}

            <div class="shrink-0 px-6 pb-6 pt-7">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-16 w-16 shrink-0 items-center
                               justify-center rounded-full
                               border-2 border-[#d4af37]
                               bg-white shadow-md"
                    >

                        <div class="text-center leading-none">

                            <div class="text-xl font-bold text-[#0b2e6f]">
                                CWL
                            </div>

                            <div
                                class="mt-1 text-[7px] font-bold
                                       tracking-wide text-[#b08d20]"
                            >
                                DIOCESE
                            </div>

                        </div>

                    </div>

                    <div class="min-w-0">

                        <h1
                            class="text-[17px] font-semibold
                                   tracking-wide text-white"
                        >
                            CWL DIOCESE OF IMUS
                        </h1>

                        <p class="mt-1 text-xs text-white/60">
                            Faith • Service • Community
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- NAVIGATION --}}
            {{-- ===================================================== --}}

            <nav class="flex-1 overflow-y-auto px-4 py-3">

                <p
                    class="mb-3 px-3 text-[10px] font-semibold
                           uppercase tracking-[0.18em] text-white/45"
                >
                    Treasurer Menu
                </p>


                <div class="space-y-1">

                    {{-- DASHBOARD --}}

                    <a
                        href="{{ route('treasurer.unit.dashboard') }}"
                        @if(request()->routeIs('treasurer.unit.dashboard'))
                            aria-current="page"
                        @endif
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm font-semibold
                               transition
                               {{ request()->routeIs('treasurer.unit.dashboard')
                                    ? 'bg-[#d4af37] text-[#09275d] shadow-sm'
                                    : 'text-white/85 hover:bg-white/10' }}"
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
                                d="M3 10.5L12 3l9 7.5M5.5 9.5V21h13V9.5M9 21v-6h6v6"
                            />
                        </svg>

                        <span>Dashboard</span>

                    </a>


                    {{-- PAYMENT REQUESTS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm text-white/85
                               transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-[#e5c76b]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 5v14M5 12h14M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                            />
                        </svg>

                        <span>Payment Requests</span>

                    </a>


                    {{-- MEMBER PAYMENTS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm text-white/85
                               transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-[#e5c76b]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"
                            />
                        </svg>

                        <span>Member Payments</span>

                    </a>


                    {{-- UNIT DUES --}}

                    <a
                        href="{{ route('treasurer.unit.dues') }}"
                        @if(request()->routeIs('treasurer.unit.dues'))
                            aria-current="page"
                        @endif
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm
                               transition
                               {{ request()->routeIs('treasurer.unit.dues')
                                    ? 'bg-[#d4af37] font-semibold text-[#09275d] shadow-sm'
                                    : 'text-white/85 hover:bg-white/10' }}"
                    >

                        <svg
                            class="h-5 w-5
                                   {{ request()->routeIs('treasurer.unit.dues')
                                        ? 'text-[#09275d]'
                                        : 'text-[#e5c76b]' }}"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6"
                            />
                        </svg>

                        <span>Unit Dues</span>

                    </a>


                    {{-- FINANCIAL REPORTS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm text-white/85
                               transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-[#e5c76b]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 3h9l4 4v14H6V3zM14 3v5h5M9 12h6M9 16h6"
                            />
                        </svg>

                        <span>Financial Reports</span>

                    </a>


                    {{-- UNIT MEMBERS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm text-white/85
                               transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-[#e5c76b]"
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

                        <span>Unit Members</span>

                    </a>


                    {{-- NOTIFICATIONS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm text-white/85
                               transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-[#e5c76b]"
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

                        <span>Notifications</span>

                    </a>

                </div>

            </nav>


            {{-- SIDEBAR FOOTER --}}

            <div
                class="shrink-0 border-t border-white/10
                       px-5 py-5"
            >

                <div class="mb-5 text-center">

                    <p class="font-serif text-sm italic text-white/65">
                        Together in Faith
                    </p>

                    <p class="font-serif text-sm italic text-white/65">
                        for a Stronger
                    </p>

                    <p class="font-serif text-base italic text-[#e5c76b]">
                        CWL Community
                    </p>

                </div>

                <div class="h-px bg-[#d4af37]/60"></div>

                <div
                    class="mt-4 text-center text-[10px]
                           text-white/35"
                >
                    Unit Finance Management
                </div>

            </div>

        </aside>


        {{-- ========================================================= --}}
        {{-- MAIN AREA --}}
        {{-- ========================================================= --}}

        <div class="min-h-screen lg:pl-[285px]">


            {{-- ===================================================== --}}
            {{-- TOP HEADER --}}
            {{-- ===================================================== --}}

            <header
                class="sticky top-0 z-30 border-b
                       border-slate-200 bg-white/95
                       backdrop-blur"
            >

                <div
                    class="flex h-[76px] items-center
                           justify-between px-5
                           sm:px-7 lg:px-8"
                >

                    {{-- MOBILE MENU --}}

                    <button
                        type="button"
                        @click="sidebarOpen = true"
                        class="rounded-lg p-2
                               text-[#0b2e6f]
                               transition hover:bg-blue-50
                               lg:hidden"
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


                    {{-- TOP RIGHT --}}

                    <div
                        class="ml-auto flex items-center
                               gap-3"
                    >

                        {{-- NOTIFICATION --}}

                        <button
                            type="button"
                            class="relative rounded-full
                                   p-2.5 text-[#0b2e6f]
                                   transition hover:bg-blue-50"
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
                                    d="M15 17H9m9-5a6 6 0 10-12 0c0 7-3 7-3 8h18c0-1-3-1-3-8z"
                                />
                            </svg>

                        </button>


                        <div class="h-8 w-px bg-slate-200"></div>


                        {{-- PROFILE --}}

                        <div
                            x-data="{ profileOpen: false }"
                            class="relative"
                        >

                            <button
                                type="button"
                                @click="profileOpen = !profileOpen"
                                class="flex items-center gap-2
                                       rounded-xl px-2 py-2
                                       text-sm font-medium
                                       text-[#123B8F]
                                       transition hover:bg-blue-50"
                            >

                                <div
                                    class="flex h-10 w-10
                                           items-center justify-center
                                           rounded-full
                                           border-2 border-[#D4AF37]
                                           bg-[#123B8F]
                                           text-white shadow-sm"
                                >

                                    <span class="text-sm font-semibold">
                                        {{ strtoupper(
                                            substr(
                                                Auth::user()->first_name
                                                    ?? Auth::user()->name
                                                    ?? 'U',
                                                0,
                                                1
                                            )
                                        ) }}
                                    </span>

                                </div>

                                <span class="hidden sm:block">
                                    My Profile
                                </span>

                                <svg
                                    class="hidden h-4 w-4
                                           text-slate-400
                                           transition sm:block"
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


                            {{-- PROFILE DROPDOWN --}}

                            <div
                                x-show="profileOpen"
                                x-transition
                                @click.outside="profileOpen = false"
                                class="absolute right-0 top-full z-[100]
                                       mt-3 w-80 overflow-hidden
                                       rounded-2xl border border-blue-100
                                       bg-white shadow-xl"
                                style="display: none;"
                            >

                                <div
                                    class="border-b border-blue-100
                                           bg-[#f8faff]
                                           px-5 py-6"
                                >

                                    <div
                                        class="flex flex-col
                                               items-center text-center"
                                    >

                                        <div
                                            class="flex h-16 w-16
                                                   items-center justify-center
                                                   rounded-full
                                                   border-2
                                                   border-[#D4AF37]
                                                   bg-[#123B8F]
                                                   text-white shadow-md"
                                        >

                                            <span class="text-xl font-bold">
                                                {{ strtoupper(
                                                    substr(
                                                        Auth::user()->first_name
                                                            ?? Auth::user()->name
                                                            ?? 'U',
                                                        0,
                                                        1
                                                    )
                                                ) }}
                                            </span>

                                        </div>

                                        <p
                                            class="mt-3 text-base
                                                   font-semibold
                                                   text-[#123B8F]"
                                        >
                                            {{ Auth::user()->first_name }}
                                            {{ Auth::user()->last_name }}
                                        </p>

                                        <p
                                            class="mt-0.5 text-xs
                                                   text-slate-500"
                                        >
                                            {{ '@' . (
                                                Auth::user()->username
                                                ?? Str::before(
                                                    Auth::user()->email,
                                                    '@'
                                                )
                                            ) }}
                                        </p>

                                        <span
                                            class="mt-2 inline-flex
                                                   rounded-full
                                                   bg-[#FFF8E5]
                                                   px-3 py-1
                                                   text-[10px]
                                                   font-bold
                                                   uppercase
                                                   tracking-wide
                                                   text-[#B18B1F]"
                                        >
                                            Unit Treasurer
                                        </span>

                                    </div>

                                </div>


                                <div class="p-2">

                                    <a
                                        href="{{ url('/settings/profile') }}"
                                        class="flex items-center gap-3
                                               rounded-xl px-3 py-3
                                               transition
                                               hover:bg-[#f8faff]"
                                    >

                                        <div
                                            class="flex h-10 w-10
                                                   shrink-0
                                                   items-center
                                                   justify-center
                                                   rounded-lg
                                                   bg-blue-50
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
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M4.5 20.25a7.5 7.5 0 0115 0"
                                                />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-medium text-slate-700">
                                                Profile
                                            </p>

                                            <p class="text-[11px] text-slate-400">
                                                Personal information
                                            </p>

                                        </div>

                                    </a>


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
                                                   rounded-lg
                                                   bg-[#fff8e5]
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

                                            <p class="text-sm font-medium text-slate-700">
                                                Security
                                            </p>

                                            <p class="text-[11px] text-slate-400">
                                                Password and security
                                            </p>

                                        </div>

                                    </a>


                                    <a
                                        href="{{ url('/settings/organization') }}"
                                        class="flex items-center gap-3
                                               rounded-xl px-3 py-3
                                               transition
                                               hover:bg-[#f8faff]"
                                    >

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                                   items-center justify-center
                                                   rounded-lg
                                                   bg-blue-50
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
                                                    d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                                                />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-medium text-slate-700">
                                                Organization
                                            </p>

                                            <p class="text-[11px] text-slate-400">
                                                CWL organization details
                                            </p>

                                        </div>

                                    </a>


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
                                                   rounded-lg
                                                   bg-blue-50
                                                   text-[#123B8F]"
                                        >

                                            <svg
                                                class="h-5 w-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="9"
                                                    stroke-width="1.8"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-width="1.8"
                                                    d="M12 7v5l3 2"
                                                />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-medium text-slate-700">
                                                Account
                                            </p>

                                            <p class="text-[11px] text-slate-400">
                                                Account information
                                            </p>

                                        </div>

                                    </a>

                                </div>


                                <div class="border-t border-blue-100 p-2">

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="flex w-full items-center
                                                   gap-3 rounded-xl px-3 py-3
                                                   text-left text-sm
                                                   text-red-600
                                                   transition hover:bg-red-50"
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

                                                <p class="text-[11px] text-red-400">
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
                class="min-h-screen overflow-y-auto
                       px-5 py-7 sm:px-7 lg:px-8"
            >

                {{-- WELCOME HERO --}}

                <section
                    class="relative mb-5 min-h-[175px]
                           overflow-hidden rounded-2xl
                           border border-[#dbe2ef]
                           bg-white shadow-sm"
                >

                    <div
                        class="absolute inset-0
                               bg-gradient-to-r
                               from-[#eef3ff]
                               via-white
                               to-[#fff9e7]"
                    ></div>

                    <div
                        class="absolute -right-10 -top-16
                               h-64 w-64 rounded-full
                               border-[35px]
                               border-[#d4af37]/10"
                    ></div>

                    <div
                        class="absolute -right-5 -bottom-20
                               h-52 w-52 rounded-full
                               border-[25px]
                               border-[#0b2e6f]/10"
                    ></div>

                    <div
                        class="relative z-10 flex h-full
                               items-center px-7 py-7 sm:px-8"
                    >

                        <div class="max-w-xl">

                            <p class="text-sm font-medium text-[#0b2e6f]/70">
                                Unit Treasurer Dashboard
                            </p>

                            <h2
                                class="mt-1 font-serif text-3xl
                                       font-semibold leading-tight
                                       text-[#0b2e6f]
                                       sm:text-[34px]"
                            >
                                {{ Auth::user()->name }}
                            </h2>

                            <p
                                class="mt-2 max-w-lg
                                       text-sm leading-6
                                       text-slate-600"
                            >
                                Manage and verify financial records for your
                                <span class="font-semibold text-[#0b2e6f]">
                                    {{ Auth::user()->unit ?? 'Unit' }}
                                </span>.
                            </p>

                            <div
                                class="mt-4 h-1 w-12 rounded-full
                                       bg-[#d4af37]"
                            ></div>

                        </div>

                    </div>

                </section>


                {{-- UNIT FINANCE NOTICE --}}

                <section
                    class="mb-5 overflow-hidden rounded-xl
                           border border-[#ead99d]
                           bg-[#fffaf0] shadow-sm"
                >

                    <div
                        class="flex flex-col gap-4 p-5
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-11 w-11 shrink-0
                                       items-center justify-center
                                       rounded-full bg-[#f9e9b9]
                                       text-[#a37b0b]"
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
                                        d="M12 8v4l2.5 1.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p class="text-sm font-semibold text-[#7d5f08]">
                                    Unit finance only
                                </p>

                                <p class="mt-1 text-xs leading-5 text-slate-600">
                                    This dashboard is limited to financial
                                    records and payment requests from your
                                    assigned unit. Diocese-level financial
                                    management will be handled separately.
                                </p>

                            </div>

                        </div>

                        <span
                            class="inline-flex shrink-0 items-center
                                   justify-center rounded-full
                                   bg-[#0b2e6f] px-4 py-2
                                   text-[11px] font-semibold text-white"
                        >
                            Unit Treasurer
                        </span>

                    </div>

                </section>


                {{-- SUMMARY CARDS --}}

                <div
                    class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4"
                >

                    {{-- PENDING REQUESTS --}}

                    <a
                        href="#"
                        class="rounded-xl border border-amber-200
                               bg-amber-50/70 p-5 shadow-sm
                               transition hover:-translate-y-0.5
                               hover:shadow-md"
                    >

                        <div
                            class="flex h-10 w-10 items-center
                                   justify-center rounded-full
                                   bg-amber-100 text-amber-700"
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
                                    d="M12 8v4l2.5 1.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-xs font-medium text-amber-700">
                            Pending Requests
                        </p>

                        <p class="mt-1 text-2xl font-semibold text-amber-800">
                            0
                        </p>

                        <p class="mt-2 text-xs text-amber-700/70">
                            Awaiting your approval
                        </p>

                    </a>


                    {{-- APPROVED --}}

                    <a
                        href="#"
                        class="rounded-xl border border-emerald-200
                               bg-emerald-50/70 p-5 shadow-sm
                               transition hover:-translate-y-0.5
                               hover:shadow-md"
                    >

                        <div
                            class="flex h-10 w-10 items-center
                                   justify-center rounded-full
                                   bg-emerald-100 text-emerald-700"
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
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-xs font-medium text-emerald-700">
                            Approved Payments
                        </p>

                        <p class="mt-1 text-2xl font-semibold text-emerald-800">
                            0
                        </p>

                        <p class="mt-2 text-xs text-emerald-700/70">
                            Verified this month
                        </p>

                    </a>


                    {{-- MEMBERS --}}

                    <a
                        href="#"
                        class="rounded-xl border border-blue-100
                               bg-blue-50/60 p-5 shadow-sm
                               transition hover:-translate-y-0.5
                               hover:shadow-md"
                    >

                        <div
                            class="flex h-10 w-10 items-center
                                   justify-center rounded-full
                                   bg-blue-100 text-[#0b2e6f]"
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
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-xs font-medium text-[#0b2e6f]">
                            Unit Members
                        </p>

                        <p class="mt-1 text-2xl font-semibold text-slate-800">
                            0
                        </p>

                        <p class="mt-2 text-xs text-slate-500">
                            Members in your unit
                        </p>

                    </a>


                    {{-- MONTHLY COLLECTION --}}

                    <a
                        href="{{ route('treasurer.unit.dues') }}"
                        class="rounded-xl border border-[#ead99d]
                               bg-[#fffaf0] p-5 shadow-sm
                               transition hover:-translate-y-0.5
                               hover:shadow-md"
                    >

                        <div
                            class="flex h-10 w-10 items-center
                                   justify-center rounded-full
                                   bg-[#f9e9b9]
                                   text-[#a37b0b]"
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
                                    d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-xs font-medium text-[#0b2e6f]">
                            Monthly Collection
                        </p>

                        <p class="mt-1 text-2xl font-semibold text-slate-800">
                            ₱0.00
                        </p>

                        <p class="mt-2 text-xs text-slate-500">
                            Current month
                        </p>

                    </a>

                </div>


                {{-- ===================================================== --}}
                {{-- MAIN GRID --}}
                {{-- ===================================================== --}}

                <div
                    class="mt-5 grid gap-5
                           xl:grid-cols-[minmax(0,1fr)_360px]"
                >

                    {{-- LEFT COLUMN --}}

                    <div class="min-w-0">

                        {{-- PAYMENT REQUESTS --}}

                        <section
                            class="overflow-hidden rounded-xl
                                   border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="flex flex-col gap-2
                                       border-b border-slate-200
                                       px-5 py-4
                                       sm:flex-row sm:items-center
                                       sm:justify-between"
                            >

                                <div>

                                    <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                        Payment Requests
                                    </h3>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Review payment confirmations submitted
                                        by members of your unit.
                                    </p>

                                </div>

                                <a
                                    href="#"
                                    class="text-xs font-semibold
                                           text-[#0b2e6f] hover:underline"
                                >
                                    View all →
                                </a>

                            </div>


                            <div
                                class="flex min-h-[230px]
                                       flex-col items-center
                                       justify-center px-5 text-center"
                            >

                                <div
                                    class="flex h-14 w-14 items-center
                                           justify-center rounded-full
                                           bg-amber-50 text-[#a37b0b]"
                                >

                                    <svg
                                        class="h-7 w-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M12 5v14M5 12h14"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 text-sm font-medium text-[#0b2e6f]">
                                    No pending payment requests
                                </p>

                                <p class="mt-1 max-w-md text-xs leading-5 text-slate-500">
                                    Member payment confirmations submitted
                                    for your unit will appear here for
                                    verification and approval.
                                </p>

                            </div>

                        </section>


                        {{-- PAYMENT STATUS --}}

                        <section
                            class="mt-5 overflow-hidden rounded-xl
                                   border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-slate-200 px-5 py-4"
                            >

                                <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                    Unit Payment Status
                                </h3>

                                <p class="mt-1 text-xs text-slate-500">
                                    Overview of payment requests handled
                                    by your unit.
                                </p>

                            </div>


                            <div class="grid gap-3 p-5 sm:grid-cols-3">

                                <div
                                    class="rounded-lg border border-amber-200
                                           bg-amber-50 p-4"
                                >

                                    <p
                                        class="text-[11px] font-medium
                                               uppercase tracking-wide
                                               text-amber-700"
                                    >
                                        Pending
                                    </p>

                                    <p class="mt-1 text-2xl font-semibold text-amber-800">
                                        0
                                    </p>

                                    <p class="mt-1 text-[11px] text-amber-700/70">
                                        Need review
                                    </p>

                                </div>


                                <div
                                    class="rounded-lg border border-emerald-200
                                           bg-emerald-50 p-4"
                                >

                                    <p
                                        class="text-[11px] font-medium
                                               uppercase tracking-wide
                                               text-emerald-700"
                                    >
                                        Approved
                                    </p>

                                    <p class="mt-1 text-2xl font-semibold text-emerald-800">
                                        0
                                    </p>

                                    <p class="mt-1 text-[11px] text-emerald-700/70">
                                        Verified payments
                                    </p>

                                </div>


                                <div
                                    class="rounded-lg border border-red-200
                                           bg-red-50 p-4"
                                >

                                    <p
                                        class="text-[11px] font-medium
                                               uppercase tracking-wide
                                               text-red-700"
                                    >
                                        Rejected
                                    </p>

                                    <p class="mt-1 text-2xl font-semibold text-red-800">
                                        0
                                    </p>

                                    <p class="mt-1 text-[11px] text-red-700/70">
                                        Need attention
                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- RECENT PAYMENTS --}}

                        <section
                            class="mt-5 overflow-hidden rounded-xl
                                   border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="flex items-center justify-between
                                       border-b border-slate-200
                                       px-5 py-4"
                            >

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-9 w-9 items-center
                                               justify-center rounded-full
                                               bg-blue-50 text-[#0b2e6f]"
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
                                                stroke-width="1.7"
                                                d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6"
                                            />
                                        </svg>

                                    </div>

                                    <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                        Recent Unit Payments
                                    </h3>

                                </div>

                                <a
                                    href="#"
                                    class="text-xs font-medium
                                           text-[#0b2e6f] hover:underline"
                                >
                                    View all →
                                </a>

                            </div>


                            <div
                                class="flex min-h-[190px]
                                       flex-col items-center
                                       justify-center px-5 text-center"
                            >

                                <div
                                    class="flex h-12 w-12 items-center
                                           justify-center rounded-full
                                           bg-slate-100 text-slate-400"
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
                                            stroke-width="1.7"
                                            d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 text-sm font-medium text-[#0b2e6f]">
                                    No payment records yet
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Approved member payments will appear here.
                                </p>

                            </div>

                        </section>


                        {{-- UNIT FINANCIAL REPORT --}}

                        <section
                            class="mt-5 overflow-hidden rounded-xl
                                   border border-[#ead99d]
                                   bg-white shadow-sm"
                        >

                            <div
                                class="flex items-center justify-between
                                       border-b border-[#ead99d]
                                       bg-[#fffaf0] px-5 py-4"
                            >

                                <div>

                                    <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                        Unit Financial Report
                                    </h3>

                                    <p class="mt-1 text-[11px] text-slate-500">
                                        Summary of your unit's financial activity.
                                    </p>

                                </div>

                                <a
                                    href="#"
                                    class="text-xs font-medium text-[#0b2e6f]"
                                >
                                    View all →
                                </a>

                            </div>


                            <div class="grid gap-3 p-5 sm:grid-cols-3">

                                <div
                                    class="rounded-lg border border-blue-100
                                           bg-blue-50/60 p-4"
                                >

                                    <p class="text-[11px] text-slate-500">
                                        Collected
                                    </p>

                                    <p class="mt-1 text-xl font-semibold text-[#0b2e6f]">
                                        ₱0.00
                                    </p>

                                </div>


                                <div
                                    class="rounded-lg border border-amber-200
                                           bg-amber-50 p-4"
                                >

                                    <p class="text-[11px] text-slate-500">
                                        Pending
                                    </p>

                                    <p class="mt-1 text-xl font-semibold text-amber-800">
                                        ₱0.00
                                    </p>

                                </div>


                                <div
                                    class="rounded-lg border border-emerald-200
                                           bg-emerald-50 p-4"
                                >

                                    <p class="text-[11px] text-slate-500">
                                        Verified
                                    </p>

                                    <p class="mt-1 text-xl font-semibold text-emerald-800">
                                        ₱0.00
                                    </p>

                                </div>

                            </div>

                        </section>

                    </div>


                    {{-- ================================================= --}}
                    {{-- RIGHT COLUMN --}}
                    {{-- ================================================= --}}

                    <div class="space-y-5">

                        {{-- UNIT FINANCE --}}

                        <section
                            class="overflow-hidden rounded-xl
                                   border border-[#ead99d]
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-[#ead99d]
                                       bg-[#fffaf0] px-5 py-4"
                            >

                                <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                    Unit Finance
                                </h3>

                                <p class="mt-1 text-[11px] text-slate-500">
                                    Financial management for your unit
                                </p>

                            </div>


                            <div class="space-y-2 p-4">

                                {{-- PAYMENT REQUESTS --}}

                                <a
                                    href="#"
                                    class="flex items-center gap-3
                                           rounded-lg border
                                           border-slate-200 px-4 py-3
                                           transition hover:border-[#d4af37]
                                           hover:bg-[#fffaf0]"
                                >

                                    <div
                                        class="flex h-9 w-9 items-center
                                               justify-center rounded-lg
                                               bg-[#fff8e5] text-[#a37b0b]"
                                    >
                                        <span class="text-xl">+</span>
                                    </div>

                                    <div class="min-w-0">

                                        <p class="text-sm font-medium text-slate-700">
                                            Payment Requests
                                        </p>

                                        <p class="text-[11px] text-slate-400">
                                            Review member submissions
                                        </p>

                                    </div>

                                </a>


                                {{-- UNIT DUES --}}

                                <a
                                    href="{{ route('treasurer.unit.dues') }}"
                                    class="flex items-center gap-3
                                           rounded-lg border
                                           border-[#ead99d]
                                           bg-[#fffaf0]
                                           px-4 py-3
                                           transition hover:border-[#d4af37]"
                                >

                                    <div
                                        class="flex h-9 w-9 items-center
                                               justify-center rounded-lg
                                               bg-[#fff8e5]
                                               text-[#a37b0b]"
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
                                                d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6"
                                            />
                                        </svg>

                                    </div>

                                    <div class="min-w-0">

                                        <p class="text-sm font-medium text-slate-700">
                                            Unit Dues
                                        </p>

                                        <p class="text-[11px] text-slate-400">
                                            Manage monthly dues
                                        </p>

                                    </div>

                                </a>


                                {{-- PAYMENT RECORDS --}}

                                <a
                                    href="#"
                                    class="flex items-center gap-3
                                           rounded-lg border
                                           border-slate-200 px-4 py-3
                                           transition hover:border-blue-200
                                           hover:bg-blue-50"
                                >

                                    <div
                                        class="flex h-9 w-9 items-center
                                               justify-center rounded-lg
                                               bg-blue-50 text-[#123B8F]"
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
                                                d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM9 8h6M9 12h6M9 16h4"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-sm font-medium text-slate-700">
                                            Payment Records
                                        </p>

                                        <p class="text-[11px] text-slate-400">
                                            View verified unit payments
                                        </p>

                                    </div>

                                </a>


                                {{-- FINANCIAL REPORTS --}}

                                <a
                                    href="#"
                                    class="flex items-center gap-3
                                           rounded-lg border
                                           border-[#ead99d]
                                           bg-[#fffaf0]
                                           px-4 py-3
                                           transition hover:border-[#d4af37]"
                                >

                                    <div
                                        class="flex h-9 w-9 items-center
                                               justify-center rounded-lg
                                               bg-[#fff8e5] text-[#a37b0b]"
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
                                                d="M6 3h9l4 4v14H6V3zM14 3v5h5M9 12h6M9 16h6"
                                            />
                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-sm font-medium text-slate-700">
                                            Financial Reports
                                        </p>

                                        <p class="text-[11px] text-slate-400">
                                            Prepare unit reports
                                        </p>

                                    </div>

                                </a>

                            </div>

                        </section>


                        {{-- MY UNIT --}}

                        <section
                            class="rounded-xl border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-slate-200 px-5 py-4"
                            >

                                <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                    My Unit
                                </h3>

                            </div>

                            <div class="p-5">

                                <div
                                    class="rounded-lg border border-blue-100
                                           bg-blue-50/60 p-4"
                                >

                                    <p class="text-xs text-slate-500">
                                        Unit
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-[#0b2e6f]">
                                        {{ Auth::user()->unit ?? 'Not assigned' }}
                                    </p>

                                </div>


                                <div
                                    class="mt-3 rounded-lg border
                                           border-[#ead99d]
                                           bg-[#fffaf0] p-4"
                                >

                                    <p class="text-xs text-slate-500">
                                        Position
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-[#0b2e6f]">
                                        Unit Treasurer
                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- QUICK ACTIONS --}}

                        <section
                            class="rounded-xl border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-slate-200 px-5 py-4"
                            >

                                <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                    Quick Actions
                                </h3>

                            </div>

                            <div class="space-y-2 p-4">

                                <a
                                    href="{{ route('treasurer.unit.dues') }}"
                                    class="flex items-center justify-between
                                           rounded-lg border
                                           border-[#ead99d]
                                           bg-[#fffaf0] px-4 py-3
                                           transition hover:border-[#d4af37]"
                                >

                                    <span class="text-sm font-medium text-slate-700">
                                        Manage Unit Dues
                                    </span>

                                    <span class="text-lg text-[#a37b0b]">
                                        ›
                                    </span>

                                </a>


                                <a
                                    href="#"
                                    class="flex items-center justify-between
                                           rounded-lg border border-blue-100
                                           bg-blue-50/50 px-4 py-3
                                           transition hover:border-blue-200"
                                >

                                    <span class="text-sm font-medium text-slate-700">
                                        View Unit Payments
                                    </span>

                                    <span class="text-lg text-[#0b2e6f]">
                                        ›
                                    </span>

                                </a>


                                <a
                                    href="#"
                                    class="flex items-center justify-between
                                           rounded-lg border border-blue-100
                                           bg-blue-50/50 px-4 py-3
                                           transition hover:border-blue-200"
                                >

                                    <span class="text-sm font-medium text-slate-700">
                                        View Unit Members
                                    </span>

                                    <span class="text-lg text-[#0b2e6f]">
                                        ›
                                    </span>

                                </a>


                                <a
                                    href="#"
                                    class="flex items-center justify-between
                                           rounded-lg border border-[#ead99d]
                                           bg-[#fffaf0] px-4 py-3
                                           transition hover:border-[#d4af37]"
                                >

                                    <span class="text-sm font-medium text-slate-700">
                                        Prepare Financial Report
                                    </span>

                                    <span class="text-lg text-[#a37b0b]">
                                        ›
                                    </span>

                                </a>

                            </div>

                        </section>


                        {{-- ACCOUNT INFORMATION --}}

                        <section
                            class="rounded-xl border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-slate-200 px-5 py-4"
                            >

                                <h3 class="text-sm font-semibold text-[#0b2e6f]">
                                    Account Information
                                </h3>

                            </div>

                            <div class="divide-y divide-slate-100">

                                <div
                                    class="flex items-center justify-between
                                           px-5 py-4"
                                >

                                    <span class="text-xs text-slate-500">
                                        Name
                                    </span>

                                    <span
                                        class="text-right text-xs
                                               font-medium text-[#0b2e6f]"
                                    >
                                        {{ Auth::user()->name }}
                                    </span>

                                </div>


                                <div
                                    class="flex items-center justify-between
                                           px-5 py-4"
                                >

                                    <span class="text-xs text-slate-500">
                                        Role
                                    </span>

                                    <span
                                        class="text-right text-xs
                                               font-medium text-[#0b2e6f]"
                                    >
                                        Unit Treasurer
                                    </span>

                                </div>


                                <div
                                    class="flex items-center justify-between
                                           px-5 py-4"
                                >

                                    <span class="text-xs text-slate-500">
                                        Status
                                    </span>

                                    <span
                                        class="rounded-full bg-[#fff5d6]
                                               px-2.5 py-1 text-[10px]
                                               font-semibold text-[#96700b]"
                                    >
                                        Active
                                    </span>

                                </div>

                            </div>

                        </section>

                    </div>

                </div>


                {{-- FOOTER --}}

                <footer class="mt-8 pb-4 text-center">

                    <p class="text-[11px] text-slate-400">
                        CWL Diocese of Imus · Unit Finance Management
                    </p>

                </footer>

            </main>

        </div>

    </div>

</x-app-layout>