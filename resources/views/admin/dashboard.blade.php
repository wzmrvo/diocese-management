@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;

    $totalMembers = 0;
    $pendingRequests = 0;
    $totalVicariates = 0;
    $totalUnits = 0;
    $totalMeetings = 0;

    /*
    |--------------------------------------------------------------------------
    | USER STATISTICS
    |--------------------------------------------------------------------------
    |
    | Approved members = actual members
    | Pending members  = account requests waiting for approval
    |
    */

    if (Schema::hasTable('users')) {

        $totalMembers = DB::table('users')
            ->where('role', 'member')
            ->where('status', 'approved')
            ->count();

        $pendingRequests = DB::table('users')
            ->where('role', 'member')
            ->where('status', 'pending')
            ->count();
    }

    /*
    |--------------------------------------------------------------------------
    | ORGANIZATION STATISTICS
    |--------------------------------------------------------------------------
    */

    if (Schema::hasTable('vicariates')) {
        $totalVicariates = DB::table('vicariates')->count();
    }

    if (Schema::hasTable('units')) {
        $totalUnits = DB::table('units')->count();
    }

    if (Schema::hasTable('meetings')) {
        $totalMeetings = DB::table('meetings')->count();
    }

    /*
    |--------------------------------------------------------------------------
    | RECENT ACCOUNT REQUESTS
    |--------------------------------------------------------------------------
    */

    $recentRequests = collect();

    if (Schema::hasTable('users')) {
        $recentRequests = \App\Models\User::where('role', 'member')
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();
    }
@endphp


{{-- ========================================================= --}}
{{-- WELCOME HERO --}}
{{-- ========================================================= --}}

<section class="relative mb-5 min-h-[175px] overflow-hidden rounded-xl border border-stone-200 bg-[#f3f1e8] shadow-sm">

    {{-- Background --}}
    <div class="absolute inset-0 bg-gradient-to-r from-[#f5f2e8] via-[#f4f2ea] to-[#e9e8de]"></div>


    {{-- Church decoration --}}
    <div class="absolute bottom-0 right-0 hidden opacity-[0.11] sm:block">

        <svg
            width="470"
            height="180"
            viewBox="0 0 470 180"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >

            <path
                d="M285 180V86L315 63V180M315 63L330 48L345 63V180M330 48V20M325 25L330 20L335 25M250 180V108L270 95L290 108V180M215 180V105L250 78L285 105V180"
                stroke="#174638"
                stroke-width="3"
            />

            <path
                d="M195 180V130L215 115L235 130V180M345 180V105L365 115V180M365 115L405 140V180M405 140L430 153V180"
                stroke="#174638"
                stroke-width="3"
            />

            <path
                d="M170 180V145L195 130M430 180V153"
                stroke="#174638"
                stroke-width="3"
            />

            <path
                d="M245 180V145C245 134 253 125 263 125C273 125 281 134 281 145V180"
                stroke="#174638"
                stroke-width="3"
            />

            <path
                d="M315 180V128C315 118 322 110 330 110C338 110 345 118 345 128V180"
                stroke="#174638"
                stroke-width="3"
            />

        </svg>

    </div>


    {{-- Welcome text --}}
    <div class="relative z-10 flex h-full items-center px-7 py-7 sm:px-8">

        <div class="max-w-xl">

            <p class="text-sm font-medium text-[#174638]/70">
                Welcome back,
            </p>

            <h2 class="mt-1 font-serif text-3xl font-semibold leading-tight text-[#123e31] sm:text-[34px]">
                {{ Auth::user()->name }}
            </h2>

            <p class="mt-2 max-w-lg text-sm leading-6 text-[#31554b]">
                Here's what's happening across the
                <span class="font-medium">
                    CWL Diocese of Imus
                </span>
                system today.
            </p>

            <div class="mt-4 h-1 w-12 rounded-full bg-[#d8a92e]"></div>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- DASHBOARD GRID --}}
{{-- ========================================================= --}}

