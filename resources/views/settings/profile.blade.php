<x-app-layout>

<div class="min-h-screen bg-[#f7f8fc] text-slate-800">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header class="border-b border-slate-200 bg-white">

        <div class="mx-auto max-w-7xl px-5 py-5 sm:px-7 lg:px-8">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#b08d20]">
                        Settings
                    </p>

                    <h1 class="mt-1 font-serif text-3xl font-semibold text-[#0b2e6f]">
                        Profile
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Manage your personal information associated with your CWL system account.
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


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <main class="mx-auto max-w-7xl px-5 py-7 sm:px-7 lg:px-8">


        {{-- ========================================================= --}}
        {{-- SETTINGS NAVIGATION --}}
        {{-- ========================================================= --}}

        <section class="mb-7">

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">


                {{-- PROFILE ACTIVE --}}

                <a
                    href="{{ route('settings.profile') }}"
                    class="group flex items-center gap-4 rounded-2xl
                           border-2 border-[#d4af37] bg-[#fffdf5]
                           p-4 shadow-sm"
                >

                    <div class="flex h-14 w-14 shrink-0 items-center
                                justify-center rounded-xl bg-[#fff1bd]
                                text-[#9a7712]">

                        <svg
                            class="h-7 w-7"
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

                    <div class="min-w-0">

                        <p class="text-sm font-semibold text-[#0b2e6f]">
                            Profile
                        </p>

                        <p class="mt-0.5 text-xs text-slate-500">
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

                    <div class="flex h-14 w-14 shrink-0 items-center
                                justify-center rounded-xl bg-blue-50
                                text-[#123B8F]">

                        <svg
                            class="h-7 w-7"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
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

                    <div class="flex h-14 w-14 shrink-0 items-center
                                justify-center rounded-xl bg-blue-50
                                text-[#123B8F]">

                        <svg
                            class="h-7 w-7"
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

                        <p class="text-sm font-semibold text-slate-700">
                            Organization
                        </p>

                        <p class="mt-0.5 text-xs text-slate-400">
                            CWL organization details
                        </p>

                    </div>

                </a>


                {{-- ACCOUNT --}}

                <a
                    href="{{ route('settings.account') }}"
                    class="group flex items-center gap-4 rounded-2xl
                           border border-slate-200 bg-white p-4
                           shadow-sm transition hover:-translate-y-0.5
                           hover:border-blue-200 hover:shadow-md"
                >

                    <div class="flex h-14 w-14 shrink-0 items-center
                                justify-center rounded-xl bg-blue-50
                                text-[#123B8F]">

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

                        <p class="text-sm font-semibold text-slate-700">
                            Account
                        </p>

                        <p class="mt-0.5 text-xs text-slate-400">
                            Account information
                        </p>

                    </div>

                </a>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- SUCCESS --}}
        {{-- ========================================================= --}}

        @if (session('success'))

            <div class="mb-6 rounded-xl border border-green-200
                        bg-green-50 px-5 py-4 text-sm font-medium
                        text-green-700">

                {{ session('success') }}

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- PROFILE CARD --}}
        {{-- ========================================================= --}}

        <section>

            <div class="overflow-hidden rounded-2xl border
                        border-slate-200 bg-white shadow-sm">


                <div class="border-b border-slate-200
                            bg-gradient-to-r from-[#f8faff]
                            via-white to-[#fffaf0]
                            px-6 py-6 sm:px-8">

                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 shrink-0
                                    items-center justify-center
                                    rounded-xl bg-blue-50
                                    text-[#123B8F]">

                            <svg
                                class="h-7 w-7"
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

                            <h2 class="text-base font-semibold text-[#0b2e6f]">
                                Personal Information
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Update the name and email associated with your account.
                            </p>

                        </div>

                    </div>

                </div>


                <form
                    method="POST"
                    action="{{ route('settings.profile.update') }}"
                    class="p-6 sm:p-8"
                >

                    @csrf
                    @method('PATCH')


                    {{-- FIRST NAME --}}

                    <div class="mb-5">

                        <label
                            for="first_name"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            First Name
                        </label>

                        <input
                            id="first_name"
                            name="first_name"
                            type="text"
                            value="{{ old('first_name', $user->first_name ?? '') }}"
                            required
                            autocomplete="given-name"
                            class="w-full rounded-xl border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-800
                                   outline-none transition
                                   focus:border-[#123B8F]
                                   focus:ring-2 focus:ring-[#123B8F]/10"
                        >

                        @error('first_name')
                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- LAST NAME --}}

                    <div class="mb-5">

                        <label
                            for="last_name"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Last Name
                        </label>

                        <input
                            id="last_name"
                            name="last_name"
                            type="text"
                            value="{{ old('last_name', $user->last_name ?? '') }}"
                            required
                            autocomplete="family-name"
                            class="w-full rounded-xl border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-800
                                   outline-none transition
                                   focus:border-[#123B8F]
                                   focus:ring-2 focus:ring-[#123B8F]/10"
                        >

                        @error('last_name')
                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- EMAIL --}}

                    <div class="mb-7">

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Email Address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $user->email ?? '') }}"
                            required
                            autocomplete="email"
                            class="w-full rounded-xl border border-slate-300
                                   bg-white px-4 py-3 text-sm text-slate-800
                                   outline-none transition
                                   focus:border-[#123B8F]
                                   focus:ring-2 focus:ring-[#123B8F]/10"
                        >

                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mt-2 text-xs text-slate-400">
                            Email changes may require verification again.
                        </p>

                    </div>


                    <div class="flex justify-end border-t border-slate-200 pt-6">

                        <button
                            type="submit"
                            class="rounded-xl bg-[#123B8F] px-6 py-3
                                   text-sm font-semibold text-white
                                   transition hover:bg-[#0b2e6f]
                                   focus:outline-none
                                   focus:ring-2 focus:ring-[#123B8F]/20"
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

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