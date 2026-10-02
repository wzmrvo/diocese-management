<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In | CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-slate-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-md">

            {{-- ================================================= --}}
            {{-- LOGO / ORGANIZATION HEADER --}}
            {{-- ================================================= --}}

            <div class="mb-8 text-center">

                <div class="mx-auto mb-5 flex h-24 w-24 items-center justify-center">
                    <img
                        src="{{ asset('images/cwl/logo/cwl-logo.png') }}"
                        alt="CWL Diocese of Imus Logo"
                        class="h-24 w-24 object-contain"
                    >
                </div>

                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#b28a24]">
                    Catholic Women's League
                </p>

                <h1 class="mt-2 text-2xl font-semibold text-[#123b78] sm:text-3xl">
                    Diocese of Imus
                </h1>

                <div class="mx-auto mt-4 h-1 w-12 rounded-full bg-[#c9a227]"></div>

            </div>


            {{-- ================================================= --}}
            {{-- LOGIN CARD --}}
            {{-- ================================================= --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- Gold top accent --}}
                <div class="h-1.5 bg-[#c9a227]"></div>

                <div class="p-6 sm:p-8">

                    {{-- Card Header --}}
                    <div class="mb-7">

                        <h2 class="text-xl font-semibold text-[#123b78]">
                            Sign in to your account
                        </h2>

                        <p class="mt-1.5 text-sm leading-6 text-slate-500">
                            Access the CWL organizational system using your registered account.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- SESSION STATUS --}}
                    {{-- ================================================= --}}

                    @if (session('status'))

                        <div class="mb-5 rounded-xl border border-[#d8c27a] bg-[#fffaf0] px-4 py-3 text-sm text-[#765d17]">

                            {{ session('status') }}

                        </div>

                    @endif


                    {{-- ================================================= --}}
                    {{-- LOGIN ERRORS --}}
                    {{-- ================================================= --}}

                    @if ($errors->any())

                        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

                            <p class="font-medium">
                                Please check your information.
                            </p>

                            <ul class="mt-1 list-inside list-disc text-xs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                    @endif


                    {{-- ================================================= --}}
                    {{-- LOGIN FORM --}}
                    {{-- ================================================= --}}

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">

                        @csrf


                        {{-- Email --}}
                        <div>

                            <label
                                for="email"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Email Address
                            </label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="example@email.com"
                                class="w-full rounded-xl border border-slate-300 bg-white
                                       px-4 py-3 text-base text-slate-800
                                       outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-[#123b78]
                                       focus:ring-2 focus:ring-[#123b78]/10"
                            >

                            @error('email')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Password --}}
                        <div>

                            <label
                                for="password"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Password
                            </label>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="w-full rounded-xl border border-slate-300 bg-white
                                       px-4 py-3 text-base text-slate-800
                                       outline-none transition
                                       placeholder:text-slate-400
                                       focus:border-[#123b78]
                                       focus:ring-2 focus:ring-[#123b78]/10"
                            >

                            @error('password')

                                <p class="mt-1.5 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Remember Me --}}
                        <div class="flex items-center">

                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                class="h-4 w-4 rounded border-slate-300
                                       text-[#123b78]
                                       focus:ring-[#123b78]"
                            >

                            <label
                                for="remember"
                                class="ml-2 text-sm text-slate-600"
                            >
                                Remember me
                            </label>

                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="w-full rounded-xl bg-[#123b78] px-5 py-3.5
                                   text-base font-semibold text-white
                                   transition duration-200
                                   hover:bg-[#0d2f63]
                                   focus:outline-none
                                   focus:ring-2 focus:ring-[#123b78]/20"
                        >
                            Sign In
                        </button>

                    </form>


                    {{-- ================================================= --}}
                    {{-- ACCOUNT REQUEST --}}
                    {{-- ================================================= --}}

                    <div class="mt-7 border-t border-slate-200 pt-6 text-center">

                        <p class="text-sm text-slate-500">
                            Don't have an account?
                        </p>

                        <a
                            href="{{ route('register') }}"
                            class="mt-2 inline-flex items-center gap-1
                                   font-semibold text-[#123b78]
                                   transition hover:text-[#c9a227]"
                        >
                            Request Membership Account
                            <span aria-hidden="true">→</span>
                        </a>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- FOOTER --}}
            {{-- ================================================= --}}

            <div class="mt-7 text-center">

                <p class="text-xs font-medium text-[#123b78]">
                    CWL Diocese of Imus
                </p>

                <p class="mt-1 text-[11px] text-slate-400">
                    Organizational Records &amp; Transparency Management System
                </p>

            </div>

        </div>

    </div>

</body>
</html>