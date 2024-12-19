<x-main>
    @section('content')
        <x-header />
        <x-sidebar />

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-4 justify-content-between">
                            <div>
                                <h5 class="card-title">Laporan Penerimaan</h5>
                            </div>
                            <div>
                                <a href="{{ route('laporan.export') }}" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Excel
                                </a>
                                <a href="{{ route('laporan.pdf', ['start_date' => request('start_date')]) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-file-pdf"></i> PDF
                                </a>
                            </div>
                        </div>
                        <hr class="bg-dark">


                        <!-- Tabel Data -->
                        <div class="table-responsive p-4 mt-3">
                            <!-- Form Filter -->
                            <form action="{{ route('laporans.index') }}" method="GET" class="mb-4">
                                <div class="d-flex">
                                    <div class="mr-3">
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Penerimaan</th>
                                        <th>Nama Pemasok</th>
                                        <th>Tanggal Diterima</th>
                                        <th>Berat Diterima (kg)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penerimaans as $index => $penerimaan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $penerimaan->kode_penerimaan }}</td>
                                            <td>{{ $penerimaan->pemasok->nama_pemasok ?? '-' }}</td>
                                            <td>{{ $penerimaan->tanggal_diterima }}</td>
                                            <td>{{ $penerimaan->berat_diterima }} Kg</td>
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
