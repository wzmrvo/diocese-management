@extends('layouts.admin')

@section('title', 'Members')

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
                Members
            </h1>

            <p class="mt-1 text-sm text-stone-500">
                View and manage active CWL member accounts.
            </p>

        </div>


        {{-- ACTIVE MEMBER COUNT --}}
        <div
            class="w-fit rounded-xl
                   border border-[#d7e4d8]
                   bg-[#f6faf6]
                   px-5 py-3"
        >
            <p class="text-xs font-medium text-stone-500">
                Active Members
            </p>

            <p
                id="activeMemberCount"
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
            href="{{ route('admin.members.inactive') }}"
            class="inline-flex items-center gap-2
                   rounded-lg border border-stone-200
                   bg-white px-4 py-2.5
                   text-sm font-medium text-stone-600
                   shadow-sm transition
                   hover:border-[#cfd8cf]
                   hover:bg-[#f8faf7]
                   hover:text-[#173e32]"
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
                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                />
            </svg>

            Inactive Members
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

            <div>

                <h2
                    class="text-sm font-semibold
                           text-[#173e32]"
                >
                    Active Members
                </h2>

                <p class="mt-1 text-xs text-stone-500">
                    Approved members who currently have access to the organization.
                </p>

            </div>


            {{-- SEARCH BAR --}}
            @if($members->count() > 0)

                <div class="mt-4">

                    <div class="relative max-w-xl">

                        {{-- SEARCH ICON --}}
                        <div
                            class="pointer-events-none absolute
                                   inset-y-0 left-0 flex
                                   items-center pl-3.5"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4.5 w-4.5 text-stone-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                                />
                            </svg>
                        </div>


                        {{-- INPUT --}}
                        <input
                            id="memberSearch"
                            type="search"
                            autocomplete="off"
                            placeholder="Search by name, email, position, or unit..."
                            class="w-full rounded-xl
                                   border border-stone-200
                                   bg-[#fafbf9]
                                   py-3 pl-10 pr-10
                                   text-sm text-[#173e32]
                                   outline-none
                                   placeholder:text-stone-400
                                   transition
                                   focus:border-[#8d7130]
                                   focus:bg-white
                                   focus:ring-2
                                   focus:ring-[#8d7130]/10"
                        />


                        {{-- CLEAR BUTTON --}}
                        <button
                            id="clearMemberSearch"
                            type="button"
                            class="absolute inset-y-0 right-0
                                   hidden items-center pr-3
                                   text-stone-400
                                   transition hover:text-[#173e32]"
                            aria-label="Clear search"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 6l12 12M18 6L6 18"
                                />
                            </svg>
                        </button>

                    </div>


                    {{-- SEARCH STATUS --}}
                    <div
                        id="searchStatus"
                        class="mt-2 hidden text-xs text-stone-500"
                    ></div>

                </div>

            @endif

        </div>


        @if($members->count() > 0)

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[850px] text-left text-sm">

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


                    <tbody id="membersTableBody">

                        @foreach($members as $member)

                            @php

                                $memberName = $member->name ?? '';

                                $memberEmail = $member->email ?? '';

                                $memberPosition = $member->position
                                    ? ucwords(str_replace('_', ' ', $member->position))
                                    : '';

                                $memberUnit = $member->cwlUnit?->name ?? '';

                                $searchText = strtolower(
                                    $memberName . ' ' .
                                    $memberEmail . ' ' .
                                    $memberPosition . ' ' .
                                    $memberUnit
                                );

                            @endphp


                            <tr
                                class="member-row border-t border-stone-100
                                       transition hover:bg-[#fafcf9]"
                                data-name="{{ strtolower($memberName) }}"
                                data-email="{{ strtolower($memberEmail) }}"
                                data-position="{{ strtolower($memberPosition) }}"
                                data-unit="{{ strtolower($memberUnit) }}"
                                data-search="{{ $searchText }}"
                            >

                                {{-- MEMBER --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                                   items-center justify-center
                                                   rounded-full
                                                   bg-[#173e32]
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
                                    {{ $memberPosition ?: '—' }}
                                </td>


                                {{-- UNIT --}}
                                <td class="px-5 py-4 text-stone-600">
                                    {{ $memberUnit ?: '—' }}
                                </td>


                                {{-- STATUS --}}
                                <td class="px-5 py-4">

                                    <span
                                        class="inline-flex items-center gap-1.5
                                               rounded-full
                                               bg-green-50
                                               px-2.5 py-1
                                               text-xs font-semibold
                                               text-green-700"
                                    >
                                        <span
                                            class="h-1.5 w-1.5
                                                   rounded-full
                                                   bg-green-600"
                                        ></span>

                                        Active
                                    </span>

                                </td>


                                {{-- ACTION --}}
                                <td class="px-5 py-4">

                                    <div class="flex justify-end">

                                        <button
                                            type="button"
                                            onclick="openDeactivateModal(
                                                '{{ $member->id }}',
                                                @js($member->name)
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
                                                    d="M18 12H6"
                                                />
                                            </svg>

                                            Deactivate

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- NO SEARCH RESULTS --}}
            <div
                id="noSearchResults"
                class="hidden min-h-[260px]
                       flex-col items-center
                       justify-center px-6 py-12
                       text-center"
            >

                <div
                    class="flex h-14 w-14
                           items-center justify-center
                           rounded-full
                           bg-[#f0f4ef]
                           text-[#173e32]"
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
                            d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                        />
                    </svg>

                </div>

                <h3
                    class="mt-4 text-sm font-semibold
                           text-[#173e32]"
                >
                    No matching member
                </h3>

                <p
                    id="noSearchResultsText"
                    class="mt-1 max-w-sm
                           text-xs leading-5
                           text-stone-500"
                >
                    Try searching using a member's name, email, position, or unit.
                </p>

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
                           text-[#173e32]"
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
                            d="M15 19a4 4 0 00-8 0m4-8a3 3 0 100-6 3 3 0 000 6zm9 8a4 4 0 00-3-3.87M17 5.13a3 3 0 010 5.74"
                        />
                    </svg>

                </div>

                <h3
                    class="mt-4 text-sm font-semibold
                           text-[#173e32]"
                >
                    No active members
                </h3>

                <p
                    class="mt-1 max-w-sm
                           text-xs leading-5
                           text-stone-500"
                >
                    Approved active member accounts will appear here.
                </p>

            </div>

        @endif

    </section>

</div>


{{-- ========================================================= --}}
{{-- DEACTIVATE MODAL --}}
{{-- ========================================================= --}}

<div
    id="deactivateModal"
    class="fixed inset-0 z-50 hidden"
    aria-hidden="true"
>

    {{-- BACKDROP --}}
    <div
        class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"
        onclick="closeDeactivateModal()"
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

            {{-- GOLD TOP LINE --}}
            <div class="h-1 bg-[#b99a52]"></div>


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
                            d="M18 12H6"
                        />
                    </svg>

                </div>


                <h3
                    class="mt-4 font-serif text-xl
                           font-semibold text-[#173e32]"
                >
                    Deactivate member?
                </h3>


                <p
                    class="mt-2 text-sm leading-6
                           text-stone-500"
                >
                    You are about to deactivate
                    <span
                        id="deactivateMemberName"
                        class="font-semibold text-[#173e32]"
                    ></span>.
                    Their account will be preserved, but they will no longer
                    be considered an active member.
                </p>


                {{-- ACTIONS --}}
                <div
                    class="mt-6 flex flex-col-reverse
                           gap-2 sm:flex-row sm:justify-end"
                >

                    <button
                        type="button"
                        onclick="closeDeactivateModal()"
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
                        id="deactivateForm"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

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
                            Deactivate Member
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
    | PRECISE MEMBER SEARCH
    |--------------------------------------------------------------------------
    */

    const memberSearch = document.getElementById('memberSearch');
    const clearMemberSearch = document.getElementById('clearMemberSearch');
    const searchStatus = document.getElementById('searchStatus');
    const noSearchResults = document.getElementById('noSearchResults');
    const noSearchResultsText = document.getElementById('noSearchResultsText');
    const activeMemberCount = document.getElementById('activeMemberCount');

    const memberRows = Array.from(
        document.querySelectorAll('.member-row')
    );


    function normalize(value) {

        return value
            .toLowerCase()
            .trim()
            .replace(/\s+/g, ' ');

    }


    function searchMembers() {

        if (!memberSearch) {
            return;
        }


        const query = normalize(memberSearch.value);


        /*
        |--------------------------------------------------------------------------
        | EMPTY SEARCH
        |--------------------------------------------------------------------------
        */

        if (query === '') {

            memberRows.forEach(row => {
                row.classList.remove('hidden');
            });

            if (clearMemberSearch) {
                clearMemberSearch.classList.add('hidden');
                clearMemberSearch.classList.remove('flex');
            }

            if (searchStatus) {
                searchStatus.classList.add('hidden');
                searchStatus.textContent = '';
            }

            if (noSearchResults) {
                noSearchResults.classList.add('hidden');
                noSearchResults.classList.remove('flex');
            }

            if (activeMemberCount) {
                activeMemberCount.textContent = memberRows.length;
            }

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | SHOW CLEAR BUTTON
        |--------------------------------------------------------------------------
        */

        if (clearMemberSearch) {
            clearMemberSearch.classList.remove('hidden');
            clearMemberSearch.classList.add('flex');
        }


        /*
        |--------------------------------------------------------------------------
        | MEMBER DATA
        |--------------------------------------------------------------------------
        */

        const members = memberRows.map(row => {

            return {
                row: row,
                name: normalize(row.dataset.name || ''),
                email: normalize(row.dataset.email || ''),
                position: normalize(row.dataset.position || ''),
                unit: normalize(row.dataset.unit || ''),
            };

        });


        /*
        |--------------------------------------------------------------------------
        | EXACT MATCH FIRST
        |--------------------------------------------------------------------------
        |
        | If the search exactly matches a member's name, email, position,
        | or unit, ONLY the exact matching account is displayed.
        |
        */

        const exactMatches = members.filter(member => {

            return (
                member.name === query ||
                member.email === query ||
                member.position === query ||
                member.unit === query
            );

        });


        let matchedMembers = [];


        if (exactMatches.length > 0) {

            matchedMembers = exactMatches;

        } else {

            /*
            |--------------------------------------------------------------------------
            | PARTIAL MATCH
            |--------------------------------------------------------------------------
            |
            | No exact result was found.
            |
            | Priority:
            |
            | 1. Name starts with query
            | 2. Email starts with query
            | 3. Position starts with query
            | 4. Unit starts with query
            | 5. General contains match
            |
            */

            const startsWithMatches = members.filter(member => {

                return (
                    member.name.startsWith(query) ||
                    member.email.startsWith(query) ||
                    member.position.startsWith(query) ||
                    member.unit.startsWith(query)
                );

            });


            if (startsWithMatches.length > 0) {

                matchedMembers = startsWithMatches;

            } else {

                matchedMembers = members.filter(member => {

                    return (
                        member.name.includes(query) ||
                        member.email.includes(query) ||
                        member.position.includes(query) ||
                        member.unit.includes(query)
                    );

                });

            }

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE TABLE
        |--------------------------------------------------------------------------
        */

        memberRows.forEach(row => {

            row.classList.add('hidden');

        });


        matchedMembers.forEach(member => {

            member.row.classList.remove('hidden');

        });


        /*
        |--------------------------------------------------------------------------
        | UPDATE COUNT
        |--------------------------------------------------------------------------
        */

        if (activeMemberCount) {

            activeMemberCount.textContent = matchedMembers.length;

        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH STATUS
        |--------------------------------------------------------------------------
        */

        if (searchStatus) {

            searchStatus.classList.remove('hidden');

            if (matchedMembers.length === 0) {

                searchStatus.textContent =
                    `No members found for "${memberSearch.value.trim()}".`;

            } else if (exactMatches.length > 0) {

                searchStatus.textContent =
                    `Exact match found — showing ${matchedMembers.length} member${matchedMembers.length === 1 ? '' : 's'}.`;

            } else {

                searchStatus.textContent =
                    `Showing ${matchedMembers.length} matching member${matchedMembers.length === 1 ? '' : 's'}.`;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | NO RESULTS STATE
        |--------------------------------------------------------------------------
        */

        if (matchedMembers.length === 0) {

            if (noSearchResults) {

                noSearchResults.classList.remove('hidden');
                noSearchResults.classList.add('flex');

            }

            if (noSearchResultsText) {

                noSearchResultsText.textContent =
                    `No active member matches "${memberSearch.value.trim()}". Try the member's full name, email, position, or unit.`;

            }

        } else {

            if (noSearchResults) {

                noSearchResults.classList.add('hidden');
                noSearchResults.classList.remove('flex');

            }

        }

    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH EVENTS
    |--------------------------------------------------------------------------
    */

    if (memberSearch) {

        memberSearch.addEventListener('input', searchMembers);

        memberSearch.addEventListener('search', searchMembers);

    }


    /*
    |--------------------------------------------------------------------------
    | CLEAR SEARCH
    |--------------------------------------------------------------------------
    */

    if (clearMemberSearch) {

        clearMemberSearch.addEventListener('click', function () {

            memberSearch.value = '';

            memberSearch.focus();

            searchMembers();

        });

    }


    /*
    |--------------------------------------------------------------------------
    | DEACTIVATE MODAL
    |--------------------------------------------------------------------------
    */

    function openDeactivateModal(id, name) {

        const modal = document.getElementById('deactivateModal');

        const form = document.getElementById('deactivateForm');

        const memberName =
            document.getElementById('deactivateMemberName');


        memberName.textContent = name;


        form.action =
            "{{ url('/admin/members') }}/" +
            id +
            "/deactivate";


        modal.classList.remove('hidden');

        modal.setAttribute(
            'aria-hidden',
            'false'
        );


        document.body.classList.add('overflow-hidden');

    }


    function closeDeactivateModal() {

        const modal =
            document.getElementById('deactivateModal');


        modal.classList.add('hidden');

        modal.setAttribute(
            'aria-hidden',
            'true'
        );


        document.body.classList.remove(
            'overflow-hidden'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE KEY
    |--------------------------------------------------------------------------
    */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            closeDeactivateModal();

        }

    });

</script>

@endsection