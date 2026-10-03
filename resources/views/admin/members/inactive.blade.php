@extends('layouts.admin')

@section('title', 'Inactive Members')

@section('content')

<div class="space-y-6">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div
            class="flex items-start gap-3 rounded-xl
                   border border-green-200
                   bg-green-50 px-4 py-3
                   text-sm text-green-700"
        >
            <div
                class="mt-0.5 flex h-5 w-5 shrink-0
                       items-center justify-center
                       rounded-full bg-green-600
                       text-xs font-bold text-white"
            >
                ✓
            </div>

            <p>{{ session('success') }}</p>
        </div>
    @endif


    {{-- PAGE HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>

            <p
                class="text-xs font-semibold uppercase
                       tracking-[0.16em] text-[#8d7130]"
            >
                Organization
            </p>

            <h1
                class="mt-1 font-serif text-3xl
                       font-semibold tracking-tight
                       text-[#173e32]"
            >
                Inactive Members
            </h1>

            <p class="mt-1 text-sm text-stone-500">
                Manage members who are no longer active in the organization.
            </p>

        </div>


        {{-- INACTIVE COUNT --}}
        <div
            class="w-fit rounded-xl
                   border border-stone-200
                   bg-stone-50
                   px-5 py-3"
        >

            <p class="text-xs font-medium text-stone-500">
                Inactive Members
            </p>

            <p
                class="mt-0.5 text-2xl font-semibold
                       text-[#173e32]"
            >
                {{ $members->count() }}
            </p>

        </div>

    </div>


    {{-- NAVIGATION --}}
    <div class="flex justify-end">

        <a
            href="{{ route('admin.members.index') }}"
            class="inline-flex items-center gap-2
                   rounded-lg
                   border border-[#d7e4d8]
                   bg-[#f6faf6]
                   px-4 py-2.5
                   text-sm font-semibold
                   text-[#173e32]
                   shadow-sm transition
                   hover:bg-[#edf6ee]"
        >

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 16l-4-4m0 0l4-4m-4 4h18"
                />
            </svg>

            Active Members

        </a>

    </div>


    {{-- MEMBERS CARD --}}
    <section
        class="overflow-hidden rounded-2xl
               border border-stone-200
               bg-white shadow-sm"
    >

        {{-- CARD HEADER --}}
        <div
            class="border-b border-stone-200
                   px-5 py-4"
        >

            <div class="flex items-start gap-3">

                <div
                    class="flex h-9 w-9 shrink-0
                           items-center justify-center
                           rounded-full
                           bg-stone-100
                           text-stone-500"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4.5 w-4.5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19a4 4 0 00-8 0m4-8a3 3 0 100-6 3 3 0 000 6zm9 8a4 4 0 00-3-3.87M17 5.13a3 3 0 010 5.74"
                        />
                    </svg>

                </div>


                <div>

                    <h2
                        class="text-sm font-semibold
                               text-[#173e32]"
                    >
                        Inactive Members
                    </h2>

                    <p class="mt-1 text-xs leading-5 text-stone-500">
                        Inactive accounts are preserved for organizational
                        history and can be restored when necessary.
                    </p>

                </div>

            </div>

        </div>


        @if($members->count() > 0)

            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px] text-left text-sm">

                    <thead
                        class="bg-[#fafbf9]
                               text-xs text-stone-500"
                    >

                        <tr>

                            <th class="px-5 py-3 font-semibold">
                                Member
                            </th>

                            <th class="px-5 py-3 font-semibold">
                                Email
                            </th>

                            <th class="px-5 py-3 font-semibold">
                                Position
                            </th>

                            <th class="px-5 py-3 font-semibold">
                                Unit
                            </th>

                            <th class="px-5 py-3 font-semibold">
                                Status
                            </th>

                            <th class="px-5 py-3 text-right font-semibold">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($members as $member)

                            <tr
                                class="border-t border-stone-100
                                       transition hover:bg-[#fafcf9]"
                            >

                                {{-- MEMBER --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                                   items-center justify-center
                                                   rounded-full
                                                   bg-stone-400
                                                   text-sm font-semibold
                                                   text-white"
                                        >
                                            {{ strtoupper(substr($member->name, 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">

                                            <p
                                                class="truncate font-medium
                                                       text-[#173e32]"
                                            >
                                                {{ $member->name }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-stone-400">
                                                {{ ucfirst($member->member_type ?? 'Member') }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td class="px-5 py-4 text-stone-600">
                                    {{ $member->email ?? '—' }}
                                </td>


                                {{-- POSITION --}}
                                <td class="px-5 py-4 text-stone-600">

                                    {{ $member->position
                                        ? ucwords(str_replace('_', ' ', $member->position))
                                        : '—'
                                    }}

                                </td>


                                {{-- UNIT --}}
                                <td class="px-5 py-4 text-stone-600">
                                    {{ $member->cwlUnit?->name ?? '—' }}
                                </td>


                                {{-- STATUS --}}
                                <td class="px-5 py-4">

                                    <span
                                        class="inline-flex items-center gap-1.5
                                               rounded-full
                                               bg-stone-100
                                               px-2.5 py-1
                                               text-xs font-semibold
                                               text-stone-600"
                                    >

                                        <span
                                            class="h-1.5 w-1.5
                                                   rounded-full
                                                   bg-stone-400"
                                        ></span>

                                        Inactive

                                    </span>

                                </td>


                                {{-- ACTIONS --}}
                                <td class="px-5 py-4">

                                    <div class="flex justify-end gap-2">

                                        {{-- REACTIVATE --}}
                                        <button
                                            type="button"
                                            onclick="openReactivateModal(
                                                '{{ $member->id }}',
                                                '{{ addslashes($member->name) }}'
                                            )"
                                            class="inline-flex items-center gap-2
                                                   rounded-lg
                                                   border border-[#cfe1d3]
                                                   bg-[#f4faf4]
                                                   px-3 py-2
                                                   text-xs font-semibold
                                                   text-[#35634f]
                                                   transition
                                                   hover:border-[#b8d2be]
                                                   hover:bg-[#eaf5ec]"
                                        >

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M3 12a9 9 0 0115.36-6.36L21 8m0 0V3m0 5h-5M21 12a9 9 0 01-15.36 6.36L3 16m0 0v5m0-5h5"
                                                />
                                            </svg>

                                            Reactivate

                                        </button>


                                        {{-- DELETE PERMANENTLY --}}
                                        <button
                                            type="button"
                                            onclick="openDeleteModal(
                                                '{{ $member->id }}',
                                                '{{ addslashes($member->name) }}'
                                            )"
                                            class="inline-flex items-center gap-2
                                                   rounded-lg
                                                   border border-red-200
                                                   bg-red-50
                                                   px-3 py-2
                                                   text-xs font-semibold
                                                   text-red-600
                                                   transition
                                                   hover:border-red-300
                                                   hover:bg-red-100"
                                        >

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 7h12m-9 4v6m6-6v6M9 7V4h6v3m3 0l-.8 13H6.8L6 7"
                                                />
                                            </svg>

                                            Delete Permanently

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- EMPTY STATE --}}
            <div
                class="flex min-h-[300px]
                       flex-col items-center
                       justify-center px-6 py-12
                       text-center"
            >

                <div
                    class="flex h-14 w-14
                           items-center justify-center
                           rounded-full
                           bg-[#f0f4ef]
                           text-[#35634f]"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                </div>

                <h3
                    class="mt-4 text-sm font-semibold
                           text-[#173e32]"
                >
                    No inactive members
                </h3>

                <p
                    class="mt-1 max-w-sm
                           text-xs leading-5
                           text-stone-500"
                >
                    All approved members are currently active.
                </p>

            </div>

        @endif

    </section>

</div>


{{-- ========================================================= --}}
{{-- REACTIVATE MODAL --}}
{{-- ========================================================= --}}

<div
    id="reactivateModal"
    class="fixed inset-0 z-50 hidden"
    aria-hidden="true"
>

    {{-- BACKDROP --}}
    <div
        class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"
        onclick="closeReactivateModal()"
    ></div>


    {{-- MODAL --}}
    <div
        class="relative flex min-h-full
               items-center justify-center
               px-4 py-8"
    >

        <div
            class="w-full max-w-md
                   overflow-hidden rounded-2xl
                   border border-stone-200
                   bg-white shadow-2xl"
        >

            <div class="h-1 bg-[#b99a52]"></div>

            <div class="p-6">

                {{-- ICON --}}
                <div
                    class="flex h-12 w-12
                           items-center justify-center
                           rounded-full
                           bg-[#edf7ef]
                           text-[#35634f]"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12a7 7 0 0111.9-4.9L20 10m0 0V5m0 5h-5M19 12a7 7 0 01-11.9 4.9L4 14m0 0v5m0-5h5"
                        />
                    </svg>

                </div>


                <h3
                    class="mt-4 font-serif text-xl
                           font-semibold text-[#173e32]"
                >
                    Reactivate member?
                </h3>


                <p
                    class="mt-2 text-sm leading-6
                           text-stone-500"
                >
                    <span
                        id="reactivateMemberName"
                        class="font-semibold text-[#173e32]"
                    ></span>
                    will be returned to the active member list and their
                    account will regain its active status.
                </p>


                {{-- ACTIONS --}}
                <div
                    class="mt-6 flex flex-col-reverse
                           gap-2 sm:flex-row sm:justify-end"
                >

                    <button
                        type="button"
                        onclick="closeReactivateModal()"
                        class="rounded-lg border
                               border-stone-200
                               bg-white px-4 py-2.5
                               text-sm font-medium
                               text-stone-600
                               transition
                               hover:bg-stone-50"
                    >
                        Cancel
                    </button>


                    <form
                        id="reactivateForm"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="w-full rounded-lg
                                   bg-[#35634f]
                                   px-4 py-2.5
                                   text-sm font-semibold
                                   text-white
                                   transition
                                   hover:bg-[#294f3e]
                                   sm:w-auto"
                        >
                            Reactivate Member
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- DELETE MODAL --}}
{{-- ========================================================= --}}

<div
    id="deleteModal"
    class="fixed inset-0 z-50 hidden"
    aria-hidden="true"
>

    {{-- BACKDROP --}}
    <div
        class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"
        onclick="closeDeleteModal()"
    ></div>


    {{-- MODAL --}}
    <div
        class="relative flex min-h-full
               items-center justify-center
               px-4 py-8"
    >

        <div
            class="w-full max-w-md
                   overflow-hidden rounded-2xl
                   border border-red-200
                   bg-white shadow-2xl"
        >

            <div class="h-1 bg-red-600"></div>


            <div class="p-6">

                {{-- ICON --}}
                <div
                    class="flex h-12 w-12
                           items-center justify-center
                           rounded-full
                           bg-red-50 text-red-600"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 7h12m-9 4v6m6-6v6M9 7V4h6v3m3 0l-.8 13H6.8L6 7"
                        />
                    </svg>

                </div>


                <h3
                    class="mt-4 font-serif text-xl
                           font-semibold text-[#173e32]"
                >
                    Delete member permanently?
                </h3>


                <p
                    class="mt-2 text-sm leading-6
                           text-stone-500"
                >
                    You are about to permanently delete
                    <span
                        id="deleteMemberName"
                        class="font-semibold text-[#173e32]"
                    ></span>.
                </p>


                {{-- WARNING --}}
                <div
                    class="mt-4 rounded-xl
                           border border-red-200
                           bg-red-50 px-4 py-3"
                >

                    <div class="flex gap-3">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 h-5 w-5 shrink-0
                                   text-red-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v3.5m0 3h.01M10.3 4.6L2.9 17.4A2 2 0 004.6 20h14.8a2 2 0 001.7-2.6L13.7 4.6a2 2 0 00-3.4 0z"
                            />
                        </svg>


                        <p
                            class="text-xs leading-5
                                   text-red-700"
                        >
                            <strong>This action cannot be undone.</strong>
                            The member's account and stored account information
                            will be permanently removed from the system.
                        </p>

                    </div>

                </div>


                {{-- ACTIONS --}}
                <div
                    class="mt-6 flex flex-col-reverse
                           gap-2 sm:flex-row sm:justify-end"
                >

                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="rounded-lg border
                               border-stone-200
                               bg-white px-4 py-2.5
                               text-sm font-medium
                               text-stone-600
                               transition
                               hover:bg-stone-50"
                    >
                        Cancel
                    </button>


                    <form
                        id="deleteForm"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full rounded-lg
                                   bg-red-600 px-4 py-2.5
                                   text-sm font-semibold
                                   text-white
                                   transition
                                   hover:bg-red-700
                                   sm:w-auto"
                        >
                            Delete Permanently
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | REACTIVATE MODAL
    |--------------------------------------------------------------------------
    */

    function openReactivateModal(id, name) {

        const modal = document.getElementById('reactivateModal');
        const form = document.getElementById('reactivateForm');
        const memberName = document.getElementById('reactivateMemberName');

        memberName.textContent = name;

        form.action =
            "{{ url('/admin/members') }}/" + id + "/reactivate";

        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');

        document.body.classList.add('overflow-hidden');
    }


    function closeReactivateModal() {

        const modal = document.getElementById('reactivateModal');

        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');

        document.body.classList.remove('overflow-hidden');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE MODAL
    |--------------------------------------------------------------------------
    */

    function openDeleteModal(id, name) {

        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const memberName = document.getElementById('deleteMemberName');

        memberName.textContent = name;

        form.action =
            "{{ url('/admin/members') }}/" + id;

        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');

        document.body.classList.add('overflow-hidden');
    }


    function closeDeleteModal() {

        const modal = document.getElementById('deleteModal');

        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');

        document.body.classList.remove('overflow-hidden');
    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE KEY
    |--------------------------------------------------------------------------
    */

    document.addEventListener('keydown', function (event) {

        if (event.key !== 'Escape') {
            return;
        }

        closeReactivateModal();
        closeDeleteModal();

    });

</script>

@endsection