<div class="grid gap-5 xl:grid-cols-[minmax(0,1fr)_360px]">


    {{-- ========================================================= --}}
    {{-- LEFT COLUMN --}}
    {{-- ========================================================= --}}

    <div class="min-w-0">


        {{-- ===================================================== --}}
        {{-- STAT CARDS --}}
        {{-- ===================================================== --}}

        <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">


            {{-- PENDING REQUESTS --}}
            <div class="rounded-xl border border-[#e7d49a] bg-[#fffaf0] p-5 shadow-sm">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#f8e9bd] text-[#a87812]">
                    <span class="text-lg">👥</span>
                </div>

                <p class="mt-4 text-xs font-medium text-[#174638]">
                    Pending Account Requests
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#123e31]">
                    {{ $pendingRequests }}
                </p>

                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="mt-4 inline-flex items-center gap-1 text-xs font-medium text-[#9a741b] transition hover:text-[#174638]"
                >
                    View requests
                    <span>→</span>
                </a>

            </div>



            {{-- TOTAL MEMBERS --}}
            <div class="rounded-xl border border-[#cfe1d3] bg-[#f4faf4] p-5 shadow-sm">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#dceede] text-[#26754f]">
                    <span class="text-lg">👤</span>
                </div>

                <p class="mt-4 text-xs font-medium text-[#174638]">
                    Total Members
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#123e31]">
                    {{ $totalMembers }}
                </p>

                {{-- Members page not created yet --}}
                <span class="mt-4 inline-flex items-center gap-1 text-xs font-medium text-[#26754f]/50">
                    View members
                    <span>→</span>
                </span>

            </div>



            {{-- VICARIATES --}}
            <div class="rounded-xl border border-[#cfe1ed] bg-[#f3f9fc] p-5 shadow-sm">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#dcecf8] text-[#2275ad]">
                    <span class="text-lg">🏛</span>
                </div>

                <p class="mt-4 text-xs font-medium text-[#174638]">
                    Vicariates
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#123e31]">
                    {{ $totalVicariates }}
                </p>

                {{-- Vicariates page not created yet --}}
                <span class="mt-4 inline-flex items-center gap-1 text-xs font-medium text-[#2275ad]/50">
                    View vicariates
                    <span>→</span>
                </span>

            </div>



            {{-- UNITS --}}
            <div class="rounded-xl border border-[#ddd2ed] bg-[#f8f5fc] p-5 shadow-sm">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#ebe1f7] text-[#7650a5]">
                    <span class="text-lg">🏢</span>
                </div>

                <p class="mt-4 text-xs font-medium text-[#174638]">
                    Units
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#123e31]">
                    {{ $totalUnits }}
                </p>

                {{-- Units page not created yet --}}
                <span class="mt-4 inline-flex items-center gap-1 text-xs font-medium text-[#7650a5]/50">
                    View units
                    <span>→</span>
                </span>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- RECENT ACCOUNT REQUESTS --}}
        {{-- ===================================================== --}}

        <section class="mt-5 overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm">


            {{-- Header --}}
            <div class="flex items-center justify-between border-b border-stone-200 px-5 py-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#edf1eb] text-[#174638]">
                        <span>👤</span>
                    </div>

                    <h3 class="text-sm font-semibold text-[#173e32]">
                        Recent Account Requests
                    </h3>

                </div>

                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="text-xs font-medium text-[#174638] hover:underline"
                >
                    View all →
                </a>

            </div>



            @if($recentRequests->count() > 0)

                <div class="overflow-x-auto">

                    <table class="w-full text-left text-sm">

                        <thead class="bg-stone-50 text-xs text-stone-500">

                            <tr>

                                <th class="px-5 py-3 font-medium">
                                    Name
                                </th>

                                <th class="px-5 py-3 font-medium">
                                    Position
                                </th>

                                <th class="px-5 py-3 font-medium">
                                    Unit
                                </th>

                                <th class="px-5 py-3 font-medium">
                                    Date Requested
                                </th>

                                <th class="px-5 py-3 font-medium">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($recentRequests as $request)

                                <tr class="border-t border-stone-100 transition hover:bg-stone-50">

                                    <td class="px-5 py-3 font-medium text-[#173e32]">
                                        {{ $request->name }}
                                    </td>

                                    <td class="px-5 py-3 text-stone-600">
                                        {{ ucwords(str_replace('_', ' ', $request->position ?? '—')) }}
                                    </td>

                                    <td class="px-5 py-3 text-stone-600">
                                        {{ $request->unit ?? '—' }}
                                    </td>

                                    <td class="px-5 py-3 text-stone-600">
                                        {{ $request->created_at->format('M d, Y') }}
                                    </td>

                                    <td class="px-5 py-3">

                                        <span class="rounded-full bg-yellow-100 px-2.5 py-1 text-xs font-medium text-yellow-700">
                                            Pending
                                        </span>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="flex min-h-[180px] flex-col items-center justify-center px-6 py-10 text-center">

                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#f0f2ed] text-[#829188]">
                        📋
                    </div>

                    <p class="mt-4 text-sm font-medium text-[#173e32]">
                        No account requests at the moment.
                    </p>

                    <p class="mt-1 text-xs text-stone-500">
                        New requests will appear here once submitted.
                    </p>

                </div>

            @endif

        </section>



        {{-- ===================================================== --}}
        {{-- BOTTOM LEFT --}}
        {{-- ===================================================== --}}

        <div class="mt-5 grid gap-5 md:grid-cols-2">


            {{-- ORGANIZATION OVERVIEW --}}
            <section class="rounded-xl border border-stone-200 bg-white p-5 shadow-sm">

                <div class="flex items-center justify-between">

                    <h3 class="text-sm font-semibold text-[#173e32]">
                        Organization Overview
                    </h3>

                </div>


                <div class="mt-5 grid grid-cols-2 gap-2">


                    {{-- Vicariates --}}
                    <div class="rounded-lg border border-[#eadcae] bg-[#fffaf0] p-4">

                        <p class="text-xs text-stone-600">
                            Vicariates
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#173e32]">
                            {{ $totalVicariates }}
                        </p>

                    </div>


                    {{-- Units --}}
                    <div class="rounded-lg border border-[#cfe1d3] bg-[#f5faf5] p-4">

                        <p class="text-xs text-stone-600">
                            Units
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#173e32]">
                            {{ $totalUnits }}
                        </p>

                    </div>


                    {{-- Members --}}
                    <div class="rounded-lg border border-[#cfe1ed] bg-[#f4f9fc] p-4">

                        <p class="text-xs text-stone-600">
                            Members
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#173e32]">
                            {{ $totalMembers }}
                        </p>

                    </div>


                    {{-- Meetings --}}
                    <div class="rounded-lg border border-[#ddd2ed] bg-[#f9f6fc] p-4">

                        <p class="text-xs text-stone-600">
                            Meetings
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#173e32]">
                            {{ $totalMeetings }}
                        </p>

                    </div>

                </div>

            </section>



            {{-- RECENT MEETINGS --}}
            <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

                <div class="border-b border-stone-200 px-5 py-4">

                    <h3 class="text-sm font-semibold text-[#173e32]">
                        Recent Meetings
                    </h3>

                </div>


                @if($totalMeetings > 0)

                    <div class="p-5">

                        <p class="text-sm text-stone-500">
                            Meeting records are available.
                        </p>

                    </div>

                @else

                    <div class="flex min-h-[190px] flex-col items-center justify-center px-5 text-center">

                        <div class="text-3xl">
                            📅
                        </div>

                        <p class="mt-4 text-sm font-medium text-[#173e32]">
                            No recent meetings
                        </p>

                        <p class="mt-1 text-xs text-stone-500">
                            Meeting records will appear here once available.
                        </p>

                    </div>

                @endif

            </section>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- RIGHT COLUMN --}}
    {{-- ========================================================= --}}

    <div class="space-y-5">


        {{-- ===================================================== --}}
        {{-- NOTIFICATIONS --}}
        {{-- ===================================================== --}}

        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

            <div class="border-b border-stone-200 px-5 py-4">

                <h3 class="text-sm font-semibold text-[#173e32]">
                    Notifications
                </h3>

            </div>


            <div class="flex min-h-[175px] flex-col items-center justify-center px-5 text-center">

                <div class="text-3xl">
                    🔔
                </div>

                <p class="mt-4 text-sm font-semibold text-[#173e32]">
                    No new notifications
                </p>

                <p class="mt-1 text-xs text-stone-500">
                    You're all caught up!
                </p>

            </div>

        </section>



        {{-- ===================================================== --}}
        {{-- QUICK ACTIONS --}}
        {{-- ===================================================== --}}

        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

            <div class="border-b border-stone-200 px-5 py-4">

                <h3 class="text-sm font-semibold text-[#173e32]">
                    Quick Actions
                </h3>

            </div>


            <div class="space-y-2 p-4">


                {{-- Review Account Requests --}}
                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="flex items-center justify-between rounded-lg border border-stone-200 px-4 py-3 transition hover:bg-stone-50"
                >

                    <span class="flex items-center gap-3">

                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#fff5d8] text-[#9a741b]">
                            👥
                        </span>

                        <span class="text-sm text-[#173e32]">
                            Review Account Requests
                        </span>

                    </span>

                    <span class="text-lg text-[#507565]">
                        ›
                    </span>

                </a>



                {{-- Add Member --}}
                <span
                    class="flex cursor-not-allowed items-center justify-between rounded-lg border border-stone-200 px-4 py-3 opacity-50"
                >

                    <span class="flex items-center gap-3">

                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#f0f2ed] text-[#31584a]">
                            👤
                        </span>

                        <span class="text-sm text-[#173e32]">
                            Add Member
                        </span>

                    </span>

                    <span class="text-lg text-[#507565]">
                        ›
                    </span>

                </span>



                {{-- Generate Report --}}
                <span
                    class="flex cursor-not-allowed items-center justify-between rounded-lg border border-stone-200 px-4 py-3 opacity-50"
                >

                    <span class="flex items-center gap-3">

                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#f0f2ed] text-[#31584a]">
                            📄
                        </span>

                        <span class="text-sm text-[#173e32]">
                            Generate Report
                        </span>

                    </span>

                    <span class="text-lg text-[#507565]">
                        ›
                    </span>

                </span>

            </div>

        </section>



        {{-- ===================================================== --}}
        {{-- SYSTEM INFORMATION --}}
        {{-- ===================================================== --}}

        <section class="rounded-xl border border-stone-200 bg-white shadow-sm">

            <div class="border-b border-stone-200 px-5 py-4">

                <h3 class="text-sm font-semibold text-[#173e32]">
                    System Information
                </h3>

            </div>


            <div class="divide-y divide-stone-100">


                {{-- Diocese --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-stone-500">
                        Diocese
                    </span>

                    <span class="text-right text-xs font-medium text-[#173e32]">
                        CWL Diocese of Imus
                    </span>

                </div>


                {{-- Current User --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-stone-500">
                        Current User
                    </span>

                    <span class="text-right text-xs font-medium text-[#173e32]">
                        {{ Auth::user()->name }}
                    </span>

                </div>


                {{-- Role --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-stone-500">
                        Role
                    </span>

                    <span class="text-right text-xs font-medium capitalize text-[#173e32]">
                        {{ Auth::user()->role }}
                    </span>

                </div>


                {{-- Last Login --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-stone-500">
                        Last Login
                    </span>

                    <span class="text-right text-xs font-medium text-[#173e32]">

                        {{ Auth::user()->last_login_at
                            ? \Carbon\Carbon::parse(Auth::user()->last_login_at)->format('M d, Y h:i A')
                            : 'Not available'
                        }}

                    </span>

                </div>

            </div>

        </section>

    </div>

</div>

@endsection