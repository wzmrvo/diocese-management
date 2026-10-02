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

<section class="relative mb-6 min-h-[190px] overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">

    {{-- Royal Blue Background Accent --}}
    <div class="absolute inset-y-0 right-0 w-1/3 bg-gradient-to-l from-[#102A72]/10 to-transparent"></div>

    {{-- Decorative Gold Circle --}}
    <div class="absolute -right-16 -top-20 h-56 w-56 rounded-full border-[18px] border-[#D4AF37]/20"></div>

    <div class="absolute -bottom-24 right-24 h-44 w-44 rounded-full border-[10px] border-[#D4AF37]/10"></div>

    {{-- Decorative Royal Blue Shape --}}
    <div class="absolute bottom-0 right-0 h-full w-2 bg-[#102A72]"></div>

    {{-- Welcome Content --}}
    <div class="relative z-10 flex min-h-[190px] items-center px-7 py-8 sm:px-9">

        <div class="max-w-2xl">

            <div class="flex items-center gap-2">

                <span class="h-2 w-2 rounded-full bg-[#D4AF37]"></span>

                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#102A72]">
                    Administrator Portal
                </p>

            </div>

            <h2 class="mt-2 text-3xl font-semibold leading-tight text-[#102A72] sm:text-[36px]">
                Welcome back, {{ Auth::user()->name }}
            </h2>

            <p class="mt-3 max-w-xl text-sm leading-6 text-slate-600">
                Here's what's happening across the
                <span class="font-semibold text-[#102A72]">
                    Catholic Women's League Diocese of Imus
                </span>
                system today.
            </p>

            {{-- Gold Accent --}}
            <div class="mt-5 h-1 w-14 rounded-full bg-[#D4AF37]"></div>

        </div>

    </div>

</section>


{{-- ========================================================= --}}
{{-- DASHBOARD GRID --}}
{{-- ========================================================= --}}

