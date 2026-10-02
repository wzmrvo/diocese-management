@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-50 px-6 py-8">

    <div class="mx-auto max-w-xl">

        {{-- BACK --}}
        <a
            href="{{ route('admin.organization.units.edit', $unit) }}"
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

            Back to Edit Unit
        </a>


        {{-- CARD --}}
        <div class="overflow-hidden rounded-2xl border border-red-200 bg-white shadow-sm">

            {{-- WARNING --}}
            <div class="border-b border-red-100 bg-red-50 px-6 py-6">

                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

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
                                d="M12 9v3.75m0 3h.008v.008H12V15.75zM10.29 3.86l-8.12 14A2 2 0 003.9 20.86h16.2a2 2 0 001.73-3l-8.12-14a2 2 0 003.42 0z"
                            />
                        </svg>

                    </div>

                    <div>

                        <h1 class="text-xl font-bold text-red-900">
                            Delete Unit
                        </h1>

                        <p class="mt-1 text-sm text-red-700">
                            This action permanently removes the unit.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                {{-- UNIT INFORMATION --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Unit
                    </p>

                    <p class="mt-1 text-lg font-bold text-slate-900">
                        {{ $unit->name }}
                    </p>

                    @if($unit->vicariate)

                        <p class="mt-1 text-sm text-slate-500">
                            {{ $unit->vicariate->name }}
                        </p>

                    @endif

                </div>


                {{-- PASSWORD --}}
                <form
                    method="POST"
                    action="{{ route('admin.organization.units.destroy', $unit) }}"
                    class="mt-6"
                >

                    @csrf
                    @method('DELETE')


                    <div>

                        <label
                            for="password"
                            class="block text-sm font-semibold text-slate-700"
                        >
                            Admin Password
                        </label>

                        <p class="mt-1 text-sm text-slate-500">
                            Enter your current admin password to confirm this deletion.
                        </p>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            class="mt-3 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-500/10"
                        >

                        @error('password')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- FINAL ACTION --}}
                    <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                        <a
                            href="{{ route('admin.organization.units.edit', $unit) }}"
                            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700"
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

                            Confirm Permanent Deletion

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection