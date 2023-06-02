<x-app-layout>
    <div class="w-3/4 lg:w-1/2 mx-auto rounded-md bg-gray-200 shadow-lg m-20 p-10 text-center">
        <form class="flex items-center space-x-6" enctype="multipart/form-data" method="post"
            action="/PackingReport/import_excel">
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
                    hover:file:bg-violet-100
                  " />
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
                    href="https://twitter.com/digitalocean">button 1</a></div>
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://www.linkedin.com/company/digitalocean">button 2</a></div>
            <div class="px-4 py-2 bg-blue-600 text-gray-100 rounded-md mr-4 hover:bg-blue-700"><a
                    href="https://instagram.com/thedigitalocean">button 3</a></div>
        </div> --}}
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
                        Dus Shift 1
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dus Shift 2
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr class="bg-white border-b">
                        <td class="pl-5">{{ $report->product_id }}</td>
                        <td class="pl-5">{{ $report->name_product }}</td>
                        <td class="pl-5">{{ $report->total_product }}</td>
                        <td class="pl-5">{{ $report->packing_boxShA }}</td>
                        <td class="pl-5">{{ $report->packing_boxShB }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reports->links() }}
    </div>
</x-app-layout>
