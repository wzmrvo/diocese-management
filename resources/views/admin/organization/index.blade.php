@extends('layouts.admin')

@section('title', 'Organization')

@section('content')

<div class="space-y-6">

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <section
        class="relative overflow-hidden rounded-2xl border border-blue-100
        bg-white shadow-sm"
    >

        {{-- Decorative background --}}
        <div
            class="absolute right-0 top-0 h-full w-1/3
            bg-gradient-to-l from-[#123B8F]/10 to-transparent"
        ></div>

        <div
            class="absolute -right-16 -top-20 h-56 w-56
            rounded-full border-[18px] border-[#D4AF37]/10"
        ></div>

        <div
            class="absolute -bottom-20 right-32 h-40 w-40
            rounded-full border-[10px] border-[#123B8F]/5"
        ></div>

        <div class="relative z-10 px-6 py-7 sm:px-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-[#D4AF37]"></span>

                        <p
                            class="text-[10px] font-semibold uppercase
                            tracking-[0.18em] text-[#B08A18]"
                        >
                            Administration
                        </p>

                    </div>

                    <h1
                        class="mt-2 text-2xl font-semibold text-[#102A72]
                        sm:text-3xl"
                    >
                        Organization
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                        Manage the organizational structure of the
                        Catholic Women's League Diocese of Imus,
                        including vicariates and units.
                    </p>

                </div>


                {{-- Organization icon --}}

                <div
                    class="hidden h-16 w-16 shrink-0 items-center
                    justify-center rounded-2xl bg-[#EEF3FF] sm:flex"
                >

                    <svg
                        class="h-8 w-8 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                        />

                    </svg>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- FLASH MESSAGES --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div
            class="flex items-start gap-3 rounded-xl
            border border-green-200 bg-green-50 px-4 py-3"
        >

            <div
                class="flex h-8 w-8 shrink-0 items-center justify-center
                rounded-lg bg-green-100 text-green-600"
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
                        stroke-width="2"
                        d="m5 12 4 4L19 6"
                    />

                </svg>

            </div>

            <div>

                <p class="text-sm font-semibold text-green-800">
                    Success
                </p>

                <p class="mt-0.5 text-xs text-green-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    @if(session('error'))

        <div
            class="flex items-start gap-3 rounded-xl
            border border-red-200 bg-red-50 px-4 py-3"
        >

            <div
                class="flex h-8 w-8 shrink-0 items-center justify-center
                rounded-lg bg-red-100 text-red-600"
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
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />

                </svg>

            </div>

            <div>

                <p class="text-sm font-semibold text-red-800">
                    Unable to complete action
                </p>

                <p class="mt-0.5 text-xs text-red-700">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif


    @if($errors->any())

        <div
            class="rounded-xl border border-red-200
            bg-red-50 px-4 py-3"
        >

            <p class="text-sm font-semibold text-red-800">
                Please check the following:
            </p>

            <ul class="mt-2 list-inside list-disc text-xs text-red-700">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- ORGANIZATION SUMMARY --}}
    {{-- ========================================================= --}}

    <div class="grid gap-4 sm:grid-cols-2">

        {{-- VICARIATES --}}

        <div
            class="rounded-2xl border border-blue-100
            bg-white p-5 shadow-sm"
        >

            <div class="flex items-start justify-between">

                <div
                    class="flex h-11 w-11 items-center justify-center
                    rounded-xl bg-[#EEF3FF]"
                >

                    <svg
                        class="h-5 w-5 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                        />

                    </svg>

                </div>

                <span
                    class="rounded-full bg-[#FFF8E5]
                    px-2.5 py-1 text-[10px] font-semibold
                    text-[#9A7615]"
                >
                    Structure
                </span>

            </div>

            <p class="mt-5 text-xs font-medium text-slate-500">
                Total Vicariates
            </p>

            <p class="mt-1 text-3xl font-semibold text-[#102A72]">
                {{ $vicariates->count() }}
            </p>

            <p class="mt-2 text-xs text-slate-400">
                Organizational divisions under the Diocese
            </p>

        </div>


        {{-- UNITS --}}

        <div
            class="rounded-2xl border border-blue-100
            bg-white p-5 shadow-sm"
        >

            <div class="flex items-start justify-between">

                <div
                    class="flex h-11 w-11 items-center justify-center
                    rounded-xl bg-[#EEF3FF]"
                >

                    <svg
                        class="h-5 w-5 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M4 21h16M6 21V9h12v12M9 9V5h6v4M9 13h2m2 0h2m-6 4h2m2 0h2"
                        />

                    </svg>

                </div>

                <span
                    class="rounded-full bg-[#EEF3FF]
                    px-2.5 py-1 text-[10px] font-semibold
                    text-[#123B8F]"
                >
                    Organization
                </span>

            </div>

            <p class="mt-5 text-xs font-medium text-slate-500">
                Total Units
            </p>

            <p class="mt-1 text-3xl font-semibold text-[#102A72]">
                {{ $units->count() }}
            </p>

            <p class="mt-2 text-xs text-slate-400">
                Local CWL organizational units
            </p>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ADD ORGANIZATION --}}
    {{-- ========================================================= --}}

    <div class="grid gap-6 xl:grid-cols-2">


        {{-- ===================================================== --}}
        {{-- ADD VICARIATE --}}
        {{-- ===================================================== --}}

        <section
            class="overflow-hidden rounded-2xl
            border border-slate-200 bg-white shadow-sm"
        >

            <div
                class="border-b border-slate-200
                px-5 py-4"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center
                        justify-center rounded-xl bg-[#FFF8E5]"
                    >

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
                                d="M12 5v14M5 12h14"
                            />

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-sm font-semibold text-[#102A72]">
                            Add Vicariate
                        </h2>

                        <p class="text-[11px] text-slate-400">
                            Create a new diocesan vicariate
                        </p>

                    </div>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('admin.organization.vicariates.store') }}"
                class="p-5"
            >

                @csrf

                <label
                    for="vicariate_name"
                    class="mb-2 block text-xs font-semibold
                    text-slate-700"
                >
                    Vicariate Name
                </label>

                <div class="flex flex-col gap-3 sm:flex-row">

                    <input
                        id="vicariate_name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. Vicariate of Imus"
                        required
                        class="min-w-0 flex-1 rounded-xl
                        border border-slate-300 bg-white
                        px-4 py-3 text-sm text-slate-700
                        outline-none transition
                        placeholder:text-slate-400
                        focus:border-[#123B8F]
                        focus:ring-2 focus:ring-[#123B8F]/10"
                    >

                    <button
                        type="submit"
                        class="inline-flex shrink-0 items-center
                        justify-center gap-2 rounded-xl
                        bg-[#123B8F] px-5 py-3 text-sm
                        font-semibold text-white
                        transition hover:bg-[#0D2F73]
                        focus:outline-none
                        focus:ring-2 focus:ring-[#123B8F]/20"
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
                                stroke-width="2"
                                d="M12 5v14M5 12h14"
                            />

                        </svg>

                        Add

                    </button>

                </div>

            </form>

        </section>


        {{-- ===================================================== --}}
        {{-- ADD UNIT --}}
        {{-- ===================================================== --}}

        <section
            class="overflow-hidden rounded-2xl
            border border-slate-200 bg-white shadow-sm"
        >

            <div
                class="border-b border-slate-200
                px-5 py-4"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center
                        justify-center rounded-xl bg-[#EEF3FF]"
                    >

                        <svg
                            class="h-5 w-5 text-[#123B8F]"
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

                        <h2 class="text-sm font-semibold text-[#102A72]">
                            Add Unit
                        </h2>

                        <p class="text-[11px] text-slate-400">
                            Create a new local CWL unit
                        </p>

                    </div>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('admin.organization.units.store') }}"
                class="p-5"
            >

                @csrf

                <div class="grid gap-4 sm:grid-cols-[1fr_1fr_auto]">

                    <div>

                        <label
                            for="unit_name"
                            class="mb-2 block text-xs font-semibold
                            text-slate-700"
                        >
                            Unit Name
                        </label>

                        <input
                            id="unit_name"
                            type="text"
                            name="name"
                            placeholder="e.g. Our Lady of Peace"
                            required
                            class="w-full rounded-xl
                            border border-slate-300 bg-white
                            px-4 py-3 text-sm text-slate-700
                            outline-none transition
                            placeholder:text-slate-400
                            focus:border-[#123B8F]
                            focus:ring-2 focus:ring-[#123B8F]/10"
                        >

                    </div>


                    <div>

                        <label
                            for="vicariate_id"
                            class="mb-2 block text-xs font-semibold
                            text-slate-700"
                        >
                            Vicariate
                        </label>

                        <select
                            id="vicariate_id"
                            name="vicariate_id"
                            required
                            class="w-full rounded-xl
                            border border-slate-300 bg-white
                            px-4 py-3 text-sm text-slate-700
                            outline-none transition
                            focus:border-[#123B8F]
                            focus:ring-2 focus:ring-[#123B8F]/10"
                        >

                            <option value="">
                                Select vicariate
                            </option>

                            @foreach($vicariates as $vicariate)

                                <option
                                    value="{{ $vicariate->id }}"
                                >
                                    {{ $vicariate->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="flex items-end">

                        <button
                            type="submit"
                            class="inline-flex w-full items-center
                            justify-center gap-2 rounded-xl
                            bg-[#123B8F] px-5 py-3 text-sm
                            font-semibold text-white
                            transition hover:bg-[#0D2F73]
                            focus:outline-none
                            focus:ring-2 focus:ring-[#123B8F]/20
                            sm:w-auto"
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
                                    stroke-width="2"
                                    d="M12 5v14M5 12h14"
                                />

                            </svg>

                            Add

                        </button>

                    </div>

                </div>

            </form>

        </section>

    </div>


    {{-- ========================================================= --}}
    {{-- VICARIATES --}}
    {{-- ========================================================= --}}

    <section
        class="overflow-hidden rounded-2xl
        border border-slate-200 bg-white shadow-sm"
    >

        <div
            class="flex flex-col gap-3 border-b border-slate-200
            px-5 py-4 sm:flex-row sm:items-center
            sm:justify-between"
        >

            <div class="flex items-center gap-3">

                <div
                    class="flex h-10 w-10 items-center
                    justify-center rounded-xl bg-[#EEF3FF]"
                >

                    <svg
                        class="h-5 w-5 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                        />

                    </svg>

                </div>

                <div>

                    <h2 class="text-sm font-semibold text-[#102A72]">
                        Vicariates
                    </h2>

                    <p class="text-[11px] text-slate-400">
                        Manage diocesan vicariates
                    </p>

                </div>

            </div>

            <span
                class="w-fit rounded-full bg-[#FFF8E5]
                px-3 py-1 text-[10px] font-semibold
                text-[#9A7615]"
            >
                {{ $vicariates->count() }} total
            </span>

        </div>


        @if($vicariates->count())

            <div class="divide-y divide-slate-100">

                @foreach($vicariates as $vicariate)

                    <div
                        x-data="{
                            editing: false,
                            name: @js($vicariate->name)
                        }"
                        class="px-5 py-5 transition
                        hover:bg-[#F8FAFF]"
                    >

                        {{-- VIEW MODE --}}

                        <div
                            x-show="!editing"
                            class="flex flex-col gap-4
                            sm:flex-row sm:items-center
                            sm:justify-between"
                        >

                            <div class="flex min-w-0 items-center gap-4">

                                <div
                                    class="flex h-10 w-10 shrink-0
                                    items-center justify-center
                                    rounded-xl bg-[#F1F5FF]
                                    text-sm font-bold text-[#123B8F]"
                                >
                                    {{ $loop->iteration }}
                                </div>

                                <div class="min-w-0">

                                    <p
                                        class="truncate text-sm
                                        font-semibold text-slate-800"
                                    >
                                        {{ $vicariate->name }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $vicariate->units_count }}
                                        {{ Str::plural('unit', $vicariate->units_count) }}
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-center gap-2">

                                {{-- EDIT --}}

                                <button
                                    type="button"
                                    @click="editing = true"
                                    class="inline-flex items-center
                                    gap-1.5 rounded-lg border
                                    border-slate-200 px-3 py-2
                                    text-xs font-semibold
                                    text-[#123B8F]
                                    transition hover:border-[#123B8F]/30
                                    hover:bg-[#EEF3FF]"
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
                                            d="M16.5 3.5a2.12 2.12 0 013 3L8 18l-4 1 1-4L16.5 3.5z"
                                        />

                                    </svg>

                                    Edit

                                </button>


                                {{-- DELETE --}}

                                <form
                                    method="POST"
                                    action="{{ route('admin.organization.vicariates.destroy', $vicariate) }}"
                                    onsubmit="return confirm('Delete this vicariate?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center
                                        gap-1.5 rounded-lg border
                                        border-red-100 px-3 py-2
                                        text-xs font-semibold
                                        text-red-600 transition
                                        hover:bg-red-50"
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
                                                d="M6 7h12M9 7V4h6v3m-7 0l.7 13h6.6L16 7M10 11v5m4-5v5"
                                            />

                                        </svg>

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>


                        {{-- EDIT MODE --}}

                        <div
                            x-show="editing"
                            x-cloak
                        >

                            <form
                                method="POST"
                                action="{{ route('admin.organization.vicariates.update', $vicariate) }}"
                                class="flex flex-col gap-3 sm:flex-row"
                            >

                                @csrf
                                @method('PATCH')

                                <input
                                    type="text"
                                    name="name"
                                    x-model="name"
                                    required
                                    class="min-w-0 flex-1 rounded-xl
                                    border border-slate-300
                                    px-4 py-3 text-sm
                                    outline-none
                                    focus:border-[#123B8F]
                                    focus:ring-2
                                    focus:ring-[#123B8F]/10"
                                >

                                <div class="flex gap-2">

                                    <button
                                        type="submit"
                                        class="rounded-xl bg-[#123B8F]
                                        px-4 py-3 text-xs font-semibold
                                        text-white transition
                                        hover:bg-[#0D2F73]"
                                    >
                                        Save
                                    </button>

                                    <button
                                        type="button"
                                        @click="editing = false"
                                        class="rounded-xl border
                                        border-slate-200 px-4 py-3
                                        text-xs font-semibold
                                        text-slate-600 transition
                                        hover:bg-slate-50"
                                    >
                                        Cancel
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div
                class="flex min-h-[190px] flex-col
                items-center justify-center px-6 py-10
                text-center"
            >

                <div
                    class="flex h-12 w-12 items-center
                    justify-center rounded-full bg-[#F1F5FF]"
                >

                    <svg
                        class="h-6 w-6 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"
                        />

                    </svg>

                </div>

                <p class="mt-4 text-sm font-semibold text-slate-800">
                    No vicariates yet
                </p>

                <p class="mt-1 max-w-sm text-xs text-slate-500">
                    Add the first vicariate using the form above.
                </p>

            </div>

        @endif

    </section>


    {{-- ========================================================= --}}
    {{-- UNITS --}}
    {{-- ========================================================= --}}

    <section
        class="overflow-hidden rounded-2xl
        border border-slate-200 bg-white shadow-sm"
    >

        <div
            class="flex flex-col gap-3 border-b border-slate-200
            px-5 py-4 sm:flex-row sm:items-center
            sm:justify-between"
        >

            <div class="flex items-center gap-3">

                <div
                    class="flex h-10 w-10 items-center
                    justify-center rounded-xl bg-[#EEF3FF]"
                >

                    <svg
                        class="h-5 w-5 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M4 21h16M6 21V9h12v12M9 9V5h6v4M9 13h2m2 0h2m-6 4h2m2 0h2"
                        />

                    </svg>

                </div>

                <div>

                    <h2 class="text-sm font-semibold text-[#102A72]">
                        Units
                    </h2>

                    <p class="text-[11px] text-slate-400">
                        Manage local CWL units and their vicariates
                    </p>

                </div>

            </div>

            <span
                class="w-fit rounded-full bg-[#EEF3FF]
                px-3 py-1 text-[10px] font-semibold
                text-[#123B8F]"
            >
                {{ $units->count() }} total
            </span>

        </div>


        @if($units->count())

            <div class="overflow-x-auto">

                <table class="w-full min-w-[680px] text-left">

                    <thead
                        class="bg-[#F8FAFF] text-[10px]
                        uppercase tracking-wide text-slate-500"
                    >

                        <tr>

                            <th class="px-5 py-3 font-semibold">
                                Unit
                            </th>

                            <th class="px-5 py-3 font-semibold">
                                Vicariate
                            </th>

                            <th class="px-5 py-3 text-right font-semibold">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @foreach($units as $unit)

                            <tr
                                x-data="{
                                    editing: false,
                                    name: @js($unit->name),
                                    vicariate: '{{ $unit->vicariate_id }}'
                                }"
                                class="transition hover:bg-[#F8FAFF]"
                            >

                                {{-- VIEW --}}

                                <td class="px-5 py-4">

                                    <div
                                        x-show="!editing"
                                        class="flex items-center gap-3"
                                    >

                                        <div
                                            class="flex h-9 w-9 shrink-0
                                            items-center justify-center
                                            rounded-lg bg-[#F1F5FF]"
                                        >

                                            <svg
                                                class="h-4 w-4 text-[#123B8F]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M4 21h16M6 21V9h12v12M9 9V5h6v4M9 13h2m2 0h2m-6 4h2m2 0h2"
                                                />

                                            </svg>

                                        </div>

                                        <span
                                            class="text-sm font-semibold
                                            text-slate-800"
                                        >
                                            {{ $unit->name }}
                                        </span>

                                    </div>


                                    {{-- EDIT --}}

                                    <input
                                        x-show="editing"
                                        x-cloak
                                        type="text"
                                        name="name"
                                        form="edit-unit-{{ $unit->id }}"
                                        x-model="name"
                                        required
                                        class="w-full rounded-xl
                                        border border-slate-300
                                        px-4 py-2.5 text-sm
                                        outline-none
                                        focus:border-[#123B8F]
                                        focus:ring-2
                                        focus:ring-[#123B8F]/10"
                                    >

                                </td>


                                {{-- VICARIATE --}}

                                <td class="px-5 py-4">

                                    <span
                                        x-show="!editing"
                                        class="inline-flex rounded-full
                                        bg-[#FFF8E5] px-3 py-1
                                        text-[10px] font-semibold
                                        text-[#9A7615]"
                                    >
                                        {{ $unit->vicariate?->name ?? 'Unassigned' }}
                                    </span>


                                    <select
                                        x-show="editing"
                                        x-cloak
                                        name="vicariate_id"
                                        form="edit-unit-{{ $unit->id }}"
                                        x-model="vicariate"
                                        required
                                        class="rounded-xl
                                        border border-slate-300
                                        bg-white px-3 py-2.5
                                        text-sm text-slate-700
                                        outline-none
                                        focus:border-[#123B8F]
                                        focus:ring-2
                                        focus:ring-[#123B8F]/10"
                                    >

                                        @foreach($vicariates as $vicariate)

                                            <option
                                                value="{{ $vicariate->id }}"
                                            >
                                                {{ $vicariate->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </td>


                                {{-- ACTIONS --}}

                                <td class="px-5 py-4">

                                    <div
                                        x-show="!editing"
                                        class="flex justify-end gap-2"
                                    >

                                        <button
                                            type="button"
                                            @click="editing = true"
                                            class="inline-flex items-center
                                            gap-1.5 rounded-lg border
                                            border-slate-200 px-3 py-2
                                            text-xs font-semibold
                                            text-[#123B8F]
                                            transition
                                            hover:bg-[#EEF3FF]"
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
                                                    d="M16.5 3.5a2.12 2.12 0 013 3L8 18l-4 1 1-4L16.5 3.5z"
                                                />

                                            </svg>

                                            Edit

                                        </button>


                                        <form
                                            method="POST"
                                            action="{{ route('admin.organization.units.destroy', $unit) }}"
                                            onsubmit="return confirm('Delete this unit?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center
                                                gap-1.5 rounded-lg border
                                                border-red-100 px-3 py-2
                                                text-xs font-semibold
                                                text-red-600
                                                transition hover:bg-red-50"
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
                                                        d="M6 7h12M9 7V4h6v3m-7 0l.7 13h6.6L16 7M10 11v5m4-5v5"
                                                    />

                                                </svg>

                                                Delete

                                            </button>

                                        </form>

                                    </div>


                                    {{-- EDIT ACTIONS --}}

                                    <form
                                        id="edit-unit-{{ $unit->id }}"
                                        method="POST"
                                        action="{{ route('admin.organization.units.update', $unit) }}"
                                        x-show="editing"
                                        x-cloak
                                        class="flex justify-end gap-2"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="rounded-xl bg-[#123B8F]
                                            px-4 py-2.5 text-xs
                                            font-semibold text-white
                                            transition
                                            hover:bg-[#0D2F73]"
                                        >
                                            Save
                                        </button>

                                        <button
                                            type="button"
                                            @click="editing = false"
                                            class="rounded-xl border
                                            border-slate-200 px-4 py-2.5
                                            text-xs font-semibold
                                            text-slate-600
                                            transition hover:bg-slate-50"
                                        >
                                            Cancel
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div
                class="flex min-h-[210px] flex-col
                items-center justify-center px-6 py-10
                text-center"
            >

                <div
                    class="flex h-12 w-12 items-center
                    justify-center rounded-full bg-[#F1F5FF]"
                >

                    <svg
                        class="h-6 w-6 text-[#123B8F]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M4 21h16M6 21V9h12v12M9 9V5h6v4"
                        />

                    </svg>

                </div>

                <p class="mt-4 text-sm font-semibold text-slate-800">
                    No units yet
                </p>

                <p class="mt-1 max-w-sm text-xs text-slate-500">
                    Units can be added after creating a vicariate.
                </p>

            </div>

        @endif

    </section>


    {{-- ========================================================= --}}
    {{-- ADMIN NOTICE --}}
    {{-- ========================================================= --}}

    <div
        class="flex items-start gap-3 rounded-xl
        border border-[#E5D49A] bg-[#FFFAF0] px-4 py-4"
    >

        <div
            class="flex h-9 w-9 shrink-0 items-center
            justify-center rounded-lg bg-[#FFF3C9]"
        >

            <svg
                class="h-5 w-5 text-[#B08A18]"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.7"
                    d="M12 9v4m0 4h.01M10.3 3.9l-7.4 13a2 2 0 001.74 3h14.72a2 2 0 001.74-3l-7.4-13a2 2 0 00-3.4 0z"
                />

            </svg>

        </div>

        <div>

            <p class="text-sm font-semibold text-[#765D17]">
                Administrator access
            </p>

            <p class="mt-1 text-xs leading-5 text-[#8A7024]">
                Changes made here affect the organization's structure.
                Add or update vicariates and units only when authorized
                by the Diocese.
            </p>

        </div>

    </div>

</div>

@endsection