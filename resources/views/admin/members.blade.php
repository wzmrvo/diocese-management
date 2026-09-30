@extends('layouts.admin')

@section('title', 'Members')

@section('content')

<div class="space-y-6">

    {{-- PAGE HEADER --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-xs font-medium uppercase tracking-[0.15em] text-[#8d7130]">
                Organization
            </p>

            <h1 class="mt-1 font-serif text-3xl font-semibold text-[#173e32]">
                Members
            </h1>

            <p class="mt-1 text-sm text-stone-500">
                View and manage approved CWL members.
            </p>
        </div>

        <div class="rounded-lg border border-[#cfe1d3] bg-[#f4faf4] px-4 py-3">
            <p class="text-xs text-stone-500">
                Total Members
            </p>

            <p class="mt-1 text-2xl font-semibold text-[#173e32]">
                {{ $members->count() }}
            </p>
        </div>

    </div>


    {{-- MEMBERS CARD --}}
    <section class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm">

        {{-- CARD HEADER --}}
        <div class="flex flex-col gap-3 border-b border-stone-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h2 class="text-sm font-semibold text-[#173e32]">
                    Approved Members
                </h2>

                <p class="mt-1 text-xs text-stone-500">
                    Members who have been approved by the administrator.
                </p>
            </div>

        </div>


        @if($members->count() > 0)

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-stone-50 text-xs text-stone-500">

                        <tr>

                            <th class="px-5 py-3 font-medium">
                                Member
                            </th>

                            <th class="px-5 py-3 font-medium">
                                Email
                            </th>

                            <th class="px-5 py-3 font-medium">
                                Position
                            </th>

                            <th class="px-5 py-3 font-medium">
                                Unit
                            </th>

                            <th class="px-5 py-3 font-medium">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($members as $member)

                            <tr class="border-t border-stone-100 transition hover:bg-stone-50">

                                {{-- MEMBER --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#173f33] text-sm font-medium text-white">

                                            {{ strtoupper(substr($member->name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="font-medium text-[#173e32]">
                                                {{ $member->name }}
                                            </p>

                                            <p class="text-xs text-stone-400">
                                                Member
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td class="px-5 py-4 text-stone-600">
                                    {{ $member->email }}
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
                                    {{ $member->unit ?? '—' }}
                                </td>


                                {{-- STATUS --}}
                                <td class="px-5 py-4">

                                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700">
                                        Approved
                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- EMPTY STATE --}}
            <div class="flex min-h-[300px] flex-col items-center justify-center px-6 py-12 text-center">

                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#f0f2ed] text-2xl">
                    👥
                </div>

                <h3 class="mt-4 text-sm font-semibold text-[#173e32]">
                    No approved members yet
                </h3>

                <p class="mt-1 max-w-sm text-xs leading-5 text-stone-500">
                    Approved member accounts will appear here.
                </p>

                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="mt-5 rounded-lg bg-[#173f33] px-4 py-2.5 text-xs font-medium text-white transition hover:bg-[#245746]"
                >
                    Review Account Requests
                </a>

            </div>

        @endif

    </section>

</div>

@endsection