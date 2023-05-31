<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- <!-- Welcome banner -->
        <x-dashboard.welcome-banner /> --}}

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            {{-- <!-- Left: Avatars -->
            <x-dashboard.dashboard-avatars /> --}}

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                {{-- <!-- Filter button -->
                <x-dropdown-filter align="right" />

                <!-- Datepicker built with flatpickr -->
                <x-datepicker /> --}}

                {{-- <!-- Add view button -->
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Add View</span>
                </button> --}}

            </div>

        </div>

        <!-- Cards -->
        {{-- <div class="grid grid-cols-12 gap-6"> --}}
        <div class="w-full lg:w-1/2 mx-auto rounded-md bg-sky-600 shadow-lg m-20 p-10 text-center">
            <form class="flex items-center" enctype="multipart/form-data" method="post" action="/PackagingPO/import_excel">
                {{-- <div class="shrink-0">
                        <img class="h-16 w-16 object-cover rounded-full"
                            src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"
                            alt="Current profile photo" />
                    </div> --}}
                <div class="w-full">
                    {{ csrf_field() }}
                    <label class="block">
                        <span class="sr-only">Choose Excel File</span>
                        <input type="file" name="file" required="required"
                            class="block w-full text-md text-white
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100" />
                    </label>
                </div>
                <button type="submit" class="btn btn-primary text-red-700 bg-white rounded-full">IMPORT</button>

            </form>
        </div>
        <div class="w-3/4 lg:w-1/2 mx-auto rounded-md bg-gray-200 shadow-lg m-20 p-10 text-center">
            <a href="/PackagingPO/export_excel" class="bg-sky-600 hover:bg-sky-700 px-5 py-3 text-white rounded-lg"
                target="_blank">EXPORT EXCEL</a>
        </div>

        {{-- </div> --}}

    </div>
</x-app-layout>
