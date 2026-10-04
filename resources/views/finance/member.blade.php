<x-app-layout>

<div
    x-data="{
        requestOpen: false,
        submitted: false
    }"
    class="min-h-screen bg-[#f7f8fc] text-slate-800"
>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header class="border-b border-slate-200 bg-white">

        <div class="mx-auto max-w-7xl px-5 py-5 sm:px-7 lg:px-8">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#b08d20]">
                        Finance
                    </p>

                    <h1 class="mt-1 font-serif text-3xl font-semibold text-[#0b2e6f]">
                        My Finance
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        View your monthly dues, payment requests, and approved financial records.
                    </p>

                </div>


                <a
                    href="{{ url('/member') }}"
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
        {{-- FINANCE NAVIGATION --}}
        {{-- ========================================================= --}}

        <section class="mb-7">

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">


                {{-- MY FINANCE --}}

                <a
                    href="{{ url('/member/finance') }}"
                    class="rounded-2xl border-2 border-[#d4af37]
                           bg-[#fffdf5] p-4 shadow-sm"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-14 w-14 shrink-0 items-center
                                   justify-center rounded-xl
                                   bg-[#fff1bd] text-[#9a7712]"
                        >

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
                                    d="M4 19V5M4 19h16"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-width="1.8"
                                    d="M8 16v-5M12 16V8M16 16V6"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-[#0b2e6f]">
                                My Finance
                            </p>

                            <p class="mt-0.5 text-xs text-slate-500">
                                Financial overview
                            </p>

                        </div>

                    </div>

                </a>


                {{-- DUES --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-14 w-14 shrink-0 items-center
                                   justify-center rounded-xl
                                   bg-blue-50 text-[#123B8F]"
                        >

                            <svg
                                class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
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

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                My Dues
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Monthly dues
                            </p>

                        </div>

                    </div>

                </div>


                {{-- REQUEST --}}

                <button
                    type="button"
                    @click="requestOpen = true"
                    class="text-left rounded-2xl border border-slate-200
                           bg-white p-4 shadow-sm transition
                           hover:-translate-y-0.5 hover:border-blue-200
                           hover:shadow-md"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-14 w-14 shrink-0 items-center
                                   justify-center rounded-xl
                                   bg-[#fff8e5] text-[#b08d20]"
                        >

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
                                    d="M12 5v14M5 12h14"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Request Payment
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Submit for approval
                            </p>

                        </div>

                    </div>

                </button>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- SUMMARY --}}
        {{-- ========================================================= --}}

        <section class="mb-7">

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">


                {{-- MONTHLY DUE --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div
                        class="flex h-11 w-11 items-center justify-center
                               rounded-xl bg-blue-50 text-[#123B8F]"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
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

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Current Monthly Due
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#123B8F]">
                        ₱0.00
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Awaiting payment record
                    </p>

                </div>


                {{-- PENDING --}}

                <div class="rounded-2xl border border-[#e7d49a] bg-[#fffaf0] p-5 shadow-sm">

                    <div
                        class="flex h-11 w-11 items-center justify-center
                               rounded-xl bg-[#fff1bd] text-[#9a7712]"
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

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Pending Requests
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#9a7712]">
                        0
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Waiting for treasurer approval
                    </p>

                </div>


                {{-- APPROVED --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div
                        class="flex h-11 w-11 items-center justify-center
                               rounded-xl bg-green-50 text-green-600"
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
                                d="M8 12l2.5 2.5L16 9"
                            />
                        </svg>

                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Approved Payments
                    </p>

                    <p class="mt-1 text-2xl font-bold text-green-600">
                        0
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Officially recorded
                    </p>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- PAYMENT REQUEST INFO --}}
        {{-- ========================================================= --}}

        <section class="grid gap-5 lg:grid-cols-3">


            {{-- REQUEST EXPLANATION --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="font-semibold text-[#0b2e6f]">
                        My Payment Requests
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Monthly dues must be verified by the Unit Treasurer.
                    </p>

                </div>

                <div class="p-6">

                    <div
                        class="rounded-xl border border-dashed
                               border-slate-300 bg-slate-50
                               px-6 py-10 text-center"
                    >

                        <div
                            class="mx-auto flex h-12 w-12 items-center
                                   justify-center rounded-xl
                                   bg-blue-50 text-[#123B8F]"
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
                                    d="M9 12h6M12 9v6"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-700">
                            No payment requests
                        </p>

                        <p class="mx-auto mt-1 max-w-md text-xs leading-5 text-slate-400">
                            After paying your monthly dues face-to-face, submit a
                            payment request so the Unit Treasurer can verify and approve it.
                        </p>

                        <button
                            type="button"
                            @click="requestOpen = true"
                            class="mt-5 inline-flex items-center gap-2
                                   rounded-xl bg-[#123B8F] px-4 py-2.5
                                   text-sm font-semibold text-white
                                   shadow-sm transition hover:bg-[#0b2e6f]"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 5v14M5 12h14"
                                />
                            </svg>

                            Request Payment Approval

                        </button>

                    </div>

                </div>

            </div>


            {{-- PROCESS --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="font-semibold text-[#0b2e6f]">
                        How It Works
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Monthly payment verification process.
                    </p>

                </div>

                <div class="space-y-4 p-6">


                    <div class="flex gap-3">

                        <div
                            class="flex h-8 w-8 shrink-0 items-center
                                   justify-center rounded-full
                                   bg-blue-50 text-xs font-bold text-[#123B8F]"
                        >
                            1
                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Pay face-to-face
                            </p>

                            <p class="mt-1 text-xs leading-5 text-slate-400">
                                Give your monthly due to your Unit Treasurer.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-3">

                        <div
                            class="flex h-8 w-8 shrink-0 items-center
                                   justify-center rounded-full
                                   bg-[#fff8e5] text-xs font-bold text-[#9a7712]"
                        >
                            2
                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Submit request
                            </p>

                            <p class="mt-1 text-xs leading-5 text-slate-400">
                                Record your monthly payment through this system.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-3">

                        <div
                            class="flex h-8 w-8 shrink-0 items-center
                                   justify-center rounded-full
                                   bg-green-50 text-xs font-bold text-green-700"
                        >
                            3
                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Treasurer verifies
                            </p>

                            <p class="mt-1 text-xs leading-5 text-slate-400">
                                The Unit Treasurer confirms the actual payment.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-3">

                        <div
                            class="flex h-8 w-8 shrink-0 items-center
                                   justify-center rounded-full
                                   bg-blue-50 text-xs font-bold text-[#123B8F]"
                        >
                            4
                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Official record
                            </p>

                            <p class="mt-1 text-xs leading-5 text-slate-400">
                                Approved payments become part of the financial record.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <footer class="mt-8 pb-4 text-center">

            <p class="text-[11px] text-slate-400">
                CWL Diocese of Imus · Member Finance
            </p>

        </footer>

    </main>


    {{-- ========================================================= --}}
    {{-- PAYMENT REQUEST MODAL --}}
    {{-- ========================================================= --}}

    <div
        x-show="requestOpen"
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center
               justify-center bg-slate-900/40 px-4 py-6"
        style="display: none;"
        @keydown.escape.window="requestOpen = false"
    >

        <div
            x-show="requestOpen"
            x-transition
            @click.outside="requestOpen = false"
            class="w-full max-w-lg overflow-hidden
                   rounded-2xl bg-white shadow-2xl"
        >

            {{-- MODAL HEADER --}}

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-[0.15em] text-[#b08d20]">
                            Monthly Payment
                        </p>

                        <h2 class="mt-1 text-xl font-semibold text-[#0b2e6f]">
                            Request Payment Approval
                        </h2>

                        <p class="mt-1 text-xs leading-5 text-slate-500">
                            Submit this only after you have actually paid your
                            monthly dues face-to-face.
                        </p>

                    </div>

                    <button
                        type="button"
                        @click="requestOpen = false"
                        class="rounded-lg p-2 text-slate-400
                               transition hover:bg-slate-100 hover:text-slate-600"
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
                                d="M6 6l12 12M18 6L6 18"
                            />
                        </svg>

                    </button>

                </div>

            </div>


            {{-- MODAL FORM --}}

            <form
                @submit.prevent="
                    submitted = true;
                    setTimeout(() => {
                        requestOpen = false;
                        submitted = false;
                    }, 1200)
                "
                class="space-y-5 px-6 py-6"
            >



                {{-- PERIOD --}}

                <div class="grid gap-4 sm:grid-cols-2">

                    <div>

                        <label
                            for="payment_month"
                            class="block text-sm font-semibold text-slate-700"
                        >
                            Month
                        </label>

                        <select
                            id="payment_month"
                            class="mt-2 block w-full rounded-xl
                                   border-slate-300 bg-white
                                   text-sm text-slate-700
                                   focus:border-[#123B8F]
                                   focus:ring-[#123B8F]"
                        >

                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>

                        </select>

                    </div>


                    <div>

                        <label
                            for="payment_year"
                            class="block text-sm font-semibold text-slate-700"
                        >
                            Year
                        </label>

                        <input
                            id="payment_year"
                            type="number"
                            value="{{ now()->year }}"
                            min="2020"
                            max="2100"
                            required
                            class="mt-2 block w-full rounded-xl
                                   border-slate-300
                                   text-sm text-slate-700
                                   focus:border-[#123B8F]
                                   focus:ring-[#123B8F]"
                        >

                    </div>

                </div>


                {{-- AMOUNT --}}

                <div>

                    <label
                        for="amount"
                        class="block text-sm font-semibold text-slate-700"
                    >
                        Amount Paid
                    </label>

                    <div class="relative mt-2">

                        <span
                            class="absolute left-3 top-1/2
                                   -translate-y-1/2 text-sm
                                   font-semibold text-slate-400"
                        >
                            ₱
                        </span>

                        <input
                            id="amount"
                            type="number"
                            step="0.01"
                            min="0"
                            required
                            placeholder="0.00"
                            class="block w-full rounded-xl
                                   border-slate-300 pl-8
                                   text-sm text-slate-700
                                   focus:border-[#123B8F]
                                   focus:ring-[#123B8F]"
                        >

                    </div>

                </div>


                {{-- PAYMENT DATE --}}

                <div>

                    <label
                        for="payment_date"
                        class="block text-sm font-semibold text-slate-700"
                    >
                        Date Paid
                    </label>

                    <input
                        id="payment_date"
                        type="date"
                        value="{{ now()->format('Y-m-d') }}"
                        required
                        class="mt-2 block w-full rounded-xl
                               border-slate-300
                               text-sm text-slate-700
                               focus:border-[#123B8F]
                               focus:ring-[#123B8F]"
                    >

                </div>


                {{-- NOTE --}}

                <div>

                    <label
                        for="notes"
                        class="block text-sm font-semibold text-slate-700"
                    >
                        Notes
                        <span class="font-normal text-slate-400">
                            (optional)
                        </span>
                    </label>

                    <textarea
                        id="notes"
                        rows="3"
                        placeholder="Optional payment details..."
                        class="mt-2 block w-full rounded-xl
                               border-slate-300 text-sm
                               text-slate-700
                               focus:border-[#123B8F]
                               focus:ring-[#123B8F]"
                    ></textarea>

                </div>


                {{-- NOTICE --}}

                <div
                    class="rounded-xl border border-[#e7d49a]
                           bg-[#fffaf0] px-4 py-3"
                >

                    <div class="flex gap-3">

                        <svg
                            class="mt-0.5 h-5 w-5 shrink-0 text-[#b08d20]"
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
                                d="M12 8v4M12 16h.01"
                            />
                        </svg>

                        <p class="text-xs leading-5 text-slate-600">
                            Your request will remain
                            <strong>Pending</strong>
                            until the Unit Treasurer verifies the face-to-face
                            monthly payment.
                        </p>

                    </div>

                </div>


                {{-- ACTIONS --}}

                <div class="flex justify-end gap-3 pt-1">

                    <button
                        type="button"
                        @click="requestOpen = false"
                        class="rounded-xl border border-slate-200
                               bg-white px-4 py-2.5 text-sm
                               font-semibold text-slate-600
                               transition hover:bg-slate-50"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2
                               rounded-xl bg-[#123B8F]
                               px-4 py-2.5 text-sm
                               font-semibold text-white
                               shadow-sm transition
                               hover:bg-[#0b2e6f]"
                    >

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>

                        Submit Request

                    </button>

                </div>


                {{-- PROTOTYPE MESSAGE --}}

                <div
                    x-show="submitted"
                    x-transition
                    class="rounded-xl bg-green-50 px-4 py-3 text-center
                           text-xs font-semibold text-green-700"
                >
                    Monthly payment request submitted for approval.
                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>