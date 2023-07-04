<div class="relative">
    <div class="mx-auto rounded-md bg-sky-600 shadow-lg text-center">
        <form class="flex items-center" enctype="multipart/form-data" method="post" action="/ProcessOrder/import_excel">
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
    {{-- <div class="w-full lg:w-1/2 mx-auto rounded-md bg-sky-600 shadow-lg m-20 p-10 text-center">
        <form class="flex items-center" enctype="multipart/form-data" method="post" action="/ProcessOrder/import_excel">
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
    </div> --}}
    {{-- <div class="w-3/4 lg:w-1/2 mx-auto rounded-md bg-gray-200 shadow-lg m-20 p-10 text-center">
        <a href="/PackagingPO/export_excel" class="bg-sky-600 hover:bg-sky-700 px-5 py-3 text-white rounded-lg"
            target="_blank">EXPORT EXCEL</a>
    </div> --}}

    <div class="relative overflow-x-auto pl-9 pr-9 pt-5">

        <div date-rangepicker class="flex items-center">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="start" type="text" id="from_date" wire:model="from_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date start">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="end" type="text" id="to_date" wire:model="to_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date end">
            </div>
        </div>
        {{-- <div class="search-filter">
            <input type="text" class="datepicker" id="from_date" wire:model="from_date">
            <input type="text" class="datepicker" id="to_date" wire:model="to_date">
        </div> --}}

        <table class="w-full text-sm text-center text-white">
            <thead class="text-s font-semibold text-indigo-500 uppercase bg-slate-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Process Order
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Material Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Shift
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Finish Date
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($pos->count())
                    @foreach ($pos as $po)
                        <tr class="bg-slate-700 border-b">
                            <td>{{ $po->po_id }}</td>
                            <td>{{ $po->number_material }}</td>
                            <td>{{ $po->shift }}</td>
                            <td>{{ $nbr = number_format($po->quantity) }}</td>
                            <td>{{ $po->finish_date }}</td>
                            <td>
                                <form action="{{ route('ProcessOrder.destroy', $po->po_id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('ProcessOrder.edit', $po->po_id) }}">
                                        edit
                                    </a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No record found</td>
                    </tr>
                @endif
            </tbody>
            {{ $pos->links() }}
        </table>
    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#from_date").datepicker({
                dateFormat: "yyyy-mm-dd",
                changeYear: true,
                changeMonth: true,
                onSelect: function(selected) {
                    var dt = new Date(selected);

                    @this.set('from_date', selected);

                    dt.setDate(dt.getDate() + 1);
                    $("#to_date").datepicker("option", "minDate", dt);
                }
            });

            $("#to_date").datepicker({
                dateFormat: "yyyy-mm-dd",
                changeYear: true,
                changeMonth: true,
                onSelect: function(selected) {
                    var dt = new Date(selected);

                    @this.set('to_date', selected);

                    dt.setDate(dt.getDate() - 1);
                    $("#from_date").datepicker("option", "maxDate", dt);
                }
            });
        });
    </script>
@endsection
