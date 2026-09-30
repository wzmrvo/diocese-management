<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In | CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-stone-50 text-stone-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-md">

            {{-- Logo / Header --}}
            <div class="text-center mb-8">

                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center
                            rounded-full bg-emerald-900 text-white shadow-sm">
                    <span class="text-2xl font-serif">✝</span>
                </div>

                <h1 class="text-2xl sm:text-3xl font-semibold text-emerald-950">
                    Welcome Back
                </h1>

                <p class="mt-2 text-sm text-stone-500">
                    CWL Diocese of Imus
                </p>

            </div>

            {{-- Login Card --}}
            <div class="rounded-2xl border border-stone-200 bg-white shadow-sm">

                <div class="p-6 sm:p-8">

                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-emerald-950">
                            Sign in to your account
                        </h2>

                        <p class="mt-1 text-sm text-stone-500">
                            Enter your account information to continue.
                        </p>
                    </div>

                    {{-- Session Status --}}
                    @if (session('status'))
                        <div class="mb-5 rounded-xl border border-emerald-200
                                    bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Login Errors --}}
                    @if ($errors->any())
                        <div class="mb-5 rounded-xl border border-red-200
                                    bg-red-50 px-4 py-3 text-sm text-red-700">
                            <p class="font-medium">
                                Please check your information.
                            </p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">

                        @csrf

                        {{-- Email --}}
                        <div>
                            <label
                                for="email"
                                class="mb-2 block text-sm font-medium text-stone-700"
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
                                class="w-full rounded-xl border border-stone-300
                                       px-4 py-3 text-base outline-none transition
                                       focus:border-emerald-700
                                       focus:ring-2 focus:ring-emerald-700/10"
                            >

                            @error('email')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label
                                for="password"
                                class="mb-2 block text-sm font-medium text-stone-700"
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
                                class="w-full rounded-xl border border-stone-300
                                       px-4 py-3 text-base outline-none transition
                                       focus:border-emerald-700
                                       focus:ring-2 focus:ring-emerald-700/10"
                            >

                            @error('password')
                                <p class="mt-1 text-sm text-red-600">
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
                                class="h-4 w-4 rounded border-stone-300
                                       text-emerald-800 focus:ring-emerald-700"
                            >

                            <label
                                for="remember"
                                class="ml-2 text-sm text-stone-600"
                            >
                                Remember me
                            </label>

                        </div>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="w-full rounded-xl bg-emerald-900 px-5 py-3.5
                                   text-base font-semibold text-white transition
                                   hover:bg-emerald-800
                                   focus:outline-none
                                   focus:ring-2 focus:ring-emerald-900/20"
                        >
                            Sign In
                        </button>

                    </form>

                    {{-- Register --}}
                    <div class="mt-6 border-t border-stone-200 pt-6 text-center">

                        <p class="text-sm text-stone-500">
                            Don't have an account?
                        </p>

                        <a
                            href="{{ route('register') }}"
                            class="mt-2 inline-block font-medium text-emerald-800
                                   hover:text-emerald-950"
                        >
                            Request an account
                        </a>

                    </div>

                </div>
            </div>

            <p class="mt-6 text-center text-xs text-stone-400">
                CWL Diocese of Imus · Secure Account Access
            </p>

        </div>

    </div>

</body>
</html>