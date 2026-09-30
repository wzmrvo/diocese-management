<x-app-layout>

    <div
        x-data="{ sidebarOpen: false }"
        class="min-h-screen bg-[#f7f6f1]"
    >

        {{-- ========================================================= --}}
        {{-- MOBILE OVERLAY --}}
        {{-- ========================================================= --}}

        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black/30 lg:hidden"
            style="display: none;"
        ></div>


        {{-- ========================================================= --}}
        {{-- MEMBER SIDEBAR --}}
        {{-- ========================================================= --}}

        <aside
            class="fixed inset-y-0 left-0 z-50 flex w-[285px] -translate-x-full flex-col overflow-hidden bg-[#103c30] text-white shadow-xl transition-transform duration-300 lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >

            {{-- SIDEBAR HEADER --}}
            <div class="relative px-6 pb-6 pt-7">

                <div class="flex items-center gap-4">

                    {{-- Logo --}}
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
                            Faith&nbsp; • &nbsp;Service&nbsp; • &nbsp;Community
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- NAVIGATION --}}
            {{-- ===================================================== --}}

            <nav class="flex-1 overflow-y-auto px-4 py-3">

                <p class="mb-3 px-3 text-[10px] font-semibold uppercase tracking-[0.18em] text-white/40">
                    Main Menu
                </p>


                <div class="space-y-1">


                    {{-- DASHBOARD --}}

                    <a
                        href="{{ url('/member') }}"
                        class="flex items-center gap-3 rounded-lg bg-[#f1c75b] px-4 py-3 text-sm font-semibold text-[#173e32] shadow-sm"
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

                        <span>
                            Dashboard
                        </span>

                    </a>


                    {{-- MEETING RECORDS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            Meeting Records
                        </span>

                    </a>


                    {{-- MINUTES / MOTM --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            Minutes / MOTM
                        </span>

                    </a>


                    {{-- FINANCIAL REPORTS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            Financial Reports
                        </span>

                    </a>


                    {{-- MY UNIT --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            My Unit
                        </span>

                    </a>


                    {{-- MY PROFILE --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            My Profile
                        </span>

                    </a>


                    {{-- NOTIFICATIONS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            Notifications
                        </span>

                    </a>


                    {{-- SETTINGS --}}

                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm text-white/85 transition hover:bg-white/10"
                    >

                        <svg
                            class="h-5 w-5 text-white/75"
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

                        <span>
                            Settings
                        </span>

                    </a>

                </div>

            </nav>


            {{-- ===================================================== --}}
            {{-- SIDEBAR FOOTER --}}
            {{-- ===================================================== --}}

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


        {{-- ========================================================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================================================= --}}

        <div class="lg:pl-[285px]">


            {{-- ===================================================== --}}
            {{-- TOP HEADER --}}
            {{-- ===================================================== --}}

            <header class="sticky top-0 z-30 border-b border-stone-200/80 bg-[#f7f6f1]/95 backdrop-blur">

                <div class="flex h-[76px] items-center justify-between px-5 sm:px-7 lg:px-8">


                    {{-- MOBILE MENU BUTTON --}}

                    <button
                        type="button"
                        @click="sidebarOpen = true"
                        class="rounded-lg p-2 text-[#174638] hover:bg-white lg:hidden"
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


                    {{-- HEADER RIGHT --}}

                    <div class="ml-auto flex items-center gap-4">


                        {{-- NOTIFICATION BUTTON --}}

                        <button
                            type="button"
                            class="relative rounded-full p-2.5 text-[#174638] transition hover:bg-white"
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


                        <div class="h-8 w-px bg-stone-300"></div>


                        {{-- CURRENT USER --}}

                        <div class="flex items-center gap-3">

                            <div class="hidden text-right sm:block">

                                <p class="text-sm font-semibold text-[#173d32]">
                                    {{ Auth::user()->name }}
                                </p>

                                <p class="text-xs text-stone-500">
                                    CWL Member
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


            {{-- ===================================================== --}}
            {{-- PAGE CONTENT --}}
            {{-- ===================================================== --}}

            <main class="px-5 py-7 sm:px-7 lg:px-8">


                {{-- ================================================= --}}
                {{-- WELCOME HERO --}}
                {{-- ================================================= --}}

                <section class="relative mb-5 min-h-[175px] overflow-hidden rounded-xl border border-stone-200 bg-[#f3f1e8] shadow-sm">

                    <div class="absolute inset-0 bg-gradient-to-r from-[#f5f2e8] via-[#f4f2ea] to-[#e9e8de]"></div>


                    {{-- DECORATIVE CHURCH --}}

                    <div class="absolute bottom-0 right-0 hidden opacity-[0.11] sm:block">

                        <svg
                            width="470"
                            height="180"
                            viewBox="0 0 470 180"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >

                            <path
                                d="M285 180V86L315 63V180M315 63L330 48L345 63V180M330 48V20M325 25L330 20L335 25M250 180V108L270 95L290 108V180M215 180V105L250 78L285 105V180"
                                stroke="#174638"
                                stroke-width="3"
                            />

                            <path
                                d="M195 180V130L215 115L235 130V180M345 180V105L365 115V180M365 115L405 140V180M405 140L430 153V180"
                                stroke="#174638"
                                stroke-width="3"
                            />

                            <path
                                d="M170 180V145L195 130M430 180V153"
                                stroke="#174638"
                                stroke-width="3"
                            />

                            <path
                                d="M245 180V145C245 134 253 125 263 125C273 125 281 134 281 145V180"
                                stroke="#174638"
                                stroke-width="3"
                            />

                            <path
                                d="M315 180V128C315 118 322 110 330 110C338 110 345 118 345 128V180"
                                stroke="#174638"
                                stroke-width="3"
                            />

                        </svg>

                    </div>


                    <div class="relative z-10 flex h-full items-center px-7 py-7 sm:px-8">

                        <div class="max-w-xl">

                            <p class="text-sm font-medium text-[#174638]/70">
                                Welcome back,
                            </p>

                            <h2 class="mt-1 font-serif text-3xl font-semibold leading-tight text-[#123e31] sm:text-[34px]">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="mt-2 max-w-lg text-sm leading-6 text-[#31554b]">
                                Welcome to the
                                <span class="font-medium">
                                    CWL Diocese of Imus
                                </span>
                                member portal.
                            </p>

                            <div class="mt-4 h-1 w-12 rounded-full bg-[#d8a92e]"></div>

                        </div>

                    </div>

                </section>


                {{-- ================================================= --}}
                {{-- MEMBER DASHBOARD --}}
                {{-- ================================================= --}}

                <div class="grid gap-5 xl:grid-cols-[minmax(0,1fr)_360px]">


                    {{-- ================================================= --}}
                    {{-- LEFT COLUMN --}}
                    {{-- ================================================= --}}

                    <div class="min-w-0">


                        {{-- ================================================= --}}
                        {{-- QUICK INFORMATION --}}
                        {{-- ================================================= --}}

                        <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">


                            {{-- NEXT MEETING --}}

                            <div class="rounded-xl border border-[#cfe1ed] bg-[#f3f9fc] p-5 shadow-sm">

                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#dcecf8] text-[#2275ad]">

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
                                            d="M7 3v4M17 3v4M4 9h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 text-xs font-medium text-[#174638]">
                                    Next Meeting
                                </p>

                                <p class="mt-1 text-lg font-semibold text-[#123e31]">
                                    No upcoming meeting
                                </p>

                                <p class="mt-2 text-xs text-stone-500">
                                    Meeting schedules will appear here.
                                </p>

                            </div>


                            {{-- LATEST MINUTES --}}

                            <div class="rounded-xl border border-[#ddd2ed] bg-[#f8f5fc] p-5 shadow-sm">

                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#ebe1f7] text-[#7650a5]">

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

                                <p class="mt-4 text-xs font-medium text-[#174638]">
                                    Latest Minutes
                                </p>

                                <p class="mt-1 text-lg font-semibold text-[#123e31]">
                                    No records yet
                                </p>

                                <p class="mt-2 text-xs text-stone-500">
                                    Meeting minutes will appear here.
                                </p>

                            </div>


                            {{-- FINANCIAL REPORT --}}

                            <div class="rounded-xl border border-[#e7d49a] bg-[#fffaf0] p-5 shadow-sm">

                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#f8e9bd] text-[#a87812]">

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
                                            d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zM9 8h6M9 12h6M9 16h3"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 text-xs font-medium text-[#174638]">
                                    Financial Reports
                                </p>

                                <p class="mt-1 text-lg font-semibold text-[#123e31]">
                                    No reports yet
                                </p>

                                <p class="mt-2 text-xs text-stone-500">
                                    Published reports will appear here.
                                </p>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- RECENT MEETINGS --}}
                        {{-- ================================================= --}}

                        <section class="mt-5 overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm">

                            <div class="flex items-center justify-between border-b border-stone-200 px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#edf1eb] text-[#174638]">

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
                                                d="M7 3v4M17 3v4M4 9h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"
                                            />
                                        </svg>

                                    </div>

                                    <h3 class="text-sm font-semibold text-[#173e32]">
                                        Recent Meetings
                                    </h3>

                                </div>


                                <a
                                    href="#"
                                    class="text-xs font-medium text-[#174638] hover:underline"
                                >
                                    View all →
                                </a>

                            </div>


                            <div class="flex min-h-[190px] flex-col items-center justify-center px-5 text-center">

                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#f0f2ed] text-[#829188]">

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
                                            d="M7 3v4M17 3v4M4 9h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 text-sm font-medium text-[#173e32]">
                                    No recent meetings
                                </p>

                                <p class="mt-1 text-xs text-stone-500">
                                    Meeting records will appear here once available.
                                </p>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- DOCUMENTS --}}
                        {{-- ================================================= --}}

                        <div class="mt-5 grid gap-5 md:grid-cols-2">


                            {{-- MINUTES --}}

                            <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                                <div class="flex items-center justify-between border-b border-stone-200 px-5 py-4">

                                    <h3 class="text-sm font-semibold text-[#173e32]">
                                        Latest Minutes / MOTM
                                    </h3>

                                    <a
                                        href="#"
                                        class="text-xs font-medium text-[#174638]"
                                    >
                                        View all →
                                    </a>

                                </div>


                                <div class="flex min-h-[180px] flex-col items-center justify-center px-5 text-center">

                                    <div class="text-3xl">
                                        📄
                                    </div>

                                    <p class="mt-4 text-sm font-medium text-[#173e32]">
                                        No minutes available
                                    </p>

                                    <p class="mt-1 text-xs text-stone-500">
                                        Published meeting minutes will appear here.
                                    </p>

                                </div>

                            </section>


                            {{-- FINANCIAL --}}

                            <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                                <div class="flex items-center justify-between border-b border-stone-200 px-5 py-4">

                                    <h3 class="text-sm font-semibold text-[#173e32]">
                                        Latest Financial Report
                                    </h3>

                                    <a
                                        href="#"
                                        class="text-xs font-medium text-[#174638]"
                                    >
                                        View all →
                                    </a>

                                </div>


                                <div class="flex min-h-[180px] flex-col items-center justify-center px-5 text-center">

                                    <div class="text-3xl">
                                        💰
                                    </div>

                                    <p class="mt-4 text-sm font-medium text-[#173e32]">
                                        No financial reports
                                    </p>

                                    <p class="mt-1 text-xs text-stone-500">
                                        Published financial reports will appear here.
                                    </p>

                                </div>

                            </section>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- RIGHT COLUMN --}}
                    {{-- ================================================= --}}

                    <div class="space-y-5">


                        {{-- ================================================= --}}
                        {{-- NOTIFICATIONS --}}
                        {{-- ================================================= --}}

                        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                            <div class="flex items-center justify-between border-b border-stone-200 px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#eef0e8] text-[#59694f]">

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
                                                d="M15 17H9m9-5a6 6 0 10-12 0c0 7-3 7-3 8h18c0-1-3-1-3-8z"
                                            />
                                        </svg>

                                    </div>

                                    <h3 class="text-sm font-semibold text-[#173e32]">
                                        Notifications
                                    </h3>

                                </div>


                                <a
                                    href="#"
                                    class="text-xs font-medium text-[#174638]"
                                >
                                    View all →
                                </a>

                            </div>


                            <div class="flex min-h-[175px] flex-col items-center justify-center px-5 text-center">

                                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#f1f0e8]">

                                    <svg
                                        class="h-7 w-7 text-[#717b69]"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M15 17H9m9-5a6 6 0 10-12 0c0 7-3 7-3 8h18c0-1-3-1-3-8z"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-4 text-sm font-semibold text-[#173e32]">
                                    No new notifications
                                </p>

                                <p class="mt-1 text-xs text-stone-500">
                                    You're all caught up!
                                </p>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- MY UNIT --}}
                        {{-- ================================================= --}}

                        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                            <div class="border-b border-stone-200 px-5 py-4">

                                <h3 class="text-sm font-semibold text-[#173e32]">
                                    My Unit
                                </h3>

                            </div>


                            <div class="p-5">

                                <div class="rounded-lg border border-[#cfe1d3] bg-[#f5faf5] p-4">

                                    <p class="text-xs text-stone-500">
                                        Unit
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-[#173e32]">
                                        {{ Auth::user()->unit ?? 'Not assigned' }}
                                    </p>

                                </div>


                                <div class="mt-3 rounded-lg border border-[#cfe1ed] bg-[#f4f9fc] p-4">

                                    <p class="text-xs text-stone-500">
                                        Position
                                    </p>

                                    <p class="mt-1 text-sm font-semibold capitalize text-[#173e32]">
                                        {{ Auth::user()->position
                                            ? ucwords(str_replace('_', ' ', Auth::user()->position))
                                            : 'Not assigned'
                                        }}
                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- QUICK ACTIONS --}}
                        {{-- ================================================= --}}

                        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                            <div class="border-b border-stone-200 px-5 py-4">

                                <h3 class="text-sm font-semibold text-[#173e32]">
                                    Quick Actions
                                </h3>

                            </div>


                            <div class="space-y-2 p-4">

                                <a
                                    href="#"
                                    class="flex items-center justify-between rounded-lg border border-stone-200 px-4 py-3 transition hover:bg-stone-50"
                                >

                                    <span class="text-sm text-[#173e32]">
                                        View Meeting Records
                                    </span>

                                    <span class="text-lg text-[#507565]">
                                        ›
                                    </span>

                                </a>


                                <a
                                    href="#"
                                    class="flex items-center justify-between rounded-lg border border-stone-200 px-4 py-3 transition hover:bg-stone-50"
                                >

                                    <span class="text-sm text-[#173e32]">
                                        View Minutes / MOTM
                                    </span>

                                    <span class="text-lg text-[#507565]">
                                        ›
                                    </span>

                                </a>


                                <a
                                    href="#"
                                    class="flex items-center justify-between rounded-lg border border-stone-200 px-4 py-3 transition hover:bg-stone-50"
                                >

                                    <span class="text-sm text-[#173e32]">
                                        View Financial Reports
                                    </span>

                                    <span class="text-lg text-[#507565]">
                                        ›
                                    </span>

                                </a>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- ACCOUNT INFORMATION --}}
                        {{-- ================================================= --}}

                        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                            <div class="border-b border-stone-200 px-5 py-4">

                                <h3 class="text-sm font-semibold text-[#173e32]">
                                    Account Information
                                </h3>

                            </div>


                            <div class="divide-y divide-stone-100">

                                <div class="flex items-center justify-between px-5 py-4">

                                    <span class="text-xs text-stone-500">
                                        Name
                                    </span>

                                    <span class="text-right text-xs font-medium text-[#173e32]">
                                        {{ Auth::user()->name }}
                                    </span>

                                </div>


                                <div class="flex items-center justify-between px-5 py-4">

                                    <span class="text-xs text-stone-500">
                                        Role
                                    </span>

                                    <span class="text-right text-xs font-medium capitalize text-[#173e32]">
                                        {{ Auth::user()->role }}
                                    </span>

                                </div>


                                <div class="flex items-center justify-between px-5 py-4">

                                    <span class="text-xs text-stone-500">
                                        Status
                                    </span>

                                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-[10px] font-semibold text-green-700">
                                        Active Member
                                    </span>

                                </div>

                            </div>

                        </section>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- FOOTER --}}
                {{-- ================================================= --}}

                <footer class="mt-8 pb-2 text-center">

                    <p class="text-[11px] text-stone-400">
                        CWL Diocese of Imus · Organizational Records and Transparency Management System
                    </p>

                </footer>

            </main>

        </div>

    </div>

</x-app-layout>