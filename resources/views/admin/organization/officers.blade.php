@extends('layouts.admin')

@section('title', 'Diocesan Officers')

@section('content')

<div class="mx-auto max-w-7xl">

```
<div class="mb-8">

    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#B18B1F]">
        Organization
    </p>

    <h1 class="mt-2 text-2xl font-bold text-[#123B8F]">
        Diocesan Officers
    </h1>

    <p class="mt-2 text-sm text-slate-500">
        Manage the officers of the Catholic Women's League Diocese of Imus.
    </p>

</div>


<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 px-6 py-5">

        <h2 class="font-semibold text-[#123B8F]">
            Officers
        </h2>

    </div>

    @if($officers->count())

        <div class="divide-y divide-slate-100">

            @foreach($officers as $officer)

                <div class="flex items-center justify-between px-6 py-4">

                    <div>

                        <p class="font-medium text-slate-700">
                            {{ $officer->name }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ $officer->email }}
                        </p>

                    </div>

                    <span class="rounded-full bg-[#FFF8E5] px-3 py-1 text-[10px] font-semibold uppercase tracking-wide text-[#B18B1F]">
                        {{ $officer->role }}
                    </span>

                </div>

            @endforeach

        </div>

    @else

        <div class="px-6 py-12 text-center">

            <p class="text-sm font-medium text-slate-600">
                No diocesan officers found.
            </p>

            <p class="mt-1 text-xs text-slate-400">
                Officers can be added here once the organization data is ready.
            </p>

        </div>

    @endif

</div>
```

</div>

@endsection