<div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_350px]">


    {{-- ========================================================= --}}
    {{-- LEFT COLUMN --}}
    {{-- ========================================================= --}}

    <div class="min-w-0">


        {{-- ===================================================== --}}
        {{-- STAT CARDS --}}
        {{-- ===================================================== --}}

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">


            {{-- PENDING REQUESTS --}}
            <div class="rounded-2xl border border-[#D4AF37]/40 bg-white p-5 shadow-sm">

                <div class="flex items-center justify-between">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FFF8E5]">

                        <svg
                            class="h-5 w-5 text-[#B08A18]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                            />
                        </svg>

                    </div>

                    @if($pendingRequests > 0)

                        <span class="rounded-full bg-[#FFF1CC] px-2.5 py-1 text-[10px] font-semibold text-[#9A7615]">
                            Action needed
                        </span>

                    @endif

                </div>

                <p class="mt-5 text-xs font-medium text-slate-500">
                    Pending Account Requests
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#102A72]">
                    {{ $pendingRequests }}
                </p>

                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="mt-4 inline-flex items-center gap-1 text-xs font-semibold text-[#102A72] transition hover:text-[#B08A18]"
                >
                    Review requests
                    <span>→</span>
                </a>

            </div>


            {{-- TOTAL MEMBERS --}}
            <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EEF3FF]">

                    <svg
                        class="h-5 w-5 text-[#102A72]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                        />
                    </svg>

                </div>

                <p class="mt-5 text-xs font-medium text-slate-500">
                    Total Members
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#102A72]">
                    {{ $totalMembers }}
                </p>

                <a
                    href="{{ route('admin.members.index') }}"
                    class="mt-4 inline-flex items-center gap-1 text-xs font-semibold text-[#102A72] transition hover:text-[#B08A18]"
                >
                    View members
                    <span>→</span>
                </a>

            </div>


            {{-- VICARIATES --}}
            <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EEF3FF]">

                    <svg
                        class="h-5 w-5 text-[#102A72]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                        />
                    </svg>

                </div>

                <p class="mt-5 text-xs font-medium text-slate-500">
                    Vicariates
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#102A72]">
                    {{ $totalVicariates }}
                </p>

                <span class="mt-4 inline-flex items-center gap-1 text-xs font-semibold text-slate-400">
                    Organization structure
                </span>

            </div>


            {{-- UNITS --}}
            <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EEF3FF]">

                    <svg
                        class="h-5 w-5 text-[#102A72]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                        />
                    </svg>

                </div>

                <p class="mt-5 text-xs font-medium text-slate-500">
                    Units
                </p>

                <p class="mt-1 text-3xl font-semibold text-[#102A72]">
                    {{ $totalUnits }}
                </p>

                <span class="mt-4 inline-flex items-center gap-1 text-xs font-semibold text-slate-400">
                    Organization units
                </span>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- RECENT ACCOUNT REQUESTS --}}
        {{-- ===================================================== --}}

        <section class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Header --}}
            <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EEF3FF]">

                        <svg
                            class="h-4 w-4 text-[#102A72]"
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

                    <h3 class="text-sm font-semibold text-[#102A72]">
                        Recent Account Requests
                    </h3>

                </div>

                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="text-xs font-semibold text-[#102A72] hover:text-[#B08A18]"
                >
                    View all →
                </a>

            </div>


            @if($recentRequests->count() > 0)

                <div class="overflow-x-auto">

                    <table class="w-full text-left text-sm">

                        <thead class="bg-[#F8FAFF] text-xs text-slate-500">

                            <tr>

                                <th class="px-5 py-3 font-semibold">
                                    Name
                                </th>

                                <th class="px-5 py-3 font-semibold">
                                    Position
                                </th>

                                <th class="px-5 py-3 font-semibold">
                                    Unit
                                </th>

                                <th class="px-5 py-3 font-semibold">
                                    Date Requested
                                </th>

                                <th class="px-5 py-3 font-semibold">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($recentRequests as $request)

                                <tr class="border-t border-slate-100 transition hover:bg-[#F8FAFF]">

                                    <td class="px-5 py-3 font-medium text-slate-800">
                                        {{ $request->name }}
                                    </td>

                                    <td class="px-5 py-3 text-slate-600">
                                        {{ ucwords(str_replace('_', ' ', $request->position ?? '—')) }}
                                    </td>

                                    <td class="px-5 py-3 text-slate-600">
                                        {{ $request->unit ?? '—' }}
                                    </td>

                                    <td class="px-5 py-3 text-slate-600">
                                        {{ $request->created_at->format('M d, Y') }}
                                    </td>

                                    <td class="px-5 py-3">

                                        <span class="inline-flex rounded-full bg-[#FFF5D6] px-2.5 py-1 text-xs font-semibold text-[#9A7615]">
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

                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F1F5FF]">

                        <svg
                            class="h-6 w-6 text-[#102A72]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6"
                            />
                        </svg>

                    </div>

                    <p class="mt-4 text-sm font-semibold text-slate-800">
                        No account requests at the moment.
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        New requests will appear here once submitted.
                    </p>

                </div>

            @endif

        </section>


        {{-- ===================================================== --}}
        {{-- BOTTOM LEFT --}}
        {{-- ===================================================== --}}

        <div class="mt-6 grid gap-6 md:grid-cols-2">


            {{-- ORGANIZATION OVERVIEW --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-[10px] font-semibold uppercase tracking-[0.16em] text-[#B08A18]">
                            Organization
                        </p>

                        <h3 class="mt-1 text-sm font-semibold text-[#102A72]">
                            Organization Overview
                        </h3>

                    </div>

                </div>


                <div class="mt-5 grid grid-cols-2 gap-3">


                    {{-- Vicariates --}}
                    <div class="rounded-xl border border-blue-100 bg-[#F8FAFF] p-4">

                        <p class="text-xs text-slate-500">
                            Vicariates
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#102A72]">
                            {{ $totalVicariates }}
                        </p>

                    </div>


                    {{-- Units --}}
                    <div class="rounded-xl border border-blue-100 bg-[#F8FAFF] p-4">

                        <p class="text-xs text-slate-500">
                            Units
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#102A72]">
                            {{ $totalUnits }}
                        </p>

                    </div>


                    {{-- Members --}}
                    <div class="rounded-xl border border-blue-100 bg-[#F8FAFF] p-4">

                        <p class="text-xs text-slate-500">
                            Members
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#102A72]">
                            {{ $totalMembers }}
                        </p>

                    </div>


                    {{-- Meetings --}}
                    <div class="rounded-xl border border-[#D4AF37]/30 bg-[#FFFDF5] p-4">

                        <p class="text-xs text-slate-500">
                            Meetings
                        </p>

                        <p class="mt-2 text-2xl font-semibold text-[#102A72]">
                            {{ $totalMeetings }}
                        </p>

                    </div>

                </div>

            </section>


            {{-- RECENT MEETINGS --}}
            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-5 py-4">

                    <div class="flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-[#D4AF37]"></span>

                        <h3 class="text-sm font-semibold text-[#102A72]">
                            Recent Meetings
                        </h3>

                    </div>

                </div>


                @if($totalMeetings > 0)

                    <div class="p-5">

                        <p class="text-sm text-slate-500">
                            Meeting records are available.
                        </p>

                    </div>

                @else

                    <div class="flex min-h-[190px] flex-col items-center justify-center px-5 text-center">

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F1F5FF]">

                            <svg
                                class="h-6 w-6 text-[#102A72]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"
                                />
                            </svg>

                        </div>

                        <p class="mt-4 text-sm font-semibold text-slate-800">
                            No recent meetings
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
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

    <div class="space-y-6">


        {{-- ===================================================== --}}
        {{-- NOTIFICATIONS --}}
        {{-- ===================================================== --}}

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-5 py-4">

                <div class="flex items-center gap-2">

                    <span class="h-2 w-2 rounded-full bg-[#D4AF37]"></span>

                    <h3 class="text-sm font-semibold text-[#102A72]">
                        Notifications
                    </h3>

                </div>

            </div>


            <div class="flex min-h-[175px] flex-col items-center justify-center px-5 text-center">

                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F1F5FF]">

                    <svg
                        class="h-6 w-6 text-[#102A72]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M15 17h5l-1.5-2.5V10a6.5 6.5 0 00-13 0v4.5L4 17h5m6 0a3 3 0 01-6 0"
                        />
                    </svg>

                </div>

                <p class="mt-4 text-sm font-semibold text-slate-800">
                    No new notifications
                </p>

                <p class="mt-1 text-xs text-slate-500">
                    You're all caught up!
                </p>

            </div>

        </section>


        {{-- ===================================================== --}}
        {{-- QUICK ACTIONS --}}
        {{-- ===================================================== --}}

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-5 py-4">

                <h3 class="text-sm font-semibold text-[#102A72]">
                    Quick Actions
                </h3>

            </div>


            <div class="space-y-2 p-4">


                {{-- Review Account Requests --}}
                <a
                    href="{{ route('admin.account-requests.index') }}"
                    class="group flex items-center justify-between rounded-xl border border-slate-200 px-4 py-3 transition hover:border-[#D4AF37]/50 hover:bg-[#F8FAFF]"
                >

                    <span class="flex items-center gap-3">

                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FFF7DD]">

                            <svg
                                class="h-4 w-4 text-[#B08A18]"
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

                        </span>

                        <span class="text-sm font-medium text-slate-700">
                            Review Account Requests
                        </span>

                    </span>

                    <span class="text-lg text-[#102A72] transition group-hover:text-[#B08A18]">
                        ›
                    </span>

                </a>


                {{-- Add Member --}}
                <span
                    class="flex cursor-not-allowed items-center justify-between rounded-xl border border-slate-200 px-4 py-3 opacity-50"
                >

                    <span class="flex items-center gap-3">

                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#F1F5FF]">

                            <svg
                                class="h-4 w-4 text-[#102A72]"
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

                        </span>

                        <span class="text-sm font-medium text-slate-700">
                            Add Member
                        </span>

                    </span>

                    <span class="text-lg text-[#102A72]">
                        ›
                    </span>

                </span>


                {{-- Generate Report --}}
                <span
                    class="flex cursor-not-allowed items-center justify-between rounded-xl border border-slate-200 px-4 py-3 opacity-50"
                >

                    <span class="flex items-center gap-3">

                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#F1F5FF]">

                            <svg
                                class="h-4 w-4 text-[#102A72]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h5M9 13h6M9 17h6"
                                />
                            </svg>

                        </span>

                        <span class="text-sm font-medium text-slate-700">
                            Generate Report
                        </span>

                    </span>

                    <span class="text-lg text-[#102A72]">
                        ›
                    </span>

                </span>

            </div>

        </section>


        {{-- ===================================================== --}}
        {{-- SYSTEM INFORMATION --}}
        {{-- ===================================================== --}}

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-5 py-4">

                <div class="flex items-center gap-2">

                    <span class="h-2 w-2 rounded-full bg-[#D4AF37]"></span>

                    <h3 class="text-sm font-semibold text-[#102A72]">
                        System Information
                    </h3>

                </div>

            </div>


            <div class="divide-y divide-slate-100">


                {{-- Diocese --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-slate-500">
                        Diocese
                    </span>

                    <span class="max-w-[190px] text-right text-xs font-semibold text-[#102A72]">
                        CWL Diocese of Imus
                    </span>

                </div>


                {{-- Current User --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-slate-500">
                        Current User
                    </span>

                    <span class="max-w-[190px] truncate text-right text-xs font-semibold text-[#102A72]">
                        {{ Auth::user()->name }}
                    </span>

                </div>


                {{-- Role --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-slate-500">
                        Role
                    </span>

                    <span class="text-right text-xs font-semibold capitalize text-[#102A72]">
                        {{ Auth::user()->role }}
                    </span>

                </div>


                {{-- Last Login --}}
                <div class="flex items-center justify-between px-5 py-4">

                    <span class="text-xs text-slate-500">
                        Last Login
                    </span>

                    <span class="text-right text-xs font-semibold text-[#102A72]">

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