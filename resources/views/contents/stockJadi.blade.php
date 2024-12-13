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
                                <h5 class="card-title">Stock Jadi</h5>
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
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Stock Jadi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('stockJadi.store') }}" method="POST">
                                        @csrf
                                        <!-- Form Tambah Stock Jadi -->
                                        <div class="modal-body">
                                            <!-- Form input fields for Stock Jadi -->
                                            <div class="form-group">
                                                <label for="jenis_produk">Jenis Produk</label>
                                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="stok_akhir">Stok Akhir</label>
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
                                        <th>Stok Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stockJadis as $index => $stockJadi)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $stockJadi->jenis_produk }}</td>
                                            <td>{{ $stockJadi->stok_akhir }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $stockJadi->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('stockJadi.destroy', $stockJadi->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit{{ $stockJadi->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $stockJadi->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditLabel{{ $stockJadi->id }}">Edit Data Stock Jadi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('stockJadi.update', $stockJadi->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="jenis_produk">Jenis Produk</label>
                                                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" value="{{ $stockJadi->jenis_produk }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="stok_akhir">Stok Akhir</label>
                                                                <input type="number" class="form-control" id="stok_akhir" name="stok_akhir" value="{{ $stockJadi->stok_akhir }}" required>
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
