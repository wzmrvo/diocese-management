@extends('layouts.admin')

@section('title', 'Account Requests')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Requests | CWL Diocese of Imus</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-stone-50 text-stone-800">

    <nav class="border-b border-stone-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            <div>
                <p class="text-sm font-medium text-emerald-700">
                    CWL Diocese of Imus
                </p>

                <h1 class="text-xl font-semibold text-emerald-950">
                    Account Requests
                </h1>
            </div>

            <a
                href="{{ route('admin.dashboard') }}"
                class="rounded-lg px-4 py-2 text-sm font-medium
                       text-stone-600 hover:bg-stone-100"
            >
                Back to Dashboard
            </a>

        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-6 py-10">

        {{-- Success message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200
                        bg-emerald-50 px-5 py-4 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error message --}}
        @if (session('error'))
            <div class="mb-6 rounded-xl border border-red-200
                        bg-red-50 px-5 py-4 text-sm text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-8">
            <p class="text-sm font-medium text-emerald-700">
                Verification
            </p>

            <h2 class="mt-1 text-3xl font-semibold text-emerald-950">
                Pending Account Requests
            </h2>

            <p class="mt-2 text-stone-500">
                Review membership requests before allowing users to access
                the CWL organizational system.
            </p>
        </div>

        {{-- Pending count --}}
        <div class="mb-6 rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-stone-500">
                Pending Requests
            </p>

            <p class="mt-1 text-3xl font-semibold text-emerald-950">
                {{ $requests->count() }}
            </p>
        </div>

        @if ($requests->isEmpty())

            <div class="rounded-2xl border border-stone-200 bg-white p-10 text-center shadow-sm">

                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center
                            rounded-full bg-emerald-50 text-emerald-700">
                    ✓
                </div>

                <h3 class="text-lg font-semibold text-emerald-950">
                    No pending requests
                </h3>

                <p class="mt-2 text-sm text-stone-500">
                    All account requests have been reviewed.
                </p>

            </div>

        @else

            <div class="space-y-4">

                @foreach ($requests as $request)

                    <div class="rounded-2xl border border-stone-200
                                bg-white p-6 shadow-sm">

                        <div class="flex flex-col gap-6 lg:flex-row
                                    lg:items-center lg:justify-between">

                            <div>

                                <h3 class="text-lg font-semibold text-emerald-950">
                                    {{ $request->name }}
                                </h3>

                                <p class="mt-1 text-sm text-stone-500">
                                    {{ $request->email }}
                                </p>

                                <div class="mt-4 flex flex-wrap gap-2">

                                    <span class="rounded-full bg-stone-100
                                                 px-3 py-1 text-xs font-medium
                                                 capitalize text-stone-700">
                                        {{ $request->organization_level }}
                                    </span>

                                    <span class="rounded-full bg-stone-100
                                                 px-3 py-1 text-xs font-medium
                                                 capitalize text-stone-700">
                                        {{ str_replace('_', ' ', $request->position) }}
                                    </span>

                                    @if ($request->vicariate)
                                        <span class="rounded-full bg-stone-100
                                                     px-3 py-1 text-xs font-medium
                                                     text-stone-700">
                                            {{ $request->vicariate }}
                                        </span>
                                    @endif

                                    @if ($request->unit)
                                        <span class="rounded-full bg-stone-100
                                                     px-3 py-1 text-xs font-medium
                                                     text-stone-700">
                                            {{ $request->unit }}
                                        </span>
                                    @endif

                                </div>

                            </div>

                            <div class="flex gap-3">

                                {{-- Approve --}}
                                <form
                                    method="POST"
                                    action="{{ route(
                                        'admin.account-requests.approve',
                                        $request
                                    ) }}"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-emerald-700
                                               px-5 py-2.5 text-sm font-medium
                                               text-white hover:bg-emerald-800"
                                    >
                                        Approve
                                    </button>
                                </form>

                                {{-- Reject --}}
                                <form
                                    method="POST"
                                    action="{{ route(
                                        'admin.account-requests.reject',
                                        $request
                                    ) }}"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-red-200
                                               px-5 py-2.5 text-sm font-medium
                                               text-red-700 hover:bg-red-50"
                                    >
                                        Reject
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </main>

</body>

</html>
@endsection