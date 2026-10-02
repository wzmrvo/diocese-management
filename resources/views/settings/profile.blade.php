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
                    Main Menu
                </p>


                <div class="space-y-1">

                    {{-- DASHBOARD --}}

                    <a
                        href="{{ url('/member') }}"
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
                                d="M3 10.5L12 3l9 7.5M5.5 9.5V21h13V9.5M9 21v-6h6v6"
                            />
                        </svg>

                        <span>Dashboard</span>

                    </a>


                    {{-- MEETING RECORDS --}}

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
                                d="M7 3v4M17 3v4M4 9h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1zM8 13h3M8 17h6"
                            />
                        </svg>

                        <span>Meeting Records</span>

                    </a>


                    {{-- MINUTES --}}

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
                                d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM9 8h6M9 12h6M9 16h4"
                            />
                        </svg>

                        <span>Minutes / MOTM</span>

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
                                d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM9 8h6M9 12h6M9 16h3"
                            />
                        </svg>

                        <span>Financial Reports</span>

                    </a>


                    {{-- MY UNIT --}}

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
                                d="M4 21V5a2 2 0 012-2h12a2 2 0 012 2v16M8 7h2M14 7h2M8 11h2M14 11h2M8 15h2M14 15h2M10 21v-4h4v4"
                            />
                        </svg>

                        <span>My Unit</span>

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


            {{-- ===================================================== --}}
            {{-- SIDEBAR FOOTER --}}
            {{-- ===================================================== --}}

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
                    Organizational Records & Transparency
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
                        class="ml-auto flex items-center gap-3"
                    >

                        {{-- NOTIFICATIONS --}}

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


                        {{-- ================================================= --}}
                        {{-- PROFILE DROPDOWN --}}
                        {{-- ================================================= --}}

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
                                           rounded-full border-2
                                           border-[#D4AF37]
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


                            {{-- DROPDOWN --}}

                            <div
                                x-show="profileOpen"
                                x-transition
                                @click.outside="profileOpen = false"
                                class="absolute right-0 top-full z-[100]
                                       mt-3 w-80 overflow-hidden
                                       rounded-2xl border border-blue-100
                                       bg-white shadow-xl"
                                style="display:none;"
                            >

                                {{-- PROFILE HEADER --}}

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
                                                   rounded-full border-2
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
                                                   font-bold uppercase
                                                   tracking-wide
                                                   text-[#B18B1F]"
                                        >

                                            {{ ucfirst(
                                                Auth::user()->role
                                                    ?? 'Member'
                                            ) }}

                                        </span>

                                    </div>

                                </div>


                                {{-- OPTIONS --}}

                                <div class="p-2">

                                    {{-- PROFILE --}}

                                    <a
                                        href="{{ route('settings.profile') }}"
                                        class="flex items-center gap-3
                                               rounded-xl bg-[#f8faff]
                                               px-3 py-3"
                                    >

                                        <div
                                            class="flex h-10 w-10
                                                   shrink-0 items-center
                                                   justify-center rounded-lg
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

                                            <p
                                                class="text-sm font-medium
                                                       text-slate-700"
                                            >
                                                Profile
                                            </p>

                                            <p
                                                class="text-[11px]
                                                       text-slate-400"
                                            >
                                                Personal information
                                            </p>

                                        </div>

                                    </a>


                                    {{-- SECURITY --}}

                                    <a
                                        href="{{ route('settings.security') }}"
                                        class="mt-1 flex items-center gap-3
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


                                    {{-- ORGANIZATION --}}

                                    <a
                                        href="{{ route('settings.organization') }}"
                                        class="mt-1 flex items-center gap-3
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


                                    {{-- ACCOUNT --}}

                                    <a
                                        href="{{ route('settings.account') }}"
                                        class="mt-1 flex items-center gap-3
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


                                {{-- SIGN OUT --}}

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
                                                class="flex h-10 w-10
                                                       shrink-0 items-center
                                                       justify-center
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
            {{-- PROFILE SETTINGS CONTENT --}}
            {{-- ========================================================= --}}

            <main
                class="min-h-screen px-5 py-7
                       sm:px-7 lg:px-8"
            >

                {{-- PAGE HEADER --}}

                <div class="mb-6">

                    <div
                        class="flex flex-col gap-3
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <div>

                            <p
                                class="text-xs font-semibold
                                       uppercase tracking-[0.18em]
                                       text-[#b08d20]"
                            >
                                Account Settings
                            </p>

                            <h2
                                class="mt-1 font-serif text-3xl
                                       font-semibold text-[#0b2e6f]"
                            >
                                Profile & Personal Information
                            </h2>

                            <p
                                class="mt-2 text-sm text-slate-500"
                            >
                                Manage the personal information connected
                                to your CWL account.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- SETTINGS LAYOUT --}}

                <div
                    class="grid gap-5
                           lg:grid-cols-[250px_minmax(0,1fr)]"
                >


                    {{-- ================================================= --}}
                    {{-- SETTINGS NAVIGATION --}}
                    {{-- ================================================= --}}

                    <aside
                        class="h-fit rounded-2xl
                               border border-slate-200
                               bg-white p-2 shadow-sm"
                    >

                        <p
                            class="px-4 pb-2 pt-3
                                   text-[10px] font-bold
                                   uppercase tracking-[0.18em]
                                   text-slate-400"
                        >
                            Settings
                        </p>


                        {{-- PROFILE --}}

                        <a
                            href="{{ route('settings.profile') }}"
                            class="flex items-center gap-3
                                   rounded-xl bg-[#eef3ff]
                                   px-4 py-3
                                   text-sm font-semibold
                                   text-[#0b2e6f]"
                        >

                            <div
                                class="flex h-9 w-9
                                       items-center justify-center
                                       rounded-lg bg-[#dce7ff]"
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

                                <p>Profile</p>

                                <p class="text-[10px] font-normal text-slate-400">
                                    Personal information
                                </p>

                            </div>

                        </a>


                        {{-- SECURITY --}}

                        <a
                            href="{{ route('settings.security') }}"
                            class="mt-1 flex items-center gap-3
                                   rounded-xl px-4 py-3
                                   text-sm text-slate-600
                                   transition hover:bg-slate-50"
                        >

                            <div
                                class="flex h-9 w-9
                                       items-center justify-center
                                       rounded-lg bg-[#fff8e5]
                                       text-[#b08d20]"
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

                                <p>Security</p>

                                <p class="text-[10px] text-slate-400">
                                    Password and security
                                </p>

                            </div>

                        </a>


                        {{-- ORGANIZATION --}}

                        <a
                            href="{{ route('settings.organization') }}"
                            class="mt-1 flex items-center gap-3
                                   rounded-xl px-4 py-3
                                   text-sm text-slate-600
                                   transition hover:bg-slate-50"
                        >

                            <div
                                class="flex h-9 w-9
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

                                <p>Organization</p>

                                <p class="text-[10px] text-slate-400">
                                    CWL organization details
                                </p>

                            </div>

                        </a>


                        {{-- ACCOUNT --}}

                        <a
                            href="{{ route('settings.account') }}"
                            class="mt-1 flex items-center gap-3
                                   rounded-xl px-4 py-3
                                   text-sm text-slate-600
                                   transition hover:bg-slate-50"
                        >

                            <div
                                class="flex h-9 w-9
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

                                <p>Account</p>

                                <p class="text-[10px] text-slate-400">
                                    Account information
                                </p>

                            </div>

                        </a>

                    </aside>


                    {{-- ================================================= --}}
                    {{-- PROFILE FORM --}}
                    {{-- ================================================= --}}

                    <section>

                        {{-- SUCCESS --}}

                        @if(session('success'))

                            <div
                                class="mb-5 flex items-start gap-3
                                       rounded-xl border
                                       border-green-200
                                       bg-green-50 px-4 py-3
                                       text-sm text-green-700"
                            >

                                <svg
                                    class="mt-0.5 h-5 w-5 shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                                <span>
                                    {{ session('success') }}
                                </span>

                            </div>

                        @endif


                        {{-- ERRORS --}}

                        @if($errors->any())

                            <div
                                class="mb-5 rounded-xl
                                       border border-red-200
                                       bg-red-50 px-4 py-3
                                       text-sm text-red-700"
                            >

                                <p class="font-semibold">
                                    Please check the following:
                                </p>

                                <ul class="mt-2 list-inside list-disc">

                                    @foreach($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        {{-- PROFILE CARD --}}

                        <form
                            method="POST"
                            action="{{ route('settings.profile.update') }}"
                            class="overflow-hidden rounded-2xl
                                   border border-slate-200
                                   bg-white shadow-sm"
                        >

                            @csrf
                            @method('PATCH')


                            {{-- CARD HEADER --}}

                            <div
                                class="border-b border-slate-200
                                       bg-gradient-to-r
                                       from-[#f8faff]
                                       via-white
                                       to-[#fffaf0]
                                       px-6 py-6 sm:px-8"
                            >

                                <div
                                    class="flex items-center gap-4"
                                >

                                    <div
                                        class="flex h-12 w-12
                                               items-center justify-center
                                               rounded-xl
                                               bg-[#eef3ff]
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

                                        <h3
                                            class="text-base
                                                   font-semibold
                                                   text-[#0b2e6f]"
                                        >
                                            Personal Information
                                        </h3>

                                        <p
                                            class="mt-1 text-xs
                                                   text-slate-500"
                                        >
                                            Keep your account information
                                            accurate and up to date.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- FORM BODY --}}

                            <div class="space-y-6 p-6 sm:p-8">


                                {{-- FIRST + LAST NAME --}}

                                <div
                                    class="grid gap-5
                                           sm:grid-cols-2"
                                >

                                    <div>

                                        <label
                                            for="first_name"
                                            class="mb-2 block text-sm
                                                   font-semibold
                                                   text-slate-700"
                                        >
                                            First Name
                                        </label>

                                        <input
                                            id="first_name"
                                            type="text"
                                            name="first_name"
                                            value="{{ old(
                                                'first_name',
                                                auth()->user()->first_name
                                            ) }}"
                                            required
                                            class="w-full rounded-xl
                                                   border border-slate-300
                                                   bg-white px-4 py-3
                                                   text-sm text-slate-700
                                                   outline-none
                                                   transition
                                                   focus:border-[#123B8F]
                                                   focus:ring-4
                                                   focus:ring-[#123B8F]/10"
                                        >

                                    </div>


                                    <div>

                                        <label
                                            for="last_name"
                                            class="mb-2 block text-sm
                                                   font-semibold
                                                   text-slate-700"
                                        >
                                            Last Name
                                        </label>

                                        <input
                                            id="last_name"
                                            type="text"
                                            name="last_name"
                                            value="{{ old(
                                                'last_name',
                                                auth()->user()->last_name
                                            ) }}"
                                            required
                                            class="w-full rounded-xl
                                                   border border-slate-300
                                                   bg-white px-4 py-3
                                                   text-sm text-slate-700
                                                   outline-none
                                                   transition
                                                   focus:border-[#123B8F]
                                                   focus:ring-4
                                                   focus:ring-[#123B8F]/10"
                                        >

                                    </div>

                                </div>


                                {{-- EMAIL --}}

                                <div>

                                    <label
                                        for="email"
                                        class="mb-2 block text-sm
                                               font-semibold
                                               text-slate-700"
                                    >
                                        Email Address
                                    </label>

                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old(
                                            'email',
                                            auth()->user()->email
                                        ) }}"
                                        required
                                        class="w-full rounded-xl
                                               border border-slate-300
                                               bg-white px-4 py-3
                                               text-sm text-slate-700
                                               outline-none transition
                                               focus:border-[#123B8F]
                                               focus:ring-4
                                               focus:ring-[#123B8F]/10"
                                    >

                                    <p
                                        class="mt-2 text-xs
                                               text-slate-400"
                                    >
                                        This email address is associated
                                        with your CWL account.
                                    </p>

                                </div>


                                {{-- DIVIDER --}}

                                <div class="border-t border-slate-200"></div>


                                {{-- ACCOUNT PREVIEW --}}

                                <div
                                    class="rounded-xl
                                           border border-blue-100
                                           bg-blue-50/50 p-5"
                                >

                                    <div
                                        class="flex items-center gap-4"
                                    >

                                        <div
                                            class="flex h-11 w-11
                                                   shrink-0 items-center
                                                   justify-center
                                                   rounded-full
                                                   border-2
                                                   border-[#D4AF37]
                                                   bg-[#123B8F]
                                                   text-white"
                                        >

                                            <span
                                                class="text-sm
                                                       font-bold"
                                            >
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


                                        <div>

                                            <p
                                                class="text-sm
                                                       font-semibold
                                                       text-[#0b2e6f]"
                                            >
                                                {{ Auth::user()->first_name }}
                                                {{ Auth::user()->last_name }}
                                            </p>

                                            <p
                                                class="mt-0.5 text-xs
                                                       text-slate-500"
                                            >
                                                {{ Auth::user()->email }}
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- SAVE BUTTON --}}

                                <div
                                    class="flex flex-col gap-3
                                           border-t border-slate-200
                                           pt-6 sm:flex-row
                                           sm:items-center
                                           sm:justify-end"
                                >

                                    <a
                                        href="{{ route('settings') }}"
                                        class="rounded-xl border
                                               border-slate-300
                                               px-5 py-3 text-center
                                               text-sm font-semibold
                                               text-slate-600
                                               transition
                                               hover:bg-slate-50"
                                    >
                                        Cancel
                                    </a>


                                    <button
                                        type="submit"
                                        class="rounded-xl
                                               bg-[#123B8F]
                                               px-6 py-3
                                               text-sm font-semibold
                                               text-white shadow-sm
                                               transition
                                               hover:bg-[#0b2e6f]"
                                    >
                                        Save Changes
                                    </button>

                                </div>

                            </div>

                        </form>

                    </section>

                </div>


                {{-- FOOTER --}}

                <footer class="mt-8 pb-4 text-center">

                    <p class="text-[11px] text-slate-400">
                        CWL Diocese of Imus · Organizational Records
                        and Transparency Management System
                    </p>

                </footer>

            </main>

        </div>

    </div>

</x-app-layout>