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
                        Finance · Unit Treasurer
                    </p>

                    <h1 class="mt-1 font-serif text-3xl font-semibold text-[#0b2e6f]">
                        Treasurer Dashboard
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Manage member dues and payment approval records for your unit.
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

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">


                {{-- OVERVIEW --}}

                <a
                    href="{{ url('/treasurer/finance') }}"
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
                                Unit finance
                            </p>

                        </div>

                    </div>

                </a>


                {{-- MEMBER DUES --}}

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
                                Member Dues
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Monthly collections
                            </p>

                        </div>

                    </div>

                </div>


                {{-- PAYMENT REQUESTS --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

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
                                    d="M12 3a9 9 0 100 18 9 9 0 000-18z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 7v5l3 2"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-700">
                                Requests
                            </p>

                            <p class="mt-0.5 text-xs text-slate-400">
                                Approval queue
                            </p>

                        </div>

                    </div>

                </div>


                {{-- REPORTS --}}

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

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
                                Unit transparency
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- SUMMARY --}}
        {{-- ========================================================= --}}

        <section class="mb-7">

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">


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
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z"
                            />
                        </svg>
                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Unit Members
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#123B8F]">
                        0
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Members in your unit
                    </p>

                </div>


                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

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
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 3v18M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"
                            />
                        </svg>
                    </div>

                    <p class="mt-5 text-xs font-medium text-slate-500">
                        Monthly Collection
                    </p>

                    <p class="mt-1 text-2xl font-bold text-[#123B8F]">
                        ₱0.00
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Approved payments
                    </p>

                </div>


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
                        Need approval
                    </p>

                </div>


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
                        Recorded this period
                    </p>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- PAYMENT APPROVAL --}}
        {{-- ========================================================= --}}

        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <h2 class="font-semibold text-[#0b2e6f]">
                            Payment Approval Queue
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Review payments received face-to-face before adding them
                            to the official financial record.
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
                           px-6 py-12 text-center"
                >

                    <div
                        class="mx-auto flex h-12 w-12 items-center
                               justify-center rounded-xl
                               bg-[#fff8e5] text-[#b08d20]"
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
                                d="M12 3a9 9 0 100 18 9 9 0 000-18z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M8 12h8M12 8v8"
                            />
                        </svg>

                    </div>

                    <p class="mt-4 text-sm font-semibold text-slate-700">
                        No pending payment requests
                    </p>

                    <p class="mx-auto mt-1 max-w-lg text-xs leading-5 text-slate-400">
                        When members report that they have paid their monthly dues,
                        their requests will appear here for your review.
                    </p>

                </div>

            </div>

        </section>


        <footer class="mt-8 pb-4 text-center">

            <p class="text-[11px] text-slate-400">
                CWL Diocese of Imus · Unit Treasurer Finance
            </p>

        </footer>

    </main>

</div>

</x-app-layout>