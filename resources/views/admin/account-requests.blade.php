@extends('layouts.admin')

@section('title', 'Account Requests')

@section('content')

<div class="space-y-6">

{{-- ================================================================
    FLASH MESSAGES
================================================================= --}}

@if (session('success'))

    <div
        class="flex items-start gap-3 rounded-xl
               border border-[#d6e6d9]
               bg-[#f4faf4]
               px-5 py-4"
    >

        <div
            class="flex h-8 w-8 shrink-0 items-center
                   justify-center rounded-full
                   bg-[#e4f1e6] text-sm
                   font-semibold text-[#173e32]"
        >
            ✓
        </div>

        <div>

            <p class="text-sm font-semibold text-[#173e32]">
                Request updated
            </p>

            <p class="mt-0.5 text-sm text-stone-600">
                {{ session('success') }}
            </p>

        </div>

    </div>

@endif


@if (session('error'))

    <div
        class="flex items-start gap-3 rounded-xl
               border border-red-200
               bg-red-50
               px-5 py-4"
    >

        <div
            class="flex h-8 w-8 shrink-0 items-center
                   justify-center rounded-full
                   bg-red-100 text-sm
                   font-semibold text-red-700"
        >
            !
        </div>

        <div>

            <p class="text-sm font-semibold text-red-800">
                Something went wrong
            </p>

            <p class="mt-0.5 text-sm text-red-700">
                {{ session('error') }}
            </p>

        </div>

    </div>

@endif


{{-- ================================================================
    PAGE HEADER
================================================================= --}}

<div
    class="flex flex-col gap-4
           sm:flex-row sm:items-end
           sm:justify-between"
>

    <div>

        <div class="flex items-center gap-2">

            <span
                class="h-1.5 w-1.5 rounded-full
                       bg-[#8d7130]"
            ></span>

            <p
                class="text-xs font-medium uppercase
                       tracking-[0.15em]
                       text-[#8d7130]"
            >
                Verification
            </p>

        </div>

        <h1
            class="mt-2 font-serif text-3xl
                   font-semibold tracking-tight
                   text-[#173e32]"
        >
            Account Requests
        </h1>

        <p
            class="mt-1 max-w-2xl text-sm
                   leading-6 text-stone-500"
        >
            Review membership requests and verify account information
            before granting access to the CWL organizational system.
        </p>

    </div>


    {{-- BACK BUTTON --}}

    <a
        href="{{ route('admin.dashboard') }}"
        class="inline-flex items-center justify-center
               gap-2 rounded-lg
               border border-stone-200
               bg-white px-4 py-2.5
               text-sm font-medium
               text-stone-600
               transition
               hover:border-[#cfd8d1]
               hover:bg-[#fafbf9]
               hover:text-[#173e32]"
    >
        <svg
            class="h-4 w-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.8"
                d="M15 19l-7-7 7-7"
            />
        </svg>

        Dashboard
    </a>

</div>


{{-- ================================================================
    SUMMARY CARD
================================================================= --}}

<div
    class="rounded-xl border
           border-[#dbe5dc]
           bg-white shadow-sm"
>

    <div
        class="flex items-center
               justify-between gap-4
               px-5 py-4"
    >

        <div class="flex items-center gap-3">

            <div
                class="flex h-10 w-10 items-center
                       justify-center rounded-lg
                       bg-[#f5f1e7]"
            >

                <svg
                    class="h-5 w-5 text-[#8d7130]"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.7"
                        d="M18 8a6 6 0 01-12 0"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.7"
                        d="M12 14v6"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.7"
                        d="M8 20h8"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.7"
                        d="M9 3h6"
                    />
                </svg>

            </div>

            <div>

                <p class="text-xs text-stone-500">
                    Pending Requests
                </p>

                <p
                    class="mt-0.5 text-2xl
                           font-semibold
                           text-[#173e32]"
                >
                    {{ $requests->count() }}
                </p>

            </div>

        </div>


        @if ($requests->count() > 0)

            <span
                class="rounded-full
                       bg-[#f5f1e7]
                       px-3 py-1
                       text-xs font-medium
                       text-[#8d7130]"
            >
                Needs review
            </span>

        @else

            <span
                class="rounded-full
                       bg-[#edf6ef]
                       px-3 py-1
                       text-xs font-medium
                       text-[#3f7650]"
            >
                All clear
            </span>

        @endif

    </div>

</div>


{{-- ================================================================
    REQUEST LIST
================================================================= --}}

@if ($requests->isEmpty())

    {{-- EMPTY STATE --}}

    <section
        class="overflow-hidden rounded-xl
               border border-stone-200
               bg-white shadow-sm"
    >

        <div
            class="flex min-h-[320px]
                   flex-col items-center
                   justify-center
                   px-6 py-12
                   text-center"
        >

            <div
                class="flex h-16 w-16
                       items-center justify-center
                       rounded-full
                       bg-[#edf6ef]"
            >

                <svg
                    class="h-7 w-7 text-[#3f7650]"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

            </div>


            <h2
                class="mt-5 text-base
                       font-semibold
                       text-[#173e32]"
            >
                No pending requests
            </h2>


            <p
                class="mt-1 max-w-md
                       text-sm leading-6
                       text-stone-500"
            >
                All membership requests have been reviewed.
                New registration requests will appear here.
            </p>

        </div>

    </section>

@else

    <section
        class="overflow-hidden rounded-xl
               border border-stone-200
               bg-white shadow-sm"
    >

        {{-- SECTION HEADER --}}

        <div
            class="border-b border-stone-200
                   bg-[#fcfcfa]
                   px-5 py-4"
        >

            <div>

                <h2
                    class="text-sm font-semibold
                           text-[#173e32]"
                >
                    Pending Membership Requests
                </h2>

                <p
                    class="mt-1 text-xs
                           text-stone-500"
                >
                    Review the applicant's organizational information
                    before approving or rejecting the request.
                </p>

            </div>

        </div>


        {{-- REQUESTS --}}

        <div class="divide-y divide-stone-100">

            @foreach ($requests as $request)

                <article
                    class="p-5 transition
                           hover:bg-[#fdfdfb]"
                >

                    <div
                        class="flex flex-col
                               gap-5
                               lg:flex-row
                               lg:items-center
                               lg:justify-between"
                    >

                        {{-- =================================================
                            APPLICANT INFORMATION
                        ================================================== --}}

                        <div
                            class="flex min-w-0
                                   items-start gap-4"
                        >

                            {{-- AVATAR --}}

                            <div
                                class="flex h-12 w-12
                                       shrink-0
                                       items-center
                                       justify-center
                                       rounded-full
                                       bg-[#173e32]
                                       text-sm
                                       font-semibold
                                       text-white"
                            >
                                {{ strtoupper(substr($request->name, 0, 1)) }}
                            </div>


                            {{-- DETAILS --}}

                            <div class="min-w-0">

                                <div
                                    class="flex flex-wrap
                                           items-center gap-2"
                                >

                                    <h3
                                        class="text-base
                                               font-semibold
                                               text-[#173e32]"
                                    >
                                        {{ $request->name }}
                                    </h3>

                                    <span
                                        class="rounded-full
                                               bg-[#f5f1e7]
                                               px-2.5 py-1
                                               text-[11px]
                                               font-medium
                                               text-[#8d7130]"
                                    >
                                        Pending
                                    </span>

                                </div>


                                <p
                                    class="mt-1 break-all
                                           text-sm
                                           text-stone-500"
                                >
                                    {{ $request->email }}
                                </p>


                                {{-- ORGANIZATION DETAILS --}}

                                <div
                                    class="mt-4 flex
                                           flex-wrap gap-2"
                                >

                                    @if ($request->organization_level)

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   rounded-lg
                                                   border
                                                   border-stone-200
                                                   bg-stone-50
                                                   px-3 py-1.5
                                                   text-xs
                                                   font-medium
                                                   capitalize
                                                   text-stone-600"
                                        >
                                            {{ str_replace('_', ' ', $request->organization_level) }}
                                        </span>

                                    @endif


                                    @if ($request->position)

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   rounded-lg
                                                   border
                                                   border-stone-200
                                                   bg-stone-50
                                                   px-3 py-1.5
                                                   text-xs
                                                   font-medium
                                                   capitalize
                                                   text-stone-600"
                                        >
                                            {{ str_replace('_', ' ', $request->position) }}
                                        </span>

                                    @endif


                                    @if ($request->vicariate)

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   rounded-lg
                                                   border
                                                   border-stone-200
                                                   bg-stone-50
                                                   px-3 py-1.5
                                                   text-xs
                                                   font-medium
                                                   text-stone-600"
                                        >
                                            {{ $request->vicariate }}
                                        </span>

                                    @endif


                                    @if ($request->unit)

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   rounded-lg
                                                   border
                                                   border-stone-200
                                                   bg-stone-50
                                                   px-3 py-1.5
                                                   text-xs
                                                   font-medium
                                                   text-stone-600"
                                        >
                                            {{ $request->unit }}
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            ACTIONS
                        ================================================== --}}

                        <div
                            class="flex shrink-0
                                   flex-col gap-2
                                   sm:flex-row
                                   lg:flex-col
                                   xl:flex-row"
                        >

                            {{-- APPROVE --}}

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.account-requests.approve',
                                    $request
                                ) }}"
                                onsubmit="return confirm(
                                    'Approve this account request?'
                                )"
                            >

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="inline-flex
                                           w-full
                                           items-center
                                           justify-center
                                           gap-2
                                           rounded-lg
                                           border
                                           border-[#bcd8c2]
                                           bg-[#edf6ef]
                                           px-4 py-2.5
                                           text-sm
                                           font-medium
                                           text-[#356746]
                                           transition
                                           hover:border-[#a8cbaa]
                                           hover:bg-[#e2f1e5]
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-[#8d7130]
                                           focus:ring-offset-2"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>

                                    Approve

                                </button>

                            </form>


                            {{-- REJECT --}}

                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.account-requests.reject',
                                    $request
                                ) }}"
                                onsubmit="return confirm(
                                    'Reject this account request? This will remove the pending request.'
                                )"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex
                                           w-full
                                           items-center
                                           justify-center
                                           gap-2
                                           rounded-lg
                                           border
                                           border-red-200
                                           bg-white
                                           px-4 py-2.5
                                           text-sm
                                           font-medium
                                           text-red-600
                                           transition
                                           hover:border-red-300
                                           hover:bg-red-50
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-red-200
                                           focus:ring-offset-2"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M6 6l12 12M18 6L6 18"
                                        />
                                    </svg>

                                    Reject

                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </section>

@endif


</div>

@endsection
