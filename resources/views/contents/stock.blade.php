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
                                <h5 class="card-title">Stock</h5>
                            </div>
                            <!-- Tombol Tambah Data -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="ri-add-circle-line"></i> Add
                            </button>
                        </div>
                        <hr class="bg-dark">

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Stock</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('stocks.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="stok_awal" class="form-label">Stok Awal</label>
                                                <input type="number" class="form-control" id="stok_awal" name="stok_awal" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="stok_akhir" class="form-label">Stok Akhir</label>
                                                <input type="number" class="form-control" id="stok_akhir" name="stok_akhir" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Tampilkan pesan --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Table -->
                        <div class="table-responsive p-4 mt-3">
                            <table id="example" class="contoh table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Produk</th>
                                        <th>Stok Awal</th>
                                        <th>Stok Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $index => $stock)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $stock->jenis_produk }}</td>
                                            <td>{{ $stock->stok_awal }}</td>
                                            <td>{{ $stock->stok_akhir }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $stock->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit{{ $stock->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $stock->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditLabel{{ $stock->id }}">Edit Data Stock</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="jenis_produk" class="form-label">Jenis Produk</label>
                                                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" value="{{ $stock->jenis_produk }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="stok_awal" class="form-label">Stok Awal</label>
                                                                <input type="number" class="form-control" id="stok_awal" name="stok_awal" value="{{ $stock->stok_awal }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="stok_akhir" class="form-label">Stok Akhir</label>
                                                                <input type="number" class="form-control" id="stok_akhir" name="stok_akhir" value="{{ $stock->stok_akhir }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
