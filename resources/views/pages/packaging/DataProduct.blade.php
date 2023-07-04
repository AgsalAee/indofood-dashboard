<x-app-layout>
    <div class="relative">
        <div class="absolute top-0 right-0">
            <!-- Your content here -->
            <div class="w-full mx-auto rounded-md bg-sky-600 shadow-lg text-center top-0 right-0">
                <form class="flex items-center space-x-6" enctype="multipart/form-data" method="post"
                    action="/DataProduct/import_excel">
                    <div>
                        {{ csrf_field() }}
                        <label class="block">
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
        </div>

        <div>
            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
                href={{ route('DataProduct.create') }}>
                <button
                    class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 rounded-md mr-4">
                    create item
                </button>
            </a>
        </div>

        <div class="relative overflow-x-auto pl-9 pr-9">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kode Material
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Isi Perdus
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot Bumbu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot Tambahan (Cabe)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot Bawang Gor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot SI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot Etiket
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Bobot FG
                        </th>
                        <th scope="col" class="px-6 py-3">
                            RPM
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pitch
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b">
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_total }}</td>
                            <td>{{ $mix = $product->product_mix_weight }}</td>
                            <td>{{ $add = $product->product_addition_weight }}</td>
                            <td>{{ $bg = $product->product_bg_weight }}</td>
                            <td>{{ $si = $product->product_si_weight }}</td>
                            <td>{{ $eq = $product->product_etiquete_weight }}</td>
                            <td>{{ $tot = $mix + $add + $si + $eq + $bg }}</td>
                            <td>{{ $product->product_RPM }}</td>
                            <td>{{ $product->product_pitch }}</td>
                            <td>
                                <form action="{{ route('DataProduct.destroy', $product->product_id) }}" method="POST">
                                    <a class="btn btn-info"
                                        href="{{ route('DataProduct.edit', $product->product_id) }}">
                                        edit
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $products->links() }}
            </table>
        </div>
    </div>
    {{-- pakai datatables --}}
    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:data_products />
                </div>
            </div>
        </div>
    </div> --}}

</x-app-layout>
