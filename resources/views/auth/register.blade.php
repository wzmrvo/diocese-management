<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="min-h-screen bg-white text-slate-800">

<div class="min-h-screen flex items-center justify-center px-4 py-10">

<div class="w-full max-w-4xl">


    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-8 text-center">

        <div class="mx-auto mb-5 flex h-24 w-24 items-center justify-center">

            <img
                src="{{ asset('images/cwl/logo/cwl-logo.png') }}"
                alt="Catholic Women's League Diocese of Imus"
                class="h-20 w-20 object-contain"
            >

        </div>


        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[#B08D1A]">
            Catholic Women's League
        </p>


        <h1 class="mt-2 text-3xl font-bold tracking-tight text-[#123B7A] sm:text-4xl">
            Create Your Account
        </h1>


        <p class="mt-2 text-sm text-slate-500 sm:text-base">
            Diocese of Imus
        </p>

    </div>



    {{-- ========================================================= --}}
    {{-- MAIN CARD --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">


        {{-- Royal Blue Top Bar --}}

        <div class="h-2 bg-[#123B7A]"></div>



        {{-- ===================================================== --}}
        {{-- NOTICE --}}
        {{-- ===================================================== --}}

        <div class="border-b border-slate-200 bg-[#F8FAFD] px-6 py-6 sm:px-10">

            <div class="flex gap-4">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center
                            rounded-full bg-[#123B7A] text-white">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                        />

                    </svg>

                </div>


                <div>

                    <p class="font-semibold text-[#123B7A]">
                        Your account will be reviewed.
                    </p>


                    <p class="mt-1 text-sm leading-6 text-slate-600">

                        Please provide your correct organizational information.
                        A Diocesan Administrator will verify your account before
                        you can access the system.

                    </p>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- FORM --}}
        {{-- ===================================================== --}}

        <form
            method="POST"
            action="{{ route('register') }}"
            class="space-y-10 p-6 sm:p-10"
        >

            @csrf



            {{-- ================================================= --}}
            {{-- PERSONAL INFORMATION --}}
            {{-- ================================================= --}}

            <section>

                <div class="mb-6">

                    <div class="flex items-center gap-3">

                        <div class="h-8 w-1 rounded-full bg-[#D4AF37]"></div>

                        <div>

                            <h2 class="text-xl font-bold text-[#123B7A]">
                                Personal Information
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Please enter your basic account information.
                            </p>

                        </div>

                    </div>

                </div>



                <div class="grid gap-5 sm:grid-cols-2">


                    {{-- FULL NAME --}}

                    <div class="sm:col-span-2">

                        <label
                            for="name"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
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
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >


                        @error('name')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- EMAIL --}}

                    <div>

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
                            value="{{ old('email') }}"
                            required
                            placeholder="example@email.com"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >


                        @error('email')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- CONTACT --}}

                    <div>

                        <label
                            for="contact_number"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >

                            Contact Number

                            <span class="font-normal text-slate-400">
                                (Optional)
                            </span>

                        </label>


                        <input
                            id="contact_number"
                            name="contact_number"
                            type="tel"
                            value="{{ old('contact_number') }}"
                            placeholder="09XX XXX XXXX"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >


                        @error('contact_number')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- PASSWORD --}}

                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Password
                        </label>


                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            placeholder="At least 8 characters"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >


                        @error('password')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- CONFIRM PASSWORD --}}

                    <div>

                        <label
                            for="password_confirmation"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Confirm Password
                        </label>


                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            placeholder="Enter password again"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >

                    </div>

                </div>

            </section>



            {{-- ================================================= --}}
            {{-- ORGANIZATION INFORMATION --}}
            {{-- ================================================= --}}

            <section class="border-t border-slate-200 pt-10">


                <div class="mb-6">

                    <div class="flex items-center gap-3">

                        <div class="h-8 w-1 rounded-full bg-[#D4AF37]"></div>


                        <div>

                            <h2 class="text-xl font-bold text-[#123B7A]">
                                Organization Information
                            </h2>


                            <p class="mt-1 text-sm text-slate-500">

                                Provide your current CWL organizational
                                information. This information will be
                                verified by an administrator.

                            </p>

                        </div>

                    </div>

                </div>



                <div class="grid gap-5 sm:grid-cols-2">



                    {{-- ================================================= --}}
                    {{-- MEMBER TYPE --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="member_type"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Member Type
                        </label>


                        <select
                            id="member_type"
                            name="member_type"
                            required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >

                            <option value="">
                                Select member type
                            </option>


                            <option
                                value="senior"
                                {{ old('member_type') === 'senior' ? 'selected' : '' }}
                            >
                                Senior Member
                            </option>


                            <option
                                value="junior"
                                {{ old('member_type') === 'junior' ? 'selected' : '' }}
                            >
                                Junior Member
                            </option>

                        </select>


                        @error('member_type')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- ================================================= --}}
                    {{-- ORGANIZATIONAL LEVEL --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="organization_level"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Organizational Level
                        </label>


                        <select
                            id="organization_level"
                            name="organization_level"
                            required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >

                            <option value="">
                                Select your level
                            </option>


                            <option
                                value="diocesan"
                                {{ old('organization_level') === 'diocesan' ? 'selected' : '' }}
                            >
                                Diocesan
                            </option>


                            <option
                                value="vicariate"
                                {{ old('organization_level') === 'vicariate' ? 'selected' : '' }}
                            >
                                Vicariate
                            </option>


                            <option
                                value="unit"
                                {{ old('organization_level') === 'unit' ? 'selected' : '' }}
                            >
                                Unit / Parish
                            </option>

                        </select>


                        @error('organization_level')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- ================================================= --}}
                    {{-- POSITION --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="position"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Position
                        </label>


                        <select
                            id="position"
                            name="position"
                            required
                            disabled
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   disabled:cursor-not-allowed
                                   disabled:bg-slate-50
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >

                            <option value="">
                                Select organizational level first
                            </option>

                        </select>


                        @error('position')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- ================================================= --}}
                    {{-- VICARIATE --}}
                    {{-- ================================================= --}}

                    <div
                        id="vicariate-wrapper"
                        class="hidden"
                    >

                        <label
                            for="vicariate_id"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Vicariate
                        </label>


                        <select
                            id="vicariate_id"
                            name="vicariate_id"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >

                            <option value="">
                                Select your Vicariate
                            </option>


                            @foreach ($vicariates as $vicariate)

                                <option
                                    value="{{ $vicariate->id }}"
                                    {{ old('vicariate_id') == $vicariate->id ? 'selected' : '' }}
                                >
                                    {{ $vicariate->name }}
                                </option>

                            @endforeach

                        </select>


                        @error('vicariate_id')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    {{-- ================================================= --}}
                    {{-- UNIT / PARISH --}}
                    {{-- ================================================= --}}

                    <div
                        id="unit-wrapper"
                        class="hidden"
                    >

                        <label
                            for="unit_id"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Unit / Parish
                        </label>


                        <select
                            id="unit_id"
                            name="unit_id"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3
                                   text-base outline-none transition
                                   focus:border-[#123B7A]
                                   focus:ring-2 focus:ring-[#123B7A]/10"
                        >

                            <option value="">
                                Select your Unit / Parish
                            </option>


                            @foreach ($units as $unit)

                                <option
                                    value="{{ $unit->id }}"
                                    data-vicariate="{{ $unit->vicariate_id }}"
                                    {{ old('unit_id') == $unit->id ? 'selected' : '' }}
                                >
                                    {{ $unit->name }}
                                </option>

                            @endforeach

                        </select>


                        @error('unit_id')

                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- ORGANIZATION NOTE --}}
                {{-- ================================================= --}}

                <div class="mt-6 rounded-xl border border-[#D4AF37]/40 bg-[#FFFDF5] p-4">

                    <div class="flex gap-3">

                        <div class="mt-0.5 text-[#B08D1A]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />

                            </svg>

                        </div>


                        <p class="text-sm leading-6 text-slate-600">

                            Your organizational level, position, Vicariate,
                            and Unit / Parish information will be reviewed
                            by the administrator before your account is approved.

                        </p>

                    </div>

                </div>

            </section>



            {{-- ================================================= --}}
            {{-- SUBMIT --}}
            {{-- ================================================= --}}

            <div class="border-t border-slate-200 pt-8">


                <button
                    type="submit"
                    class="w-full rounded-xl bg-[#123B7A] px-6 py-3.5
                           text-base font-semibold text-white
                           transition hover:bg-[#0E2F63]
                           focus:outline-none
                           focus:ring-2 focus:ring-[#123B7A]/30
                           sm:w-auto sm:min-w-52"
                >

                    Submit Account Request

                </button>


                <p class="mt-5 text-center text-sm text-slate-500 sm:text-left">

                    Already have an account?


                    <a
                        href="{{ route('login') }}"
                        class="font-semibold text-[#123B7A] hover:text-[#B08D1A]"
                    >
                        Sign in
                    </a>

                </p>

            </div>

        </form>

    </div>



    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <div class="mt-7 text-center">

        <div class="mx-auto mb-3 h-px w-16 bg-[#D4AF37]"></div>


        <p class="text-xs text-slate-400">
            Catholic Women's League · Diocese of Imus
        </p>

    </div>

</div>

</div>



{{-- ============================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

    /*
    |--------------------------------------------------------------------------
    | Elements
    |--------------------------------------------------------------------------
    */

    const level =
        document.getElementById('organization_level');

    const position =
        document.getElementById('position');

    const vicariateWrapper =
        document.getElementById('vicariate-wrapper');

    const unitWrapper =
        document.getElementById('unit-wrapper');

    const vicariateSelect =
        document.getElementById('vicariate_id');

    const unitSelect =
        document.getElementById('unit_id');



    /*
    |--------------------------------------------------------------------------
    | Position Options
    |--------------------------------------------------------------------------
    |
    | These values should match the database values.
    |
    */

    const positions = {

        /*
        |--------------------------------------------------------------------------
        | DIOCESAN
        |--------------------------------------------------------------------------
        */

        diocesan: [

            {
                value: 'president',
                label: 'President'
            },

            {
                value: 'first_vice_president',
                label: '1st Vice President'
            },

            {
                value: 'second_vice_president',
                label: '2nd Vice President'
            },

            {
                value: 'secretary',
                label: 'Secretary'
            },

            {
                value: 'assistant_secretary',
                label: 'Assistant Secretary'
            },

            {
                value: 'treasurer',
                label: 'Treasurer'
            },

            {
                value: 'assistant_treasurer',
                label: 'Assistant Treasurer'
            },

            {
                value: 'auditor',
                label: 'Auditor'
            },

            {
                value: 'dbm',
                label: 'Diocesan Board Member'
            }

        ],



        /*
        |--------------------------------------------------------------------------
        | VICARIATE
        |--------------------------------------------------------------------------
        */

        vicariate: [

            {
                value: 'president',
                label: 'President'
            },

            {
                value: 'supervisor',
                label: 'Supervisor'
            }

        ],



        /*
        |--------------------------------------------------------------------------
        | UNIT / PARISH
        |--------------------------------------------------------------------------
        */

        unit: [

            {
                value: 'president',
                label: 'President'
            },

            {
                value: 'vice_president',
                label: 'Vice President'
            },

            {
                value: 'secretary',
                label: 'Secretary'
            },

            {
                value: 'assistant_secretary',
                label: 'Assistant Secretary'
            },

            {
                value: 'treasurer',
                label: 'Treasurer'
            },

            {
                value: 'auditor',
                label: 'Auditor'
            },

            {
                value: 'board_member',
                label: 'Board Member'
            },

            {
                value: 'member',
                label: 'Member'
            }

        ]

    };



    /*
    |--------------------------------------------------------------------------
    | Update Positions
    |--------------------------------------------------------------------------
    */

    function updatePositions() {

        const selectedLevel =
            level.value;

        const oldPosition =
            @json(old('position'));



        /*
        |--------------------------------------------------------------------------
        | Clear current options
        |--------------------------------------------------------------------------
        */

        position.innerHTML = '';

        position.disabled = true;



        /*
        |--------------------------------------------------------------------------
        | No level selected
        |--------------------------------------------------------------------------
        */

        if (!selectedLevel) {

            const option =
                document.createElement('option');

            option.value = '';

            option.textContent =
                'Select organizational level first';

            position.appendChild(option);

            return;
        }



        /*
        |--------------------------------------------------------------------------
        | Default option
        |--------------------------------------------------------------------------
        */

        const defaultOption =
            document.createElement('option');

        defaultOption.value = '';

        defaultOption.textContent =
            'Select your position';

        position.appendChild(defaultOption);



        /*
        |--------------------------------------------------------------------------
        | Add positions for selected level
        |--------------------------------------------------------------------------
        */

        positions[selectedLevel].forEach(
            function(item) {

                const option =
                    document.createElement('option');

                option.value =
                    item.value;

                option.textContent =
                    item.label;



                /*
                |--------------------------------------------------------------------------
                | Restore previous selection after validation error
                |--------------------------------------------------------------------------
                */

                if (
                    oldPosition === item.value
                ) {

                    option.selected = true;

                }


                position.appendChild(option);

            }
        );



        /*
        |--------------------------------------------------------------------------
        | Enable position field
        |--------------------------------------------------------------------------
        */

        position.disabled = false;

    }



    /*
    |--------------------------------------------------------------------------
    | Update Organization Fields
    |--------------------------------------------------------------------------
    */

    function updateOrganizationFields() {

        const value =
            level.value;



        /*
        |--------------------------------------------------------------------------
        | DIOCESAN
        |--------------------------------------------------------------------------
        */

        if (value === 'diocesan') {

            vicariateWrapper.classList.add('hidden');

            unitWrapper.classList.add('hidden');


            vicariateSelect.value = '';

            unitSelect.value = '';


            vicariateSelect.removeAttribute(
                'required'
            );

            unitSelect.removeAttribute(
                'required'
            );

            return;

        }



        /*
        |--------------------------------------------------------------------------
        | VICARIATE
        |--------------------------------------------------------------------------
        */

        if (value === 'vicariate') {

            vicariateWrapper.classList.remove('hidden');

            unitWrapper.classList.add('hidden');


            vicariateSelect.setAttribute(
                'required',
                'required'
            );

            unitSelect.removeAttribute(
                'required'
            );


            unitSelect.value = '';

            return;

        }



        /*
        |--------------------------------------------------------------------------
        | UNIT / PARISH
        |--------------------------------------------------------------------------
        */

        if (value === 'unit') {

            vicariateWrapper.classList.remove('hidden');

            unitWrapper.classList.remove('hidden');


            vicariateSelect.setAttribute(
                'required',
                'required'
            );

            unitSelect.setAttribute(
                'required',
                'required'
            );


            filterUnits();

            return;

        }



        /*
        |--------------------------------------------------------------------------
        | NOTHING SELECTED
        |--------------------------------------------------------------------------
        */

        vicariateWrapper.classList.add('hidden');

        unitWrapper.classList.add('hidden');


        vicariateSelect.removeAttribute(
            'required'
        );

        unitSelect.removeAttribute(
            'required'
        );

    }



    /*
    |--------------------------------------------------------------------------
    | Filter Units By Vicariate
    |--------------------------------------------------------------------------
    */

    function filterUnits() {

        const selectedVicariate =
            vicariateSelect.value;


        const options =
            unitSelect.querySelectorAll(
                'option[data-vicariate]'
            );



        options.forEach(
            function(option) {

                const belongsToVicariate =
                    option.dataset.vicariate ===
                    selectedVicariate;


                option.hidden =
                    !belongsToVicariate;

            }
        );



        /*
        |--------------------------------------------------------------------------
        | Clear invalid unit selection
        |--------------------------------------------------------------------------
        */

        const selectedOption =
            unitSelect.options[
                unitSelect.selectedIndex
            ];


        if (
            selectedOption &&
            selectedOption.dataset.vicariate &&
            selectedOption.dataset.vicariate !== selectedVicariate
        ) {

            unitSelect.value = '';

        }

    }



    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    level.addEventListener(
        'change',
        function() {

            updatePositions();

            updateOrganizationFields();

        }
    );


    vicariateSelect.addEventListener(
        'change',
        filterUnits
    );



    /*
    |--------------------------------------------------------------------------
    | Initial State
    |--------------------------------------------------------------------------
    */

    updatePositions();

    updateOrganizationFields();

</script>


</body>
</html>