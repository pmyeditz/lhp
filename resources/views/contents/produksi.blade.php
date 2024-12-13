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
                                                <label for="nama" class="form-label">Nama Produksi</label>
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Tampilkan Pesan Sukses atau Error --}}
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
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produksi</th>
                                        <th>Kode Produksi</th>
                                        <th>Tanggal Produksi</th>
                                        <th>CPO Diproduksi</th>
                                        <th>Kernel Diproduksi</th>
                                        <th>FFA</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produksis as $index => $produksi)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $produksi->nama }}</td>
                                            <td>{{ $produksi->kode_produksi }}</td>
                                            <td>{{ $produksi->tanggal_produksi }}</td>
                                            <td>{{ $produksi->cpo_diproduksi }}</td>
                                            <td>{{ $produksi->kernel_diproduksi }}</td>
                                            <td>{{ $produksi->ffa }}</td>
                                            <td>{{ $produksi->total_produksi }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $produksi->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('produksis.destroy', $produksi->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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
                                                                <label for="nama" class="form-label">Nama Produksi</label>
                                                                <input type="text" class="form-control" name="nama" value="{{ $produksi->nama }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                                                <input type="text" class="form-control" name="kode_produksi" value="{{ $produksi->kode_produksi }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                                                                <input type="date" class="form-control" name="tanggal_produksi" value="{{ $produksi->tanggal_produksi }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="cpo_diproduksi" class="form-label">CPO Diproduksi</label>
                                                                <input type="number" class="form-control" name="cpo_diproduksi" value="{{ $produksi->cpo_diproduksi }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kernel_diproduksi" class="form-label">Kernel Diproduksi</label>
                                                                <input type="number" class="form-control" name="kernel_diproduksi" value="{{ $produksi->kernel_diproduksi }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="ffa" class="form-label">FFA</label>
                                                                <input type="text" class="form-control" name="ffa" value="{{ $produksi->ffa }}" required>
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
