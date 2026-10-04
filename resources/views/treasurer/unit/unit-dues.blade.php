<x-app-layout>

    <div
        x-data="{
            sidebarOpen: false,
            yearlyDueOpen: false,
            paymentOpen: false
        }"
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
                        class="flex items-center gap-3 rounded-lg
                               px-4 py-3 text-sm transition
                               {{ request()->routeIs('treasurer.unit.dashboard')
                                    ? 'bg-[#d4af37] font-semibold text-[#09275d] shadow-sm'
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
                                d="M12 5v14M5 12h14"
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
                                d="M12 3v18M16.5 7.5h-6a2.5 2.5 0 000 5h3a2.5 2.5 0 010 5h-6"
                            />
                        </svg>

                        <span>Member Payments</span>

                    </a>


                    {{-- UNIT DUES --}}

                    <a
                        href="{{ route('treasurer.unit.dues') }}"
                        class="flex items-center gap-3 rounded-lg
                               bg-[#d4af37] px-4 py-3 text-sm
                               font-semibold text-[#09275d] shadow-sm"
                        aria-current="page"
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

                        <div class="relative">

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

                            <span
                                class="absolute -right-2 -top-2
                                       flex h-4 min-w-4 items-center
                                       justify-center rounded-full
                                       bg-[#d4af37] px-1 text-[8px]
                                       font-bold text-[#09275d]"
                            >
                                1
                            </span>

                        </div>

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


                    <div class="ml-auto flex items-center gap-3">

                        {{-- HEADER NOTIFICATION --}}

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

                            <span
                                class="absolute right-1 top-1
                                       flex h-4 min-w-4 items-center
                                       justify-center rounded-full
                                       bg-[#d4af37] px-1 text-[8px]
                                       font-bold text-[#09275d]"
                            >
                                1
                            </span>

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
                                           bg-[#f8faff] px-5 py-6"
                                >

                                    <div
                                        class="flex flex-col
                                               items-center text-center"
                                    >

                                        <div
                                            class="flex h-16 w-16
                                                   items-center justify-center
                                                   rounded-full
                                                   border-2 border-[#D4AF37]
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
                                                   font-semibold text-[#123B8F]"
                                        >
                                            {{ Auth::user()->first_name }}
                                            {{ Auth::user()->last_name }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            {{ '@' . (
                                                Auth::user()->username
                                                ?? Str::before(
                                                    Auth::user()->email,
                                                    '@'
                                                )
                                            ) }}
                                        </p>

                                        <span
                                            class="mt-2 inline-flex rounded-full
                                                   bg-[#FFF8E5] px-3 py-1
                                                   text-[10px] font-bold
                                                   uppercase tracking-wide
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
                                               transition hover:bg-[#f8faff]"
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
                                               transition hover:bg-[#fffaf0]"
                                    >

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                                   items-center justify-center
                                                   rounded-lg bg-[#fff8e5]
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
                                               transition hover:bg-[#f8faff]"
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
                                               transition hover:bg-[#f8faff]"
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
                                                   text-left text-sm text-red-600
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


                {{-- ===================================================== --}}
                {{-- PAGE HERO --}}
                {{-- ===================================================== --}}

                <section
                    class="relative mb-5 overflow-hidden rounded-2xl
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
                        class="relative z-10 px-7 py-7 sm:px-8"
                    >

                        <div
                            class="flex flex-col gap-5
                                   sm:flex-row sm:items-center
                                   sm:justify-between"
                        >

                            <div>

                                <p class="text-sm font-medium text-[#0b2e6f]/70">
                                    Unit Finance
                                </p>

                                <h2
                                    class="mt-1 font-serif text-3xl
                                           font-semibold text-[#0b2e6f]
                                           sm:text-[34px]"
                                >
                                    Unit Dues
                                </h2>

                                <p
                                    class="mt-2 max-w-2xl text-sm
                                           leading-6 text-slate-600"
                                >
                                    View your unit's yearly payment to the
                                    Diocese and manage the monthly dues
                                    collected from members.
                                </p>

                                <div
                                    class="mt-4 h-1 w-12 rounded-full
                                           bg-[#d4af37]"
                                ></div>

                            </div>


                            <a
                                href="{{ route('treasurer.unit.dashboard') }}"
                                class="inline-flex items-center justify-center
                                       rounded-lg border border-[#dbe2ef]
                                       bg-white px-4 py-2.5 text-xs
                                       font-semibold text-[#0b2e6f]
                                       transition hover:border-[#d4af37]
                                       hover:bg-[#fffaf0]"
                            >
                                ← Back to Dashboard
                            </a>

                        </div>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- APPROVAL NOTICE --}}
                {{-- ===================================================== --}}

                <section
                    class="mb-5 overflow-hidden rounded-xl
                           border border-amber-200
                           bg-amber-50/70"
                >

                    <div class="p-5">

                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-11 w-11 shrink-0
                                       items-center justify-center
                                       rounded-full bg-white
                                       text-amber-600 shadow-sm"
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
                                        d="M12 9v4m0 4h.01M10.3 3.6l-8 14A2 2 0 004 20.6h16a2 2 0 001.7-3l-8-14a2 2 0 00-3.4 0z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p class="text-sm font-semibold text-amber-900">
                                    Diocesan approval is required
                                </p>

                                <p class="mt-1 text-xs leading-5 text-amber-800/80">
                                    When the Unit Treasurer records a yearly
                                    payment, a payment notification is sent
                                    to the Diocesan Treasurer for review.
                                    The payment is only officially recorded
                                    after the Diocesan Treasurer approves it.
                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- SIMPLE EXPLANATION --}}
                {{-- ===================================================== --}}

                <section
                    class="mb-5 overflow-hidden rounded-xl
                           border border-blue-100
                           bg-blue-50/60"
                >

                    <div class="p-5">

                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-11 w-11 shrink-0
                                       items-center justify-center
                                       rounded-full bg-white
                                       text-[#0b2e6f] shadow-sm"
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
                                        d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p class="text-sm font-semibold text-[#0b2e6f]">
                                    How unit dues work
                                </p>

                                <p class="mt-1 text-xs leading-5 text-slate-600">
                                    The Diocese sets the yearly amount. Your
                                    Unit Treasurer records the payment and
                                    submits a notification to the Diocesan
                                    Treasurer. The payment becomes official
                                    only after diocesan approval.
                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- YEARLY DUES --}}
                {{-- ===================================================== --}}

                <section class="mb-5">

                    <div class="mb-3">

                        <h3
                            class="text-base font-semibold
                                   text-[#0b2e6f]"
                        >
                            Yearly Unit Due
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            Your unit's required payment to the Diocese.
                        </p>

                    </div>


                    <div
                        class="grid gap-4
                               lg:grid-cols-[minmax(0,1fr)_280px]"
                    >


                        {{-- MAIN YEARLY CARD --}}

                        <div
                            class="overflow-hidden rounded-xl
                                   border border-[#ead99d]
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-[#ead99d]
                                       bg-[#fffaf0] px-5 py-4"
                            >

                                <div
                                    class="flex flex-col gap-3
                                           sm:flex-row sm:items-center
                                           sm:justify-between"
                                >

                                    <div>

                                        <p class="text-xs text-slate-500">
                                            Current Year
                                        </p>

                                        <p
                                            class="mt-1 text-lg font-semibold
                                                   text-[#0b2e6f]"
                                        >
                                            {{ date('Y') }}
                                        </p>

                                    </div>

                                    <span
                                        class="inline-flex w-fit rounded-full
                                               bg-amber-100 px-3 py-1.5
                                               text-xs font-semibold
                                               text-amber-700"
                                    >
                                        Awaiting Payment
                                    </span>

                                </div>

                            </div>


                            <div class="p-5">

                                <div
                                    class="grid gap-3
                                           sm:grid-cols-3"
                                >

                                    <div
                                        class="rounded-lg border
                                               border-blue-100
                                               bg-blue-50/60 p-4"
                                    >

                                        <p class="text-xs text-slate-500">
                                            Amount Due
                                        </p>

                                        <p
                                            class="mt-1 text-2xl font-semibold
                                                   text-[#0b2e6f]"
                                        >
                                            ₱0.00
                                        </p>

                                    </div>


                                    <div
                                        class="rounded-lg border
                                               border-emerald-200
                                               bg-emerald-50/60 p-4"
                                    >

                                        <p class="text-xs text-slate-500">
                                            Amount Paid
                                        </p>

                                        <p
                                            class="mt-1 text-2xl font-semibold
                                                   text-emerald-700"
                                        >
                                            ₱0.00
                                        </p>

                                    </div>


                                    <div
                                        class="rounded-lg border
                                               border-amber-200
                                               bg-amber-50/60 p-4"
                                    >

                                        <p class="text-xs text-slate-500">
                                            Remaining
                                        </p>

                                        <p
                                            class="mt-1 text-2xl font-semibold
                                                   text-amber-700"
                                        >
                                            ₱0.00
                                        </p>

                                    </div>

                                </div>


                                {{-- APPROVAL STATUS --}}

                                <div
                                    class="mt-5 rounded-lg border
                                           border-blue-100
                                           bg-blue-50/50 p-4"
                                >

                                    <div
                                        class="flex flex-col gap-3
                                               sm:flex-row sm:items-center
                                               sm:justify-between"
                                    >

                                        <div>

                                            <p
                                                class="text-sm font-semibold
                                                       text-[#0b2e6f]"
                                            >
                                                Payment Approval Status
                                            </p>

                                            <p
                                                class="mt-1 text-xs leading-5
                                                       text-slate-500"
                                            >
                                                No payment has been submitted
                                                for diocesan approval yet.
                                            </p>

                                        </div>

                                        <span
                                            class="inline-flex w-fit
                                                   items-center gap-1.5
                                                   rounded-full
                                                   bg-slate-100 px-3 py-1.5
                                                   text-xs font-semibold
                                                   text-slate-600"
                                        >

                                            <span
                                                class="h-1.5 w-1.5
                                                       rounded-full
                                                       bg-slate-400"
                                            ></span>

                                            Not Submitted

                                        </span>

                                    </div>

                                </div>


                                {{-- SIMPLE ACTION --}}

                                <div
                                    class="mt-5 flex flex-col gap-3
                                           rounded-lg border
                                           border-slate-200
                                           bg-slate-50 p-4
                                           sm:flex-row sm:items-center
                                           sm:justify-between"
                                >

                                    <div>

                                        <p class="text-sm font-medium text-slate-700">
                                            Ready to record a payment?
                                        </p>

                                        <p class="mt-1 text-xs text-slate-500">
                                            Submit the payment information for
                                            review by the Diocesan Treasurer.
                                        </p>

                                    </div>


                                    <button
                                        type="button"
                                        @click="paymentOpen = true"
                                        class="inline-flex items-center
                                               justify-center rounded-lg
                                               bg-[#0b2e6f] px-4 py-2.5
                                               text-xs font-semibold
                                               text-white transition
                                               hover:bg-[#09275d]"
                                    >
                                        Submit Payment
                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- WHO DOES WHAT --}}

                        <div
                            class="rounded-xl border border-slate-200
                                   bg-white shadow-sm"
                        >

                            <div
                                class="border-b border-slate-200
                                       px-5 py-4"
                            >

                                <h3
                                    class="text-sm font-semibold
                                           text-[#0b2e6f]"
                                >
                                    Who Handles It?
                                </h3>

                            </div>


                            <div class="space-y-3 p-4">

                                {{-- DIOCESAN TREASURER --}}

                                <div
                                    class="rounded-lg border
                                           border-blue-100
                                           bg-blue-50/50 p-4"
                                >

                                    <div class="flex items-start gap-3">

                                        <div
                                            class="flex h-9 w-9 shrink-0
                                                   items-center justify-center
                                                   rounded-full
                                                   bg-white text-[#0b2e6f]"
                                        >
                                            1
                                        </div>

                                        <div>

                                            <p
                                                class="text-sm font-semibold
                                                       text-[#0b2e6f]"
                                            >
                                                Diocesan Treasurer
                                            </p>

                                            <p
                                                class="mt-1 text-[11px]
                                                       leading-5 text-slate-500"
                                            >
                                                Sets the yearly amount due
                                                and approves submitted
                                                payment notifications.
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- UNIT TREASURER --}}

                                <div
                                    class="rounded-lg border
                                           border-[#ead99d]
                                           bg-[#fffaf0] p-4"
                                >

                                    <div class="flex items-start gap-3">

                                        <div
                                            class="flex h-9 w-9 shrink-0
                                                   items-center justify-center
                                                   rounded-full
                                                   bg-white text-[#a37b0b]"
                                        >
                                            2
                                        </div>

                                        <div>

                                            <p
                                                class="text-sm font-semibold
                                                       text-[#0b2e6f]"
                                            >
                                                Unit Treasurer
                                            </p>

                                            <p
                                                class="mt-1 text-[11px]
                                                       leading-5 text-slate-500"
                                            >
                                                Records the payment and sends
                                                the notification to the
                                                Diocesan Treasurer.
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- DIOCESAN APPROVAL --}}

                                <div
                                    class="rounded-lg border
                                           border-amber-200
                                           bg-amber-50/60 p-4"
                                >

                                    <div class="flex items-start gap-3">

                                        <div
                                            class="flex h-9 w-9 shrink-0
                                                   items-center justify-center
                                                   rounded-full
                                                   bg-white text-amber-600"
                                        >
                                            3
                                        </div>

                                        <div>

                                            <p
                                                class="text-sm font-semibold
                                                       text-amber-900"
                                            >
                                                Payment Approval
                                            </p>

                                            <p
                                                class="mt-1 text-[11px]
                                                       leading-5 text-amber-800/70"
                                            >
                                                The Diocesan Treasurer reviews
                                                and approves the notification.
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- RECORD COMPLETE --}}

                                <div
                                    class="rounded-lg border
                                           border-emerald-200
                                           bg-emerald-50/50 p-4"
                                >

                                    <div class="flex items-start gap-3">

                                        <div
                                            class="flex h-9 w-9 shrink-0
                                                   items-center justify-center
                                                   rounded-full
                                                   bg-white text-emerald-600"
                                        >
                                            ✓
                                        </div>

                                        <div>

                                            <p
                                                class="text-sm font-semibold
                                                       text-emerald-800"
                                            >
                                                Payment Recorded
                                            </p>

                                            <p
                                                class="mt-1 text-[11px]
                                                       leading-5 text-emerald-700/70"
                                            >
                                                The payment becomes an official
                                                financial record after approval.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- MEMBER MONTHLY DUES --}}
                {{-- ===================================================== --}}

                <section
                    class="mb-5 overflow-hidden rounded-xl
                           border border-slate-200
                           bg-white shadow-sm"
                >

                    <div
                        class="flex flex-col gap-3
                               border-b border-slate-200
                               px-5 py-4
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <div>

                            <h3
                                class="text-sm font-semibold
                                       text-[#0b2e6f]"
                            >
                                Member Monthly Dues
                            </h3>

                            <p class="mt-1 text-xs text-slate-500">
                                Payments submitted by members of your unit.
                            </p>

                        </div>

                        <button
                            type="button"
                            class="inline-flex items-center
                                   justify-center rounded-lg
                                   border border-[#d4af37]
                                   bg-[#fffaf0] px-4 py-2.5
                                   text-xs font-semibold
                                   text-[#8b690d]
                                   transition hover:bg-[#fff4cf]"
                        >
                            Set Monthly Due
                        </button>

                    </div>


                    <div class="p-5">


                        {{-- SIMPLE MEMBER FLOW --}}

                        <div
                            class="mb-5 rounded-xl
                                   border border-blue-100
                                   bg-blue-50/50 p-5"
                        >

                            <p
                                class="text-sm font-semibold
                                       text-[#0b2e6f]"
                            >
                                Member Payment Process
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                Members submit their payment. The Unit
                                Treasurer checks and approves the payment
                                before it is recorded.
                            </p>


                            <div
                                class="mt-5 grid gap-3
                                       md:grid-cols-3"
                            >

                                {{-- STEP 1 --}}

                                <div
                                    class="rounded-lg border
                                           border-slate-200
                                           bg-white p-4"
                                >

                                    <div
                                        class="flex h-9 w-9
                                               items-center justify-center
                                               rounded-full
                                               bg-blue-100
                                               text-sm font-bold
                                               text-[#0b2e6f]"
                                    >
                                        1
                                    </div>

                                    <p
                                        class="mt-3 text-sm font-semibold
                                               text-[#0b2e6f]"
                                    >
                                        Member Pays
                                    </p>

                                    <p
                                        class="mt-1 text-xs leading-5
                                               text-slate-500"
                                    >
                                        Member submits the payment
                                        information.
                                    </p>

                                </div>


                                {{-- STEP 2 --}}

                                <div
                                    class="rounded-lg border
                                           border-slate-200
                                           bg-white p-4"
                                >

                                    <div
                                        class="flex h-9 w-9
                                               items-center justify-center
                                               rounded-full
                                               bg-[#fff1bd]
                                               text-sm font-bold
                                               text-[#8b690d]"
                                    >
                                        2
                                    </div>

                                    <p
                                        class="mt-3 text-sm font-semibold
                                               text-[#0b2e6f]"
                                    >
                                        Treasurer Checks
                                    </p>

                                    <p
                                        class="mt-1 text-xs leading-5
                                               text-slate-500"
                                    >
                                        Unit Treasurer checks and approves
                                        the member payment.
                                    </p>

                                </div>


                                {{-- STEP 3 --}}

                                <div
                                    class="rounded-lg border
                                           border-slate-200
                                           bg-white p-4"
                                >

                                    <div
                                        class="flex h-9 w-9
                                               items-center justify-center
                                               rounded-full
                                               bg-emerald-100
                                               text-sm font-bold
                                               text-emerald-700"
                                    >
                                        ✓
                                    </div>

                                    <p
                                        class="mt-3 text-sm font-semibold
                                               text-[#0b2e6f]"
                                    >
                                        Payment Recorded
                                    </p>

                                    <p
                                        class="mt-1 text-xs leading-5
                                               text-slate-500"
                                    >
                                        The approved payment is added to
                                        the member's record.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- MEMBER SUMMARY --}}

                        <div
                            class="grid gap-3
                                   sm:grid-cols-3"
                        >

                            <div
                                class="rounded-lg border
                                       border-blue-100
                                       bg-blue-50/60 p-4"
                            >

                                <p class="text-xs text-slate-500">
                                    Monthly Due
                                </p>

                                <p
                                    class="mt-1 text-xl font-semibold
                                           text-[#0b2e6f]"
                                >
                                    ₱0.00
                                </p>

                            </div>


                            <div
                                class="rounded-lg border
                                       border-amber-200
                                       bg-amber-50/60 p-4"
                            >

                                <p class="text-xs text-slate-500">
                                    Waiting for Approval
                                </p>

                                <p
                                    class="mt-1 text-xl font-semibold
                                           text-amber-700"
                                >
                                    0
                                </p>

                            </div>


                            <div
                                class="rounded-lg border
                                       border-emerald-200
                                       bg-emerald-50/60 p-4"
                            >

                                <p class="text-xs text-slate-500">
                                    Approved This Month
                                </p>

                                <p
                                    class="mt-1 text-xl font-semibold
                                           text-emerald-700"
                                >
                                    0
                                </p>

                            </div>

                        </div>


                        {{-- EMPTY MEMBER PAYMENT LIST --}}

                        <div
                            class="mt-5 rounded-lg border
                                   border-slate-200"
                        >

                            <div
                                class="flex items-center justify-between
                                       border-b border-slate-200
                                       px-5 py-4"
                            >

                                <div>

                                    <p
                                        class="text-sm font-semibold
                                               text-[#0b2e6f]"
                                    >
                                        Recent Member Payments
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        Payments waiting for your approval
                                        will appear here.
                                    </p>

                                </div>

                                <a
                                    href="#"
                                    class="text-xs font-semibold
                                           text-[#0b2e6f]
                                           hover:underline"
                                >
                                    View all →
                                </a>

                            </div>


                            <div
                                class="flex min-h-[170px]
                                       flex-col items-center
                                       justify-center px-5
                                       text-center"
                            >

                                <div
                                    class="flex h-12 w-12
                                           items-center justify-center
                                           rounded-full
                                           bg-slate-100
                                           text-slate-400"
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
                                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z"
                                        />
                                    </svg>

                                </div>

                                <p
                                    class="mt-3 text-sm font-medium
                                           text-[#0b2e6f]"
                                >
                                    No payments waiting for approval
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    New member payment submissions will appear here.
                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- PAYMENT HISTORY --}}
                {{-- ===================================================== --}}

                <section
                    class="mb-5 overflow-hidden rounded-xl
                           border border-slate-200
                           bg-white shadow-sm"
                >

                    <div
                        class="flex items-center justify-between
                               border-b border-slate-200
                               px-5 py-4"
                    >

                        <div>

                            <h3
                                class="text-sm font-semibold
                                       text-[#0b2e6f]"
                            >
                                Payment History
                            </h3>

                            <p class="mt-1 text-xs text-slate-500">
                                Payments approved by the Diocesan Treasurer
                                and officially recorded for your unit.
                            </p>

                        </div>

                        <a
                            href="#"
                            class="text-xs font-semibold
                                   text-[#0b2e6f]
                                   hover:underline"
                        >
                            View all →
                        </a>

                    </div>


                    <div
                        class="flex min-h-[180px]
                               flex-col items-center
                               justify-center px-5 text-center"
                    >

                        <div
                            class="flex h-12 w-12
                                   items-center justify-center
                                   rounded-full bg-blue-50
                                   text-[#0b2e6f]"
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
                                    d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM9 8h6M9 12h6M9 16h4"
                                />
                            </svg>

                        </div>

                        <p
                            class="mt-4 text-sm font-medium
                                   text-[#0b2e6f]"
                        >
                            No payment history yet
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            Payments approved by the Diocesan Treasurer
                            will appear here.
                        </p>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- RIGHT INFORMATION --}}
                {{-- ===================================================== --}}

                <section
                    class="overflow-hidden rounded-xl
                           border border-slate-200
                           bg-white shadow-sm"
                >

                    <div
                        class="border-b border-slate-200
                               px-5 py-4"
                    >

                        <h3
                            class="text-sm font-semibold
                                   text-[#0b2e6f]"
                        >
                            My Unit
                        </h3>

                    </div>


                    <div
                        class="grid gap-3 p-5
                               sm:grid-cols-2"
                    >

                        <div
                            class="rounded-lg border
                                   border-blue-100
                                   bg-blue-50/60 p-4"
                        >

                            <p class="text-xs text-slate-500">
                                Unit
                            </p>

                            <p
                                class="mt-1 text-sm font-semibold
                                       text-[#0b2e6f]"
                            >
                                {{ Auth::user()->unit ?? 'Not assigned' }}
                            </p>

                        </div>


                        <div
                            class="rounded-lg border
                                   border-[#ead99d]
                                   bg-[#fffaf0] p-4"
                        >

                            <p class="text-xs text-slate-500">
                                Position
                            </p>

                            <p
                                class="mt-1 text-sm font-semibold
                                       text-[#0b2e6f]"
                            >
                                Unit Treasurer
                            </p>

                        </div>

                    </div>

                </section>


                {{-- ===================================================== --}}
                {{-- YEARLY PAYMENT MODAL --}}
                {{-- ===================================================== --}}

                <div
                    x-show="paymentOpen"
                    x-transition.opacity
                    class="fixed inset-0 z-[100]
                           flex items-center justify-center
                           bg-black/40 px-4"
                    style="display: none;"
                >

                    <div
                        @click.outside="paymentOpen = false"
                        x-transition
                        class="w-full max-w-md
                               overflow-hidden rounded-2xl
                               bg-white shadow-2xl"
                    >

                        <div
                            class="border-b border-slate-200
                                   bg-[#f8faff] px-6 py-5"
                        >

                            <div
                                class="flex items-center
                                       justify-between"
                            >

                                <div>

                                    <p
                                        class="text-xs font-medium
                                               text-[#0b2e6f]/60"
                                    >
                                        Yearly Unit Due
                                    </p>

                                    <h3
                                        class="mt-1 text-lg font-semibold
                                               text-[#0b2e6f]"
                                    >
                                        Submit Payment
                                    </h3>

                                </div>


                                <button
                                    type="button"
                                    @click="paymentOpen = false"
                                    class="rounded-lg p-2
                                           text-slate-400
                                           hover:bg-slate-100
                                           hover:text-slate-600"
                                >
                                    ✕
                                </button>

                            </div>

                        </div>


                        <div class="space-y-4 p-6">

                            {{-- APPROVAL EXPLANATION --}}

                            <div
                                class="rounded-lg border
                                       border-amber-200
                                       bg-amber-50 p-4"
                            >

                                <div class="flex items-start gap-3">

                                    <svg
                                        class="mt-0.5 h-5 w-5 shrink-0
                                               text-amber-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M12 9v4m0 4h.01M10.3 3.6l-8 14A2 2 0 004 20.6h16a2 2 0 001.7-3l-8-14a2 2 0 00-3.4 0z"
                                        />
                                    </svg>

                                    <p
                                        class="text-xs leading-5
                                               text-amber-800"
                                    >
                                        This submission will notify the
                                        <strong>Diocesan Treasurer</strong>.
                                        The payment will remain pending until
                                        it is reviewed and approved.
                                    </p>

                                </div>

                            </div>


                            <div
                                class="rounded-lg border
                                       border-blue-100
                                       bg-blue-50/60 p-4"
                            >

                                <p class="text-xs text-slate-500">
                                    Amount Due
                                </p>

                                <p
                                    class="mt-1 text-2xl font-semibold
                                           text-[#0b2e6f]"
                                >
                                    ₱0.00
                                </p>

                            </div>


                            <div>

                                <label
                                    class="text-xs font-semibold
                                           text-slate-600"
                                >
                                    Amount Paid
                                </label>

                                <input
                                    type="number"
                                    min="0"
                                    step="0.01"
                                    placeholder="Enter amount"
                                    class="mt-1.5 w-full rounded-lg
                                           border border-slate-200
                                           px-4 py-3 text-sm
                                           focus:border-[#0b2e6f]
                                           focus:ring-[#0b2e6f]"
                                />

                            </div>


                            <div>

                                <label
                                    class="text-xs font-semibold
                                           text-slate-600"
                                >
                                    Payment Date
                                </label>

                                <input
                                    type="date"
                                    class="mt-1.5 w-full rounded-lg
                                           border border-slate-200
                                           px-4 py-3 text-sm
                                           focus:border-[#0b2e6f]
                                           focus:ring-[#0b2e6f]"
                                />

                            </div>


                            <div>

                                <label
                                    class="text-xs font-semibold
                                           text-slate-600"
                                >
                                    Notes
                                </label>

                                <textarea
                                    rows="3"
                                    placeholder="Optional note"
                                    class="mt-1.5 w-full rounded-lg
                                           border border-slate-200
                                           px-4 py-3 text-sm
                                           focus:border-[#0b2e6f]
                                           focus:ring-[#0b2e6f]"
                                ></textarea>

                            </div>


                            {{-- APPROVAL FLOW --}}

                            <div
                                class="rounded-lg border
                                       border-slate-200
                                       bg-slate-50 p-4"
                            >

                                <p
                                    class="text-xs font-semibold
                                           text-[#0b2e6f]"
                                >
                                    After submission
                                </p>

                                <div class="mt-3 space-y-3">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-7 w-7
                                                   shrink-0 items-center
                                                   justify-center
                                                   rounded-full
                                                   bg-[#0b2e6f]
                                                   text-[10px] font-bold
                                                   text-white"
                                        >
                                            1
                                        </div>

                                        <p class="text-xs text-slate-600">
                                            Payment notification is sent.
                                        </p>

                                    </div>


                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-7 w-7
                                                   shrink-0 items-center
                                                   justify-center
                                                   rounded-full
                                                   bg-[#d4af37]
                                                   text-[10px] font-bold
                                                   text-[#09275d]"
                                        >
                                            2
                                        </div>

                                        <p class="text-xs text-slate-600">
                                            Diocesan Treasurer reviews it.
                                        </p>

                                    </div>


                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-7 w-7
                                                   shrink-0 items-center
                                                   justify-center
                                                   rounded-full
                                                   bg-emerald-600
                                                   text-[10px] font-bold
                                                   text-white"
                                        >
                                            3
                                        </div>

                                        <p class="text-xs text-slate-600">
                                            Approved payment becomes official.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div
                            class="flex items-center justify-end gap-2
                                   border-t border-slate-200
                                   px-6 py-4"
                        >

                            <button
                                type="button"
                                @click="paymentOpen = false"
                                class="rounded-lg border
                                       border-slate-200 px-4 py-2.5
                                       text-xs font-semibold
                                       text-slate-600
                                       hover:bg-slate-50"
                            >
                                Cancel
                            </button>


                            <button
                                type="button"
                                class="rounded-lg bg-[#0b2e6f]
                                       px-4 py-2.5 text-xs
                                       font-semibold text-white
                                       hover:bg-[#09275d]"
                            >
                                Submit for Approval
                            </button>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- FOOTER --}}
                {{-- ===================================================== --}}

                <footer class="mt-8 pb-4 text-center">

                    <p class="text-[11px] text-slate-400">
                        CWL Diocese of Imus · Unit Finance Management
                    </p>

                </footer>

            </main>

        </div>

    </div>

</x-app-layout>