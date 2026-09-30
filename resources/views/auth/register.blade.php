<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-stone-50 text-stone-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-3xl">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center
                            rounded-full bg-emerald-900 text-white shadow-sm">
                    <span class="text-2xl font-serif">✝</span>
                </div>

                <h1 class="text-2xl sm:text-3xl font-semibold text-emerald-950">
                    Create Your Account
                </h1>

                <p class="mt-2 text-sm sm:text-base text-stone-500">
                    CWL Diocese of Imus
                </p>
            </div>

            {{-- Main Card --}}
            <div class="rounded-2xl border border-stone-200 bg-white shadow-sm">

                {{-- Notice --}}
                <div class="border-b border-stone-200 bg-emerald-50 px-6 py-5 sm:px-8">
                    <div class="flex gap-3">
                        <div class="mt-0.5 text-emerald-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-medium text-emerald-950">
                                Your account will be reviewed.
                            </p>

                            <p class="mt-1 text-sm leading-6 text-emerald-800">
                                Please provide your correct information. A Diocesan
                                Administrator will verify your account before you can
                                access the system.
                            </p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}"
                      class="space-y-8 p-6 sm:p-8">

                    @csrf

                    {{-- Personal Information --}}
                    <section>
                        <div class="mb-5">
                            <h2 class="text-lg font-semibold text-emerald-950">
                                Personal Information
                            </h2>

                            <p class="mt-1 text-sm text-stone-500">
                                Please enter your basic information.
                            </p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">

                            {{-- Name --}}
                            <div class="sm:col-span-2">
                                <label for="name"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Full Name
                                </label>

                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    placeholder="Enter your full name"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >

                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Email Address
                                </label>

                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    placeholder="example@email.com"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >

                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Contact --}}
                            <div>
                                <label for="contact_number"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Contact Number
                                    <span class="font-normal text-stone-400">(Optional)</span>
                                </label>

                                <input
                                    id="contact_number"
                                    name="contact_number"
                                    type="tel"
                                    value="{{ old('contact_number') }}"
                                    placeholder="09XX XXX XXXX"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >

                                @error('contact_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div>
                                <label for="password"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Password
                                </label>

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    placeholder="At least 8 characters"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >

                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div>
                                <label for="password_confirmation"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Confirm Password
                                </label>

                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    placeholder="Enter password again"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >
                            </div>

                        </div>
                    </section>

                    {{-- Organization Information --}}
                    <section class="border-t border-stone-200 pt-8">

                        <div class="mb-5">
                            <h2 class="text-lg font-semibold text-emerald-950">
                                Organization Information
                            </h2>

                            <p class="mt-1 text-sm text-stone-500">
                                Tell us where you serve in the CWL organization.
                            </p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">

                            {{-- Level --}}
                            <div>
                                <label for="organization_level"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Organizational Level
                                </label>

                                <select
                                    id="organization_level"
                                    name="organization_level"
                                    required
                                    class="w-full rounded-xl border border-stone-300 bg-white px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >
                                    <option value="">Select your level</option>
                                    <option value="diocesan"
                                        {{ old('organization_level') === 'diocesan' ? 'selected' : '' }}>
                                        Diocesan
                                    </option>
                                    <option value="vicariate"
                                        {{ old('organization_level') === 'vicariate' ? 'selected' : '' }}>
                                        Vicariate
                                    </option>
                                    <option value="unit"
                                        {{ old('organization_level') === 'unit' ? 'selected' : '' }}>
                                        Unit / Parish
                                    </option>
                                </select>

                                @error('organization_level')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Position --}}
                            <div>
                                <label for="position"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Position
                                </label>

                                <select
                                    id="position"
                                    name="position"
                                    required
                                    class="w-full rounded-xl border border-stone-300 bg-white px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >
                                    <option value="">Select your position</option>
                                    <option value="president">President</option>
                                    <option value="vice_president">Vice President</option>
                                    <option value="secretary">Secretary</option>
                                    <option value="assistant_secretary">Assistant Secretary</option>
                                    <option value="treasurer">Treasurer</option>
                                    <option value="auditor">Auditor</option>
                                    <option value="board_member">Board Member</option>
                                    <option value="member">Member</option>
                                </select>

                                @error('position')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Vicariate --}}
                            <div id="vicariate-wrapper" class="hidden">
                                <label for="vicariate"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Vicariate
                                </label>

                                <input
                                    id="vicariate"
                                    name="vicariate"
                                    type="text"
                                    value="{{ old('vicariate') }}"
                                    placeholder="Enter your Vicariate"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >
                            </div>

                            {{-- Unit --}}
                            <div id="unit-wrapper" class="hidden">
                                <label for="unit"
                                       class="mb-2 block text-sm font-medium text-stone-700">
                                    Unit / Parish
                                </label>

                                <input
                                    id="unit"
                                    name="unit"
                                    type="text"
                                    value="{{ old('unit') }}"
                                    placeholder="Enter your Unit or Parish"
                                    class="w-full rounded-xl border border-stone-300 px-4 py-3
                                           text-base outline-none transition
                                           focus:border-emerald-700 focus:ring-2
                                           focus:ring-emerald-700/10"
                                >
                            </div>

                        </div>
                    </section>

                    {{-- Submit --}}
                    <div class="border-t border-stone-200 pt-6">

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-emerald-900 px-5 py-3.5
                                   text-base font-semibold text-white transition
                                   hover:bg-emerald-800 focus:outline-none
                                   focus:ring-2 focus:ring-emerald-900/20
                                   sm:w-auto sm:min-w-48"
                        >
                            Submit Account Request
                        </button>

                        <p class="mt-4 text-center text-sm text-stone-500 sm:text-left">
                            Already have an account?
                            <a href="{{ route('login') }}"
                               class="font-medium text-emerald-800 hover:text-emerald-950">
                                Sign in
                            </a>
                        </p>

                    </div>

                </form>
            </div>

            <p class="mt-6 text-center text-xs text-stone-400">
                CWL Diocese of Imus · Account Registration
            </p>

        </div>
    </div>

    <script>
        const level = document.getElementById('organization_level');
        const vicariateWrapper = document.getElementById('vicariate-wrapper');
        const unitWrapper = document.getElementById('unit-wrapper');

        function updateOrganizationFields() {
            const value = level.value;

            vicariateWrapper.classList.toggle(
                'hidden',
                value !== 'vicariate' && value !== 'unit'
            );

            unitWrapper.classList.toggle(
                'hidden',
                value !== 'unit'
            );
        }

        level.addEventListener('change', updateOrganizationFields);

        updateOrganizationFields();
    </script>

</body>
</html>