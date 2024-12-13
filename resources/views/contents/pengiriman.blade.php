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
                                <h5 class="card-title">Pengiriman</h5>
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
                                        <h5 class="modal-title" id="modalTambahLabel">Tambah Pengiriman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pengiriman.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="jenis_produk">Jenis Produk</label>
                                                <input type="text" name="jenis_produk" id="jenis_produk" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                                                <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat_dikirim">Berat Dikirim</label>
                                                <input type="number" name="berat_dikirim" id="berat_dikirim" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="penerima">Penerima</label>
                                                <input type="text" name="penerima" id="penerima" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pengangkut">Pengangkut</label>
                                                <input type="text" name="pengangkut" id="pengangkut" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_pengiriman">Kode Pengiriman</label>
                                                <input type="text" name="kode_pengiriman" id="kode_pengiriman" class="form-control" required>
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

                         <div class="table-responsive p-4 mt-3">
                            <table id="example" class="contoh table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pengiriman</th>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Berat Dikirim</th>
                                        <th>Penerima</th>
                                        <th>Pengangkut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengirimans as $index => $pengiriman)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pengiriman->kode_pengiriman }}</td>
                                        <td>{{ $pengiriman->tanggal_pengiriman }}</td>
                                        <td>{{ $pengiriman->berat_dikirim }}</td>
                                        <td>{{ $pengiriman->penerima }}</td>
                                        <td>{{ $pengiriman->pengangkut }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $pengiriman->id }}">Edit</button>
                                            <form action="{{ route('pengiriman.destroy', $pengiriman->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEdit{{ $pengiriman->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $pengiriman->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditLabel{{ $pengiriman->id }}">Edit Data Pengiriman</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('pengiriman.update', $pengiriman->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Form fields for editing -->
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="jenis_produk">Jenis Produk</label>
                                                            <input type="text" name="jenis_produk" id="jenis_produk" class="form-control" value="{{ old('jenis_produk', $pengiriman->jenis_produk) }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                                                            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" value="{{ old('tanggal_pengiriman', $pengiriman->tanggal_pengiriman) }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="berat_dikirim">Berat Dikirim</label>
                                                            <input type="number" name="berat_dikirim" id="berat_dikirim" class="form-control" value="{{ old('berat_dikirim', $pengiriman->berat_dikirim) }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="penerima">Penerima</label>
                                                            <input type="text" name="penerima" id="penerima" class="form-control" value="{{ old('penerima', $pengiriman->penerima) }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pengangkut">Pengangkut</label>
                                                            <input type="text" name="pengangkut" id="pengangkut" class="form-control" value="{{ old('pengangkut', $pengiriman->pengangkut) }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kode_pengiriman">Kode Pengiriman</label>
                                                            <input type="text" name="kode_pengiriman" id="kode_pengiriman" class="form-control" value="{{ old('kode_pengiriman', $pengiriman->kode_pengiriman) }}" required>
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
