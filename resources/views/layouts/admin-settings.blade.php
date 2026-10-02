<x-admin-settings>

    <div class="mb-6">

        <p
            class="text-xs font-semibold uppercase
                   tracking-[0.18em] text-[#b08d20]"
        >
            Account Settings
        </p>

        <h2
            class="mt-1 font-serif text-3xl
                   font-semibold text-[#0b2e6f]"
        >
            Organization
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            View CWL organization information.
        </p>

    </div>


    <div
        class="grid gap-5
               lg:grid-cols-[250px_minmax(0,1fr)]"
    >

        <aside
            class="h-fit rounded-2xl border
                   border-slate-200 bg-white
                   p-2 shadow-sm"
        >

            <p
                class="px-4 pb-2 pt-3 text-[10px]
                       font-bold uppercase tracking-[0.18em]
                       text-slate-400"
            >
                Settings
            </p>


            <a
                href="{{ route('settings.profile') }}"
                class="flex rounded-xl px-4 py-3
                       text-sm text-slate-600
                       hover:bg-slate-50"
            >
                Profile
            </a>


            <a
                href="{{ route('settings.security') }}"
                class="mt-1 flex rounded-xl px-4 py-3
                       text-sm text-slate-600
                       hover:bg-slate-50"
            >
                Security
            </a>


            <a
                href="{{ route('settings.organization') }}"
                class="mt-1 flex rounded-xl bg-[#eef3ff]
                       px-4 py-3 text-sm font-semibold
                       text-[#0b2e6f]"
            >
                Organization
            </a>


            <a
                href="{{ route('settings.account') }}"
                class="mt-1 flex rounded-xl px-4 py-3
                       text-sm text-slate-600
                       hover:bg-slate-50"
            >
                Account
            </a>

        </aside>


        <section>

            <div
                class="overflow-hidden rounded-2xl
                       border border-slate-200
                       bg-white shadow-sm"
            >

                <div
                    class="border-b border-slate-200
                           bg-gradient-to-r from-[#f8faff]
                           via-white to-[#fffaf0]
                           px-6 py-6 sm:px-8"
                >

                    <h3
                        class="text-base font-semibold
                               text-[#0b2e6f]"
                    >
                        CWL Organization
                    </h3>

                    <p class="mt-1 text-xs text-slate-500">
                        General organization information.
                    </p>

                </div>


                <div class="divide-y divide-slate-200">

                    <div
                        class="flex flex-col gap-2 p-5
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <span class="text-sm text-slate-500">
                            Organization
                        </span>

                        <span class="font-semibold text-[#123B8F]">
                            Catholic Women's League
                        </span>

                    </div>


                    <div
                        class="flex flex-col gap-2 p-5
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <span class="text-sm text-slate-500">
                            Diocese
                        </span>

                        <span class="font-semibold text-[#123B8F]">
                            Diocese of Imus
                        </span>

                    </div>


                    <div
                        class="flex flex-col gap-2 p-5
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <span class="text-sm text-slate-500">
                            System
                        </span>

                        <span class="font-semibold text-[#123B8F]">
                            Organizational Records & Transparency
                        </span>

                    </div>


                    <div
                        class="flex flex-col gap-2 p-5
                               sm:flex-row sm:items-center
                               sm:justify-between"
                    >

                        <span class="text-sm text-slate-500">
                            Access Level
                        </span>

                        <span
                            class="inline-flex w-fit rounded-full
                                   bg-[#fff8e5] px-3 py-1
                                   text-xs font-semibold
                                   text-[#b08d20]"
                        >
                            {{ ucfirst(auth()->user()->role ?? 'Admin') }}
                        </span>

                    </div>

                </div>

            </div>

        </section>

    </div>


    <footer class="mt-8 pb-4 text-center">

        <p class="text-[11px] text-slate-400">
            CWL Diocese of Imus · Organizational Records
            and Transparency Management System
        </p>

    </footer>

</x-admin-settings>