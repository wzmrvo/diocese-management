@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-50 px-6 py-10">


<div class="mx-auto flex max-w-xl justify-center">

    <div class="w-full">

        <a
            href="{{ route('admin.organization.units.index') }}"
            class="mb-5 inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#102A43]"
        >
            ← Back to Units
        </a>


        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- HEADER --}}
            <div class="border-b border-slate-200 bg-[#102A43] px-7 py-6">

                <p class="text-xs font-semibold uppercase tracking-wider text-[#F4D77D]">
                    Organization
                </p>

                <h1 class="mt-1 text-2xl font-bold text-white">
                    Add Unit
                </h1>

                <p class="mt-2 text-sm text-white/65">
                    Create a unit and assign it to a vicariate.
                </p>

            </div>


            <form
                method="POST"
                action="{{ route('admin.organization.units.store') }}"
                class="space-y-6 p-7"
            >

                @csrf


                {{-- VICARIATE --}}
                <div>

                    <label
                        for="vicariate_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Vicariate
                    </label>

                    <select
                        id="vicariate_id"
                        name="vicariate_id"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#102A43] focus:ring-2 focus:ring-[#102A43]/10"
                    >

                        <option value="">
                            Select a vicariate
                        </option>

                        @foreach($vicariates as $vicariate)

                            <option
                                value="{{ $vicariate->id }}"
                                @selected(old('vicariate_id') == $vicariate->id)
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


                {{-- NAME --}}
                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Unit Name
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="Enter unit name"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#102A43] focus:ring-2 focus:ring-[#102A43]/10"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ACTIONS --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.organization.units.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-[#102A43] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#0b2033]"
                    >
                        Create Unit
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</div>

@endsection