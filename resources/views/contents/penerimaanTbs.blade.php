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
                                <h5 class="card-title">Penerimaan TBS</h5>
                            </div>
                        </div>
                        <hr class="bg-dark">

                        <!-- Table -->
                        <div class="table-responsive p-4 mt-3">
                            <form method="GET" action="" class="mb-3">
                                <div class="d-flex justify-content-between col-md-2">
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ request()->input('tanggal', now()->toDateString()) }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-3 align-self-center">Filter</button>
                                </div>
                            </form>
                            <table id="example" class="contoh table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Penerimaan</th>
                                        <th>Tanggal</th>
                                        <th>Stok Awal</th>
                                        <th>Total Penerimaan</th>
                                        <th>Jumlah Persediaan</th>
                                        <th>Potongan</th>
                                        <th>TBS Proses Netto</th>
                                        <th>Stok Akhir</th>
                                        <th>Persen</th>
                                    </tr>
                                </thead>
                                <tbody>
    @forelse ($penerimaanTbs as $index => $pItem)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pItem->penerimaan }}</td>
            <td>{{ $pItem->tanggal }}</td>
            <td>{{ $pItem->sisa_stock_awal }}</td>
            <td>{{ $pItem->total_penerimaan }}</td>
            <td>{{ $pItem->jumlah_persediaan }}</td>
            <td>{{ $pItem->potongan }}</td>
            <td>{{ $pItem->tbs_proses_netto }}</td>
            <td>{{ $pItem->sisa_stock_akhir }}</td>
            <td>{{ $pItem->persen }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="10" class="text-center">Tidak ada data untuk tanggal {{ request('tanggal') }}</td>
        </tr>
    @endforelse
</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-main>
