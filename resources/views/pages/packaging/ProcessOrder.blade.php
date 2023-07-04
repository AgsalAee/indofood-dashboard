<x-app-layout>

    <head>

        {{-- @livewireStyles
        <style type="text/css">
            .datepicker {
                width: 200px;
                display: inline-block;
            }
        </style> --}}

        <link href="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" rel="stylesheet">

    </head>

    <body>

        <livewire:process-order-pagination />

        @livewireScripts
        @yield('scripts')

        <script src="../path/to/flowbite/dist/datepicker.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script> --}}
    </body>

</x-app-layout>
