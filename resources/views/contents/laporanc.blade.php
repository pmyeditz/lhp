<x-main>
    @section('content')
        <x-header />
        <x-sidebar />

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-4 justify-content-between">
                            <div class="row">
                                <h5 class="card-title">Laporan Harian Produksi</h5>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('laporan.export') }}" class="btn btn-success">
                                    Ekspor ke Excel
                                </a>
                            </div>
                        </div>
                        <hr class="bg-dark">

                        <!-- Tabel Data -->
                        <div class="table-responsive p-4 mt-3">
                            <table class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemasok</th>
                                        <th>Hari Ini (Kg)</th>
                                        <th>S/D Hari Ini (Kg)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $index => $supplier)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $supplier->nama_pemasok }}</td>
                                            <td>{{ number_format($supplier->hari_ini) }} kg</td>
                                            <td>{{ number_format($supplier->sd_hari_ini) }} kg</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-main>
