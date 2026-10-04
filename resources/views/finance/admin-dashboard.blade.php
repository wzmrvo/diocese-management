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
                        Finance
                    </p>

                    <h1 class="mt-1 font-serif text-3xl font-semibold text-[#0b2e6f]">
                        Finance Dashboard
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Overall financial overview of the CWL Diocese of Imus.
                    </p>

                </div>


                <a
                    href="{{ url('/admin') }}"
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

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

                {{-- OVERVIEW --}}

                <a
                    href="{{ url('/admin/finance') }}"
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
                                Overview
                            </p>

                            <p class="mt-0.5 text-xs text-slate-500">
                                Financial dashboard
                            </p>

                        </div>

                    </div>

                </a>


                {{-- DUES --}}

                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-4 shadow-sm"
                >

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
                                    y="4"
                                    width="16"
                                    height="16"
                                    rx="2"
                                    stroke-width="1.8"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-width="1.8"
                                    d="M8 9h8M8 13h8M8 17h4"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Dues
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Monthly and yearly
                            </p>

                        </div>

                    </div>

                </div>


                {{-- EXPENSES --}}

                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-4 shadow-sm"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-14 w-14 shrink-0 items-center
                                   justify-center rounded-xl
                                   bg-red-50 text-red-600"
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
                                    d="M12 3v18M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Expenses
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Organization spending
                            </p>

                        </div>

                    </div>

                </div>


                {{-- REPORTS --}}

                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-4 shadow-sm"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-14 w-14 shrink-0 items-center
                                   justify-center rounded-xl
                                   bg-green-50 text-green-600"
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
                                    d="M6 3h9l3 3v15H6V3z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-width="1.8"
                                    d="M9 12h6M9 16h6M9 8h3"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Reports
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Financial transparency
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- SUMMARY CARDS --}}
        {{-- ========================================================= --}}

        <section class="mb-7">

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">


                {{-- TOTAL COLLECTIONS --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

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
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 3v18M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"
                                />
                            </svg>

                        </div>

                        <span class="text-xs font-medium text-slate-400">
                            All time
                        </span>

                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Total Collections
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#123B8F]">
                        ₱0.00
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Approved records only
                    </p>

                </div>


                {{-- MONTHLY DUES --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div
                            class="flex h-11 w-11 items-center justify-center
                                   rounded-xl bg-[#fff8e5] text-[#b08d20]"
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

                        <span class="text-xs font-medium text-slate-400">
                            Monthly
                        </span>

                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Monthly Dues
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#123B8F]">
                        ₱0.00
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Unit member collections
                    </p>

                </div>


                {{-- EXPENSES --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div
                            class="flex h-11 w-11 items-center justify-center
                                   rounded-xl bg-red-50 text-red-600"
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
                                    d="M12 3v18M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"
                                />
                            </svg>

                        </div>

                        <span class="text-xs font-medium text-slate-400">
                            Recorded
                        </span>

                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Total Expenses
                    </p>

                    <p class="mt-1 text-2xl font-bold text-red-600">
                        ₱0.00
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Approved expense records
                    </p>

                </div>


                {{-- PENDING --}}

                <div class="rounded-2xl border border-[#e7d49a] bg-[#fffaf0] p-5 shadow-sm">

                    <div class="flex items-center justify-between">

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

                        <span class="text-xs font-medium text-[#a07816]">
                            Action needed
                        </span>

                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Pending Requests
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#9a7712]">
                        0
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Payment requests awaiting review
                    </p>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- CONTENT --}}
        {{-- ========================================================= --}}

        <section class="grid gap-5 lg:grid-cols-3">


            {{-- PENDING REQUESTS --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

                <div class="border-b border-slate-200 px-6 py-5">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <h2 class="font-semibold text-[#0b2e6f]">
                                Payment Requests
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Requests submitted for payment approval.
                            </p>

                        </div>

                        <span
                            class="rounded-full bg-[#fff8e5]
                                   px-3 py-1 text-xs font-semibold
                                   text-[#b08d20]"
                        >
                            0 Pending
                        </span>

                    </div>

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
                                    d="M12 6v12M6 12h12"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-700">
                            No payment requests yet
                        </p>

                        <p class="mx-auto mt-1 max-w-md text-xs leading-5 text-slate-400">
                            Member payment requests will appear here after they submit
                            proof of their face-to-face payment.
                        </p>

                    </div>

                </div>

            </div>


            {{-- TRANSPARENCY --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="font-semibold text-[#0b2e6f]">
                        Transparency
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Finance records prepared for future modules.
                    </p>

                </div>

                <div class="divide-y divide-slate-100">

                    <div class="flex items-center justify-between px-6 py-4">

                        <span class="text-sm text-slate-500">
                            Monthly Dues
                        </span>

                        <span class="text-sm font-semibold text-[#123B8F]">
                            ₱0.00
                        </span>

                    </div>

                    <div class="flex items-center justify-between px-6 py-4">

                        <span class="text-sm text-slate-500">
                            Yearly Dues
                        </span>

                        <span class="text-sm font-semibold text-[#123B8F]">
                            ₱0.00
                        </span>

                    </div>

                    <div class="flex items-center justify-between px-6 py-4">

                        <span class="text-sm text-slate-500">
                            Income
                        </span>

                        <span class="text-sm font-semibold text-green-600">
                            ₱0.00
                        </span>

                    </div>

                    <div class="flex items-center justify-between px-6 py-4">

                        <span class="text-sm text-slate-500">
                            Expenses
                        </span>

                        <span class="text-sm font-semibold text-red-600">
                            ₱0.00
                        </span>

                    </div>

                    <div class="flex items-center justify-between px-6 py-4">

                        <span class="text-sm font-medium text-slate-700">
                            Balance
                        </span>

                        <span class="text-sm font-bold text-[#123B8F]">
                            ₱0.00
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <footer class="mt-8 pb-4 text-center">

            <p class="text-[11px] text-slate-400">
                CWL Diocese of Imus · Finance Transparency Module
            </p>

        </footer>

    </main>

</div>

</x-app-layout>