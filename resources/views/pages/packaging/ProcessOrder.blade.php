<x-app-layout>
    <h1>
        Process Order
    </h1>

    <div class="w-full lg:w-1/2 mx-auto rounded-md bg-sky-600 shadow-lg m-20 p-10 text-center">
        <form class="flex items-center" enctype="multipart/form-data" method="post" action="/ProcessOrder/import_excel">
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

    <div class="relative overflow-x-auto pl-9 pr-9">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Process Order
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Number SKU
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
                @foreach ($pos as $po)
                    <tr class="bg-white border-b">
                        <td>{{ $po->po_id }}</td>
                        <td>{{ $po->number_material }}</td>
                        <td>{{ $po->shift }}</td>
                        <td>{{ $po->quantity }}</td>
                        <td>{{ $po->finish_date }}</td>
                        <td>
                            <form action="{{ route('ProcessOrder.destroy', $po->po_id) }}" method="POST">
                                {{-- <a class="btn btn-info"> show </a> --}}
                                <a class="btn btn-info" href="{{ route('ProcessOrder.edit', $po->po_id) }}">
                                    edit
                                </a>
                                {{-- <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a> --}}

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{ $pos->links() }}
        </table>
    </div>
</x-app-layout>
