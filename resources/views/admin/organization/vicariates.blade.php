@extends('layouts.admin')

@section('content')

<div class="min-h-full bg-[#f6f7f9] px-6 py-8">

<div class="mx-auto max-w-7xl">

    {{-- HEADER --}}
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>

            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#765f16]">
                Organization
            </p>

            <h1 class="mt-1 text-3xl font-bold tracking-tight text-[#252525]">
                Vicariates
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Manage the vicariates under the Diocese.
            </p>

        </div>


        {{-- ADD VICARIATE --}}
        <a
            href="{{ route('admin.organization.vicariates.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#f4d77d] px-5 py-3 text-sm font-semibold text-[#252525] shadow-sm transition hover:bg-[#e9c963] focus:outline-none focus:ring-2 focus:ring-[#f4d77d]/50"
        >
            <span class="text-lg leading-none">+</span>
            Add Vicariate
        </a>

    </div>


    {{-- FLASH SUCCESS --}}
    @if(session('success'))

        <div class="mb-6 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">

            <span class="mt-0.5">✓</span>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- FLASH ERROR --}}
    @if(session('error'))

        <div class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700">

            <span class="mt-0.5">!</span>

            <span>
                {{ session('error') }}
            </span>

        </div>

    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

            <ul class="list-disc space-y-1 pl-5">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- DIRECTORY --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        {{-- DIRECTORY HEADER --}}
        <div class="flex flex-col gap-2 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="font-semibold text-[#252525]">
                    Diocese Vicariates
                </h2>

                <p class="mt-1 text-xs text-gray-500">
                    {{ $vicariates->count() }}
                    {{ $vicariates->count() === 1 ? 'vicariate' : 'vicariates' }}
                    registered
                </p>

            </div>


            <span class="inline-flex w-fit items-center rounded-full bg-[#f4d77d]/25 px-3 py-1 text-xs font-semibold text-[#765f16]">

                {{ $vicariates->sum('units_count') }}

                {{ $vicariates->sum('units_count') === 1 ? 'Unit' : 'Units' }}

            </span>

        </div>


        {{-- EMPTY STATE --}}
        @if($vicariates->isEmpty())

            <div class="px-6 py-16 text-center">

                <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#f4d77d]/25 text-[#765f16]">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 7.5L12 4l9 3.5M3 7.5V17l9 3 9-3V7.5M3 7.5l9 4 9-4M12 11.5V20"
                        />
                    </svg>

                </div>


                <h3 class="font-semibold text-[#252525]">
                    No vicariates yet
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500">
                    Add the first vicariate to begin organizing the
                    Diocese's units.
                </p>


                <a
                    href="{{ route('admin.organization.vicariates.create') }}"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#f4d77d] px-5 py-2.5 text-sm font-semibold text-[#252525] transition hover:bg-[#e9c963]"
                >

                    <span class="text-base">
                        +
                    </span>

                    Add Vicariate

                </a>

            </div>


        {{-- TABLE --}}
        @else

            <div class="overflow-x-auto">

                <table class="w-full min-w-[700px]">

                    <thead>

                        <tr class="border-b border-gray-100 bg-gray-50/80 text-left">

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Vicariate
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Units
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @foreach($vicariates as $vicariate)

                            <tr class="group transition hover:bg-gray-50/70">

                                {{-- VICARIATE --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f4d77d]/30 text-sm font-bold text-[#765f16]">

                                            {{ strtoupper(substr($vicariate->name, 0, 1)) }}

                                        </div>


                                        <div class="min-w-0">

                                            <p class="truncate font-semibold text-[#252525]">
                                                {{ $vicariate->name }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-gray-400">
                                                Vicariate
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- UNITS --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex items-center rounded-full bg-[#f4d77d]/25 px-3 py-1 text-xs font-semibold text-[#765f16]">

                                        {{ $vicariate->units_count }}

                                        {{ $vicariate->units_count === 1 ? 'Unit' : 'Units' }}

                                    </span>

                                </td>


                                {{-- ACTION --}}
                                <td class="px-6 py-5 text-right">

                                    <a
                                        href="{{ route('admin.organization.vicariates.edit', $vicariate) }}"
                                        class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 transition hover:border-[#f4d77d] hover:bg-[#f4d77d]/10 hover:text-[#765f16] focus:outline-none focus:ring-2 focus:ring-[#f4d77d]/40"
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
                                                d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 10-3.536-3.536L4.464 16.5 4 20z"
                                            />
                                        </svg>

                                        Manage

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

</div>

</div>

@endsection
