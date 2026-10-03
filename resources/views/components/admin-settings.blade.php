{{-- ========================================================= --}}
{{-- ADMIN SETTINGS COMPONENT --}}
{{-- ========================================================= --}}

<div class="w-full">

    {{-- ===================================================== --}}
    {{-- SETTINGS CONTENT --}}
    {{-- ===================================================== --}}

    <div
        class="grid gap-6
               lg:grid-cols-[240px_minmax(0,1fr)]"
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
                class="flex items-center
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50
                       {{ request()->routeIs('settings.profile')
                            ? 'bg-[#eef3ff] font-semibold text-[#0b2e6f]'
                            : '' }}"
            >
                Profile
            </a>


            {{-- SECURITY --}}

            <a
                href="{{ route('settings.security') }}"
                class="mt-1 flex items-center
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50
                       {{ request()->routeIs('settings.security')
                            ? 'bg-[#eef3ff] font-semibold text-[#0b2e6f]'
                            : '' }}"
            >
                Security
            </a>


            {{-- ORGANIZATION --}}

            <a
                href="{{ route('settings.organization') }}"
                class="mt-1 flex items-center
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50
                       {{ request()->routeIs('settings.organization')
                            ? 'bg-[#eef3ff] font-semibold text-[#0b2e6f]'
                            : '' }}"
            >
                Organization
            </a>


            {{-- ACCOUNT --}}

            <a
                href="{{ route('settings.account') }}"
                class="mt-1 flex items-center
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50
                       {{ request()->routeIs('settings.account')
                            ? 'bg-[#eef3ff] font-semibold text-[#0b2e6f]'
                            : '' }}"
            >
                Account
            </a>

        </aside>


        {{-- ================================================= --}}
        {{-- PAGE CONTENT --}}
        {{-- ================================================= --}}

        <section class="min-w-0">

            {{ $slot }}

        </section>

    </div>

</div>