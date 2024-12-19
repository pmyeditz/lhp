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
                                <h5 class="card-title">Produksi</h5>
                            </div>
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
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Produksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('produksis.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                                                <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="cpo_diproduksi" class="form-label">CPO Diproduksi</label>
                                                <input type="number" class="form-control" id="cpo_diproduksi" name="cpo_diproduksi" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kernel_diproduksi" class="form-label">Kernel Diproduksi</label>
                                                <input type="number" class="form-control" id="kernel_diproduksi" name="kernel_diproduksi" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ffa" class="form-label">FFA</label>
                                                <input type="text" class="form-control" id="ffa" name="ffa" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="total_produksi" class="form-label">Total Produksi</label>
                                                <input type="number" class="form-control" id="total_produksi" name="total_produksi" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah Produksi</button>
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
                        <!-- Produksi Table -->
                        <div class="table-responsive p-4 mt-3">
                            <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kode Produksi</th>
                                    <th>Tanggal Produksi</th>
                                    <th>CPO Diproduksi</th>
                                    <th>Kernel Diproduksi</th>
                                    <th>FFA</th>
                                    <th>Total Produksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produksis as $produksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $produksi->nama }}</td>
                                        <td>{{ $produksi->kode_produksi }}</td>
                                        <td>{{ $produksi->tanggal_produksi }}</td>
                                        <td>{{ $produksi->cpo_diproduksi }}</td>
                                        <td>{{ $produksi->kernel_diproduksi }}</td>
                                        <td>{{ $produksi->ffa }}</td>
                                        <td>{{ $produksi->total_produksi }}</td>
                                        <td>
                                            <a href="#modalEdit{{ $produksi->id }}" data-bs-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('produksis.destroy', $produksi->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <!-- Trigger Modal -->
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $produksi->id }}">Delete</button>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal{{ $produksi->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $produksi->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $produksi->id }}">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus produksi ini? Aksi ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEdit{{ $produksi->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $produksi->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditLabel{{ $produksi->id }}">Edit Produksi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('produksis.update', $produksi->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $produksi->nama }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                                            <input type="text" class="form-control" id="kode_produksi" name="kode_produksi" value="{{ $produksi->kode_produksi }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                                                            <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" value="{{ $produksi->tanggal_produksi }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="cpo_diproduksi" class="form-label">CPO Diproduksi</label>
                                                            <input type="number" class="form-control" id="cpo_diproduksi" name="cpo_diproduksi" value="{{ $produksi->cpo_diproduksi }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kernel_diproduksi" class="form-label">Kernel Diproduksi</label>
                                                            <input type="number" class="form-control" id="kernel_diproduksi" name="kernel_diproduksi" value="{{ $produksi->kernel_diproduksi }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="ffa" class="form-label">FFA</label>
                                                            <input type="text" class="form-control" id="ffa" name="ffa" value="{{ $produksi->ffa }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="total_produksi" class="form-label">Total Produksi</label>
                                                            <input type="number" class="form-control" id="total_produksi" name="total_produksi" value="{{ $produksi->total_produksi }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Produksi</button>
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
