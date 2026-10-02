{{-- ========================================================= --}}
{{-- ADMIN SIDEBAR --}}
{{-- ========================================================= --}}

<aside
    class="fixed inset-y-0 left-0 z-50 flex w-[285px]
           -translate-x-full flex-col overflow-hidden
           bg-[#0b2e6f] text-white shadow-2xl
           transition-transform duration-300
           lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>

    {{-- ===================================================== --}}
    {{-- SIDEBAR HEADER --}}
    {{-- ===================================================== --}}

    <div class="shrink-0 px-6 pb-6 pt-7">

        <div class="flex items-center gap-4">

            {{-- LOGO --}}

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


            {{-- TITLE --}}

            <div class="min-w-0">

                <h1
                    class="text-[17px] font-semibold
                           tracking-wide text-white"
                >
                    CWL DIOCESE OF IMUS
                </h1>

                <p class="mt-1 text-xs text-white/60">
                    Administrator Portal
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
            Administration
        </p>


        <div class="space-y-1">

            {{-- DASHBOARD --}}

            <a
                href="{{ route('admin.dashboard') }}"
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


            {{-- ACCOUNT REQUESTS --}}

            <a
                href="{{ route('admin.account-requests.index') }}"
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
                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
                    />

                    <circle
                        cx="9"
                        cy="7"
                        r="4"
                        stroke-width="1.8"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M19 8v6M16 11h6"
                    />
                </svg>

                <span>Account Requests</span>

            </a>


            {{-- MEMBERS --}}

            <a
                href="{{ route('admin.members.index') }}"
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
                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
                    />

                    <circle
                        cx="9"
                        cy="7"
                        r="4"
                        stroke-width="1.8"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                    />
                </svg>

                <span>Members</span>

            </a>


            {{-- ORGANIZATION --}}

            <a
                href="{{ route('admin.organization.index') }}"
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
                        d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                    />
                </svg>

                <span>Organization</span>

            </a>


            {{-- DIOCESAN OFFICERS --}}

            <a
                href="{{ route('admin.organization.officers.index') }}"
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
                        d="M12 14a5 5 0 100-10 5 5 0 000 10z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 21a8 8 0 0116 0"
                    />
                </svg>

                <span>Diocesan Officers</span>

            </a>


            {{-- VICARIATES --}}

            <a
                href="{{ route('admin.organization.vicariates.index') }}"
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
                        d="M4 5h16M4 12h16M4 19h16"
                    />

                    <circle
                        cx="8"
                        cy="5"
                        r="1.5"
                        fill="currentColor"
                        stroke="none"
                    />

                    <circle
                        cx="16"
                        cy="12"
                        r="1.5"
                        fill="currentColor"
                        stroke="none"
                    />

                    <circle
                        cx="10"
                        cy="19"
                        r="1.5"
                        fill="currentColor"
                        stroke="none"
                    />
                </svg>

                <span>Vicariates</span>

            </a>


            {{-- UNITS --}}

            <a
                href="{{ route('admin.organization.units.index') }}"
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

                <span>Units</span>

            </a>


            {{-- SETTINGS --}}

            <a
                href="{{ route('settings') }}"
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
                        d="M12 15.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M19.4 15a1.7 1.7 0 00.34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 00-1.88-.34 1.7 1.7 0 00-1.04 1.56V20h-2.4v-.2a1.7 1.7 0 00-1.04-1.56 1.7 1.7 0 00-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 008.4 15a1.7 1.7 0 00-1.56-1.04H6.5v-2.4h.34A1.7 1.7 0 008.4 10.5a1.7 1.7 0 00-.34-1.88L8 8.56l1.7-1.7.06.06a1.7 1.7 0 001.88.34A1.7 1.7 0 0012.68 5.7V5.5h2.4v.2a1.7 1.7 0 001.04 1.56 1.7 1.7 0 001.88-.34l.06-.06 1.7 1.7-.06.06a1.7 1.7 0 00-.34 1.88A1.7 1.7 0 0020.92 11h.34v2.4h-.34A1.7 1.7 0 0019.4 15z"
                    />
                </svg>

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
            Administrator Portal
        </div>

    </div>

</aside>