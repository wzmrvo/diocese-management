<x-admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-7">

        <p
            class="text-xs font-semibold uppercase
                   tracking-[0.18em] text-[#b08d20]"
        >
            Account Settings
        </p>

        <h2
            class="mt-1 font-serif text-3xl
                   font-semibold text-[#0b2e6f]"
        >
            Profile
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            Manage your administrator profile information.
        </p>

    </div>


    {{-- ========================================================= --}}
    {{-- SETTINGS CONTENT --}}
    {{-- ========================================================= --}}

    <div class="grid gap-5 lg:grid-cols-[250px_minmax(0,1fr)]">


        {{-- ===================================================== --}}
        {{-- SETTINGS NAVIGATION --}}
        {{-- ===================================================== --}}

        <aside
            class="h-fit rounded-2xl border
                   border-slate-200 bg-white
                   p-2 shadow-sm"
        >

            <p
                class="px-4 pb-2 pt-3
                       text-[10px] font-bold uppercase
                       tracking-[0.18em] text-slate-400"
            >
                Settings
            </p>


            {{-- PROFILE --}}

            <a
                href="{{ route('admin.settings.profile') }}"
                class="flex items-center gap-3 rounded-xl
                       bg-[#eef3ff] px-4 py-3
                       text-sm font-semibold
                       text-[#0b2e6f]"
            >

                <div
                    class="flex h-9 w-9 shrink-0
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
                            d="M15.75 6a3.75 3.75 0 11-7.5 0
                               3.75 3.75 0 017.5 0z"
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

                    <p
                        class="text-[10px] font-normal
                               text-slate-400"
                    >
                        Personal information
                    </p>

                </div>

            </a>


            {{-- SECURITY --}}

            <a
                href="{{ route('admin.settings.security') }}"
                class="mt-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50"
            >

                <div
                    class="flex h-9 w-9 shrink-0
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
                            d="M16.5 10.5V7a4.5 4.5 0 00-9 0v3.5
                               M6 10.5h12v9H6v-9z"
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
                href="{{ route('admin.settings.organization') }}"
                class="mt-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50"
            >

                <div
                    class="flex h-9 w-9 shrink-0
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
                            d="M3 21h18M5 21V8l7-5 7 5v13
                               M9 21v-6h6v6"
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
                href="{{ route('admin.settings.account') }}"
                class="mt-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm text-slate-600
                       transition hover:bg-slate-50"
            >

                <div
                    class="flex h-9 w-9 shrink-0
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


        {{-- ===================================================== --}}
        {{-- PROFILE FORM --}}
        {{-- ===================================================== --}}

        <section>

            <div
                class="overflow-hidden rounded-2xl
                       border border-slate-200
                       bg-white shadow-sm"
            >

                {{-- CARD HEADER --}}

                <div
                    class="border-b border-slate-200
                           bg-gradient-to-r
                           from-[#f8faff]
                           via-white
                           to-[#fffaf0]
                           px-6 py-6 sm:px-8"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12
                                   items-center justify-center
                                   rounded-xl bg-[#eef3ff]
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
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0
                                       3.75 3.75 0 017.5 0z"
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
                                class="text-base font-semibold
                                       text-[#0b2e6f]"
                            >
                                Personal Information
                            </h3>

                            <p
                                class="mt-1 text-xs
                                       text-slate-500"
                            >
                                Update your administrator account details.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}

                <form
                    method="POST"
                    action="{{ route('admin.settings.profile.update') }}"
                    class="p-6 sm:p-8"
                >

                    @csrf
                    @method('PATCH')


                    {{-- SUCCESS MESSAGE --}}

                    @if(session('success'))

                        <div
                            class="mb-6 rounded-xl
                                   border border-green-200
                                   bg-green-50 px-4 py-3
                                   text-sm text-green-700"
                        >
                            {{ session('success') }}
                        </div>

                    @endif


                    {{-- VALIDATION ERRORS --}}

                    @if($errors->any())

                        <div
                            class="mb-6 rounded-xl
                                   border border-red-200
                                   bg-red-50 px-4 py-3"
                        >

                            <p
                                class="text-sm font-semibold
                                       text-red-700"
                            >
                                Please correct the following:
                            </p>

                            <ul
                                class="mt-2 list-disc
                                       space-y-1 pl-5
                                       text-xs text-red-600"
                            >

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- FIRST NAME / LAST NAME --}}

                    <div class="grid gap-5 sm:grid-cols-2">

                        {{-- FIRST NAME --}}

                        <div>

                            <label
                                for="first_name"
                                class="mb-2 block text-sm
                                       font-medium text-slate-700"
                            >
                                First Name
                            </label>

                            <input
                                id="first_name"
                                name="first_name"
                                type="text"
                                value="{{ old(
                                    'first_name',
                                    auth()->user()->first_name
                                ) }}"
                                required
                                class="w-full rounded-xl
                                       border border-slate-200
                                       bg-white px-4 py-3
                                       text-sm text-slate-700
                                       outline-none transition
                                       focus:border-[#123B8F]
                                       focus:ring-2
                                       focus:ring-blue-100"
                            >

                        </div>


                        {{-- LAST NAME --}}

                        <div>

                            <label
                                for="last_name"
                                class="mb-2 block text-sm
                                       font-medium text-slate-700"
                            >
                                Last Name
                            </label>

                            <input
                                id="last_name"
                                name="last_name"
                                type="text"
                                value="{{ old(
                                    'last_name',
                                    auth()->user()->last_name
                                ) }}"
                                required
                                class="w-full rounded-xl
                                       border border-slate-200
                                       bg-white px-4 py-3
                                       text-sm text-slate-700
                                       outline-none transition
                                       focus:border-[#123B8F]
                                       focus:ring-2
                                       focus:ring-blue-100"
                            >

                        </div>

                    </div>


                    {{-- USERNAME --}}

                    <div class="mt-5">

                        <label
                            for="username"
                            class="mb-2 block text-sm
                                   font-medium text-slate-700"
                        >
                            Username
                        </label>

                        <input
                            id="username"
                            name="username"
                            type="text"
                            value="{{ old(
                                'username',
                                auth()->user()->username
                            ) }}"
                            class="w-full rounded-xl
                                   border border-slate-200
                                   bg-white px-4 py-3
                                   text-sm text-slate-700
                                   outline-none transition
                                   focus:border-[#123B8F]
                                   focus:ring-2
                                   focus:ring-blue-100"
                        >

                    </div>


                    {{-- EMAIL --}}

                    <div class="mt-5">

                        <label
                            for="email"
                            class="mb-2 block text-sm
                                   font-medium text-slate-700"
                        >
                            Email Address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old(
                                'email',
                                auth()->user()->email
                            ) }}"
                            required
                            class="w-full rounded-xl
                                   border border-slate-200
                                   bg-white px-4 py-3
                                   text-sm text-slate-700
                                   outline-none transition
                                   focus:border-[#123B8F]
                                   focus:ring-2
                                   focus:ring-blue-100"
                        >

                    </div>


                    {{-- ADMIN ROLE --}}

                    <div class="mt-5">

                        <label
                            class="mb-2 block text-sm
                                   font-medium text-slate-700"
                        >
                            Account Role
                        </label>

                        <div
                            class="flex items-center
                                   justify-between rounded-xl
                                   border border-slate-200
                                   bg-slate-50 px-4 py-3"
                        >

                            <div>

                                <p
                                    class="text-sm font-medium
                                           text-slate-700"
                                >
                                    Administrator
                                </p>

                                <p
                                    class="mt-0.5 text-xs
                                           text-slate-400"
                                >
                                    Your account role is managed
                                    by the system.
                                </p>

                            </div>

                            <span
                                class="rounded-full
                                       bg-[#eef3ff]
                                       px-3 py-1 text-xs
                                       font-bold uppercase
                                       tracking-wide
                                       text-[#123B8F]"
                            >
                                {{ ucfirst(
                                    auth()->user()->role ?? 'Admin'
                                ) }}
                            </span>

                        </div>

                    </div>


                    {{-- SAVE BUTTON --}}

                    <div
                        class="mt-7 flex flex-wrap
                               items-center justify-end
                               gap-3 border-t
                               border-slate-100 pt-6"
                    >

                        <button
                            type="submit"
                            class="rounded-xl bg-[#0b2e6f]
                                   px-5 py-3 text-sm
                                   font-semibold text-white
                                   shadow-sm transition
                                   hover:bg-[#123b8f]
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-200"
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </div>

</x-admin-layout>