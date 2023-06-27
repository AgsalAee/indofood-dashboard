<x-app-layout>
    <div class="w-3/4 lg:w-1/2 mx-auto rounded-md bg-gray-200 shadow-lg m-20 p-10 text-center">
        <form class="flex items-center space-x-6" enctype="multipart/form-data" method="post"
            action="/DataProduct/import_excel">
            <div>
                {{ csrf_field() }}
                <label class="block">
                    <span class="sr-only">Choose profile photo</span>
                    <input type="file" name="file" required="required"
                        class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-violet-50 file:text-violet-700
                    hover:file:bg-violet-100" />
                </label>
            </div>
            <button
                class="px-4 py-2 bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md mr-4">
                Import
            </button>
            {{-- <button type="submit" class="btn btn-primary">IMPORT</button> --}}
        </form>
        {{-- <div class="py-3 grid grid-cols-1 md:grid-cols-3 grid-flow-row gap-6">
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="DataMaterial/Create">create</a></div>
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://www.linkedin.com/company/digitalocean">LinkedIn</a></div>
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://instagram.com/thedigitalocean">Instagram</a></div>
        </div> --}}
    </div>
    <div>
        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate"
            href={{ route('DataProduct.create') }}>
            <button
                class="px-4 py-2 bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md mr-4">
                create item
            </button>
        </a>
    </div>

    {{-- <div class="w-3/4 lg:w-1/2 mx-auto rounded-md bg-gray-200 shadow-lg m-20 p-10 text-center"> --}}
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
                                {{-- <a class="btn btn-info"> show </a> --}}
                                <a class="btn btn-info" href="{{ route('DataProduct.edit', $product->product_id) }}">
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
            {{ $products->links() }}
        </table>
    </div>

</x-app-layout>
