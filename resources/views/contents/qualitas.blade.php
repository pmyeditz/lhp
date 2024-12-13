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
                                <h5 class="card-title">Qualitas</h5>
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
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Qualitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Form Tambah Qualitas -->
                                    <form action="{{ route('qualitases.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <!-- Form Input untuk Qualitas -->
                                            <div class="mb-3">
                                                <label for="id_produksi" class="form-label">Produksi</label>
                                                <select class="form-control" id="id_produksi" name="id_produksi" required>
                                                    <option value="">Pilih Produksi</option>
                                                    @foreach ($produksis as $produksi)
                                                        <option value="{{ $produksi->id }}">{{ $produksi->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ffa" class="form-label">FFA</label>
                                                <input type="number" class="form-control" id="ffa" name="ffa" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kadar_air" class="form-label">Kadar Air</label>
                                                <input type="number" class="form-control" id="kadar_air" name="kadar_air" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kotoran" class="form-label">Kotoran</label>
                                                <input type="number" class="form-control" id="kotoran" name="kotoran" required>
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
                                        <th>Nama Produksi</th>
                                        <th>FFA</th>
                                        <th>Kadar Air</th>
                                        <th>Kotoran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($qualitases as $index => $qualitas)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $qualitas->produksi->nama ?? 'Tidak Diketahui' }}</td>
                                            <td>{{ $qualitas->ffa }}</td>
                                            <td>{{ $qualitas->kadar_air }}</td>
                                            <td>{{ $qualitas->kotoran }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $qualitas->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('qualitases.destroy', $qualitas->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit{{ $qualitas->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $qualitas->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditLabel{{ $qualitas->id }}">Edit Qualitas</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- Form Edit Qualitas -->
                                                    <form action="{{ route('qualitases.update', $qualitas->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <!-- Form Input untuk Qualitas -->
                                                            <div class="mb-3">
                                                                <label for="id_produksi" class="form-label">Produksi</label>
                                                                <select class="form-control" id="id_produksi" name="id_produksi" required>
                                                                    <option value="">Pilih Produksi</option>
                                                                    @foreach ($produksis as $produksi)
                                                                        <option value="{{ $produksi->id }}" {{ $produksi->id == $qualitas->id_produksi ? 'selected' : '' }}>
                                                                            {{ $produksi->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="ffa" class="form-label">FFA</label>
                                                                <input type="number" class="form-control" id="ffa" name="ffa" value="{{ $qualitas->ffa }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kadar_air" class="form-label">Kadar Air</label>
                                                                <input type="number" class="form-control" id="kadar_air" name="kadar_air" value="{{ $qualitas->kadar_air }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kotoran" class="form-label">Kotoran</label>
                                                                <input type="number" class="form-control" id="kotoran" name="kotoran" value="{{ $qualitas->kotoran }}" required>
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
