<x-app-layout>

<div class="min-h-screen bg-[#f7f8fc] text-slate-800">

    <header class="border-b border-slate-200 bg-white">

        <div class="mx-auto max-w-7xl px-5 py-5 sm:px-7 lg:px-8">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#b08d20]">
                        Settings
                    </p>

                    <h1 class="mt-1 font-serif text-3xl font-semibold text-[#0b2e6f]">
                        Account
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        View your account information and current account status.
                    </p>

                </div>


                <a
                    href="{{ auth()->user()->role === 'admin'
                        ? url('/admin')
                        : url('/member') }}"
                    class="inline-flex shrink-0 items-center gap-2 rounded-xl
                           border border-blue-100 bg-white px-4 py-2.5
                           text-sm font-semibold text-[#123B8F]
                           shadow-sm transition hover:bg-blue-50"
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
                            d="M10 6L4 12l6 6M4 12h16"
                        />
                    </svg>

                    <span class="hidden sm:inline">
                        Back to Dashboard
                    </span>

                </a>

            </div>

        </div>

    </header>


    <main class="mx-auto max-w-7xl px-5 py-7 sm:px-7 lg:px-8">


        {{-- ========================================================= --}}
        {{-- SETTINGS NAVIGATION --}}
        {{-- ========================================================= --}}

        <section class="mb-7">

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">


                {{-- PROFILE --}}

                <a
                    href="{{ route('settings.profile') }}"
                    class="group flex items-center gap-4 rounded-2xl
                           border border-slate-200 bg-white p-4
                           shadow-sm transition hover:-translate-y-0.5
                           hover:border-blue-200 hover:shadow-md"
                >

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                rounded-xl bg-blue-50 text-[#123B8F]">

                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                        <p class="text-sm font-semibold text-slate-700">
                            Profile
                        </p>

                        <p class="mt-0.5 text-xs text-slate-400">
                            Personal information
                        </p>

                    </div>

                </a>


                {{-- SECURITY --}}

                <a
                    href="{{ route('settings.security') }}"
                    class="group flex items-center gap-4 rounded-2xl
                           border border-slate-200 bg-white p-4
                           shadow-sm transition hover:-translate-y-0.5
                           hover:border-blue-200 hover:shadow-md"
                >

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                rounded-xl bg-blue-50 text-[#123B8F]">

                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M16.5 10.5V7a4.5 4.5 0 00-9 0v3.5"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 10.5h12v9H6v-9z"
                            />
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-slate-700">
                            Security
                        </p>

                        <p class="mt-0.5 text-xs text-slate-400">
                            Password and security
                        </p>

                    </div>

                </a>


                {{-- ORGANIZATION --}}

                <a
                    href="{{ route('settings.organization') }}"
                    class="group flex items-center gap-4 rounded-2xl
                           border border-slate-200 bg-white p-4
                           shadow-sm transition hover:-translate-y-0.5
                           hover:border-blue-200 hover:shadow-md"
                >

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                rounded-xl bg-blue-50 text-[#123B8F]">

                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                            />
                        </svg>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-slate-700">
                            Organization
                        </p>

                        <p class="mt-0.5 text-xs text-slate-400">
                            CWL organization details
                        </p>

                    </div>

                </a>


                {{-- ACCOUNT ACTIVE --}}

                <a
                    href="{{ route('settings.account') }}"
                    class="group flex items-center gap-4 rounded-2xl
                           border-2 border-[#d4af37]
                           bg-[#fffdf5] p-4 shadow-sm"
                >

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                rounded-xl bg-[#fff1bd] text-[#9a7712]">

                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

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

                        <p class="text-sm font-semibold text-[#0b2e6f]">
                            Account
                        </p>

                        <p class="mt-0.5 text-xs text-slate-500">
                            Account information
                        </p>

                    </div>

                </a>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- ACCOUNT INFORMATION --}}
        {{-- ========================================================= --}}

        <section>

            <div class="overflow-hidden rounded-2xl
                        border border-slate-200
                        bg-white shadow-sm">


                <div class="border-b border-slate-200
                            bg-gradient-to-r
                            from-[#f8faff]
                            via-white
                            to-[#fffaf0]
                            px-6 py-6 sm:px-8">

                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 shrink-0 items-center
                                    justify-center rounded-xl
                                    bg-[#fff8e5] text-[#b08d20]">

                            <svg
                                class="h-7 w-7"
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

                            <h2 class="text-base font-semibold text-[#0b2e6f]">
                                Account Information
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Information about your CWL system account.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="divide-y divide-slate-200">


                    {{-- FULL NAME --}}

                    <div class="flex flex-col gap-2 p-5
                                sm:flex-row sm:items-center
                                sm:justify-between">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center
                                        justify-center rounded-lg bg-blue-50
                                        text-[#123B8F]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

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

                            <span class="text-sm text-slate-500">
                                Full Name
                            </span>

                        </div>

                        <span class="font-semibold text-[#123B8F] sm:text-right">

                            {{ trim(
                                ($user->first_name ?? '') . ' ' .
                                ($user->last_name ?? '')
                            ) ?: ($user->name ?? 'User') }}

                        </span>

                    </div>


                    {{-- EMAIL --}}

                    <div class="flex flex-col gap-2 p-5
                                sm:flex-row sm:items-center
                                sm:justify-between">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center
                                        justify-center rounded-lg bg-blue-50
                                        text-[#123B8F]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 6.75A1.75 1.75 0 014.75 5h14.5A1.75 1.75 0 0121 6.75v10.5A1.75 1.75 0 0119.25 19H4.75A1.75 1.75 0 013 17.25V6.75z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3.5 6l8.5 7 8.5-7"
                                    />

                                </svg>

                            </div>

                            <span class="text-sm text-slate-500">
                                Email Address
                            </span>

                        </div>

                        <span class="break-all font-semibold text-[#123B8F] sm:text-right">
                            {{ $user->email }}
                        </span>

                    </div>


                    {{-- ROLE --}}

                    <div class="flex flex-col gap-2 p-5
                                sm:flex-row sm:items-center
                                sm:justify-between">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center
                                        justify-center rounded-lg bg-[#fff8e5]
                                        text-[#b08d20]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M9 12l2 2 4-4"
                                    />

                                </svg>

                            </div>

                            <span class="text-sm text-slate-500">
                                Account Role
                            </span>

                        </div>

                        <span class="inline-flex w-fit rounded-full
                                     bg-[#fff8e5] px-3 py-1
                                     text-xs font-semibold
                                     text-[#b08d20]">

                            {{ ucfirst($user->role ?? 'Member') }}

                        </span>

                    </div>


                    {{-- STATUS --}}

                    <div class="flex flex-col gap-2 p-5
                                sm:flex-row sm:items-center
                                sm:justify-between">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center
                                        justify-center rounded-lg bg-green-50
                                        text-green-600">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M12 3a9 9 0 100 18 9 9 0 000-18z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M8 12l2.5 2.5L16 9"
                                    />

                                </svg>

                            </div>

                            <span class="text-sm text-slate-500">
                                Account Status
                            </span>

                        </div>

                        <span class="inline-flex w-fit rounded-full
                                     bg-green-50 px-3 py-1
                                     text-xs font-semibold text-green-700">

                            {{ ucfirst($user->status ?? 'Active') }}

                        </span>

                    </div>


                    {{-- ACCOUNT CREATED --}}

                    <div class="flex flex-col gap-2 p-5
                                sm:flex-row sm:items-center
                                sm:justify-between">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center
                                        justify-center rounded-lg bg-blue-50
                                        text-[#123B8F]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <rect
                                        x="4"
                                        y="5"
                                        width="16"
                                        height="15"
                                        rx="2"
                                        stroke-width="1.8"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-width="1.8"
                                        d="M8 3v4M16 3v4M4 10h16"
                                    />

                                </svg>

                            </div>

                            <span class="text-sm text-slate-500">
                                Account Created
                            </span>

                        </div>

                        <span class="font-semibold text-[#123B8F] sm:text-right">

                            {{ $user->created_at
                                ? $user->created_at->format('F d, Y')
                                : 'Not available' }}

                        </span>

                    </div>


                </div>

            </div>

        </section>


        <footer class="mt-8 pb-4 text-center">

            <p class="text-[11px] text-slate-400">
                CWL Diocese of Imus · Organizational Records
                and Transparency Management System
            </p>

        </footer>

    </main>

</div>

</x-app-layout>