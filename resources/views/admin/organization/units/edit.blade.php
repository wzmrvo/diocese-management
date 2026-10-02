@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-50 px-6 py-8">

    <div class="mx-auto max-w-3xl">

        {{-- BACK --}}
        <a
            href="{{ route('admin.organization.units.index') }}"
            class="mb-6 inline-flex items-center gap-2 text-sm font-semibold text-[#102A43] transition hover:text-[#0b2033]"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 19l-7-7 7-7"
                />
            </svg>

            Back to Units
        </a>


        {{-- HEADER --}}
        <div class="mb-8">

            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#102A43]">
                Organization
            </p>

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
                Edit Unit
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Update the organizational unit information.
            </p>

        </div>


        {{-- ERRORS --}}
        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

                <div class="flex gap-3">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-0.5 h-5 w-5 shrink-0 text-red-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m0 3h.008v.008H12V15.75zM10.29 3.86l-8.12 14A2 2 0 003.9 20.86h16.2a2 2 0 001.73-3l-8.12-14a2 2 0 003.42 0z"
                        />
                    </svg>

                    <div>

                        <p class="font-semibold text-red-800">
                            Please check the following:
                        </p>

                        <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- FLASH ERROR --}}
        @if(session('error'))

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-800">
                {{ session('error') }}
            </div>

        @endif


        {{-- FORM CARD --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- CARD HEADER --}}
            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#F4D77D]/30 text-lg font-bold text-[#765F16]">
                        {{ strtoupper(substr($unit->name, 0, 1)) }}
                    </div>

                    <div>

                        <h2 class="font-bold text-slate-900">
                            {{ $unit->name }}
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Organizational Unit
                        </p>

                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                method="POST"
                action="{{ route('admin.organization.units.update', $unit) }}"
                class="p-6"
            >

                @csrf
                @method('PATCH')


                {{-- UNIT NAME --}}
                <div>

                    <label
                        for="name"
                        class="block text-sm font-semibold text-slate-700"
                    >
                        Unit Name
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $unit->name) }}"
                        required
                        maxlength="255"
                        class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#102A43] focus:ring-2 focus:ring-[#102A43]/10"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- VICARIATE --}}
                <div class="mt-6">

                    <label
                        for="vicariate_id"
                        class="block text-sm font-semibold text-slate-700"
                    >
                        Vicariate
                    </label>

                    <select
                        id="vicariate_id"
                        name="vicariate_id"
                        required
                        class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#102A43] focus:ring-2 focus:ring-[#102A43]/10"
                    >

                        @foreach($vicariates as $vicariate)

                            <option
                                value="{{ $vicariate->id }}"
                                @selected(old('vicariate_id', $unit->vicariate_id) == $vicariate->id)
                            >
                                {{ $vicariate->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('vicariate_id')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ACTIONS --}}
                <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

                    {{-- ONLY DELETE BUTTON --}}
                    <a
                        href="{{ route('admin.organization.units.delete', $unit) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-semibold text-red-700 transition hover:border-red-300 hover:bg-red-100"
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
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h12"
                            />
                        </svg>

                        Delete Unit

                    </a>


                    <div class="flex flex-col gap-3 sm:flex-row">

                        <a
                            href="{{ route('admin.organization.units.index') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#102A43] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#0b2033]"
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
                                    d="M5 12.5l4 4L19 7.5"
                                />
                            </svg>

                            Save Changes

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection