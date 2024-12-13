<x-main>
    @section('content')
        <x-header />
        <x-sidebar />

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-4 justify-content-between">
                            <h5 class="card-title">Data Penerimaan</h5>

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
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Penerimaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('penerimaans.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="id_pemasok" class="form-label">Pemasok</label>
                                                <select class="form-select" name="id_pemasok" id="id_pemasok" required>
                                                    <option value="" disabled selected>Pilih Pemasok</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->nama_pemasok }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="kode_penerimaan" class="form-label">Kode Penerimaan</label>
                                                <input type="text" class="form-control" name="kode_penerimaan" id="kode_penerimaan" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                                                <input type="date" class="form-control" name="tanggal_diterima" id="tanggal_diterima" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="berat_diterima" class="form-label">Berat Diterima (kg)</label>
                                                <input type="number" class="form-control" name="berat_diterima" id="berat_diterima" step="0.01" required>
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


                        {{-- Tampilkan pesan sukses atau error --}}
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

                        <!-- Tabel Data Penerimaan -->
                        <div class="table-responsive p-4 mt-3">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Penerimaan</th>
                                        <th>Tanggal Diterima</th>
                                        <th>Berat Diterima (kg)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penerimaans as $index => $penerimaan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $penerimaan->kode_penerimaan }}</td>
                                            <td>{{ $penerimaan->tanggal_diterima }}</td>
                                            <td>{{ $penerimaan->berat_diterima }} Kg</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $penerimaan->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('penerimaans.destroy', $penerimaan->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEdit{{ $penerimaan->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $penerimaan->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditLabel{{ $penerimaan->id }}">Edit Penerimaan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('penerimaans.update', $penerimaan->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="id_pemasok" class="form-label">Pemasok</label>
                                                            <select class="form-select" name="id_pemasok" id="id_pemasok" required>
                                                                <option value="" disabled>Pilih Pemasok</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}" {{ $supplier->id == $penerimaan->id_pemasok ? 'selected' : '' }}>
                                                                        {{ $supplier->nama_pemasok }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="kode_penerimaan" class="form-label">Kode Penerimaan</label>
                                                            <input type="text" class="form-control" name="kode_penerimaan" value="{{ $penerimaan->kode_penerimaan }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                                                            <input type="date" class="form-control" name="tanggal_diterima" value="{{ $penerimaan->tanggal_diterima }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="berat_diterima" class="form-label">Berat Diterima (kg)</label>
                                                            <input type="number" class="form-control" name="berat_diterima" value="{{ $penerimaan->berat_diterima }}" step="0.01" required>
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
