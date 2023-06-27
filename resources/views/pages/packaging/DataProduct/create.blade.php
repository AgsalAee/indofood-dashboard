<x-app-layout>
    <div action="{{ route('DataProduct.create') }}">
        <form action="{{ route('DataProduct.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group">
                    <strong>Kode SKU:</strong>
                    <input type="text" name="product_id" class="form-control" placeholder="Kode SKU">
                </div>
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <strong>Total PCS Per Box:</strong>
                    <input type="text" name="product_total" class="form-control" placeholder="Total PCS Per Box">
                </div>
                <div class="form-group">
                    <strong>Bobot Sauce:</strong>
                    <input type="text" name="product_mix_weight" class="form-control" placeholder="Bobot Sauce">
                </div>
                <div class="form-group">
                    <strong>Bobot Cabe:</strong>
                    <input type="text" name="product_addition_weight" class="form-control"
                        placeholder="Bobot Cabe (Jika tidak ada kosongkan/beri 0)">
                </div>
                <div class="form-group">
                    <strong>Bobot SI dan BG:</strong>
                    <input type="text" name="product_si_weight" class="form-control"
                        placeholder="Bobot BG (Jika tidak ada kosongkan/beri 0)">
                </div>
                <div class="form-group">
                    <strong>Bobot SI dan BG:</strong>
                    <input type="text" name="product_si_weight" class="form-control"
                        placeholder="Bobot SI (Jika tidak ada kosongkan/beri 0)">
                </div>
                <div class="form-group">
                    <strong>Bobot Etiquete:</strong>
                    <input type="text" name="product_etiquete_weight" class="form-control"
                        placeholder="Bobot Plastik Etiket">
                </div>
                <div class="form-group">
                    <strong>RPM:</strong>
                    <input type="text" name="product_RPM" class="form-control" placeholder="RPM">
                </div>
                <div class="form-group">
                    <strong>Pitch:</strong>
                    <input type="text" name="product_pitch" class="form-control" placeholder="Pitch">
                </div>
            </div>
            <button
                class="px-4 py-2 bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-md mr-4">
                send item
            </button>
        </form>
    </div>
</x-app-layout>
