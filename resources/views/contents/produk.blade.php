<!-- resources/views/dashboard.blade.php -->
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
                            <h5 class="card-title">Produk</h5>
                        </div>
                        <!-- Tombol Tambah Data -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="ri-add-circle-line"></i> add
                        </button>
                    </div>
                    <hr class="bg-dark">

                    <!-- Pesan sukses dan error -->
                    @if ($errors->any())
                    <div class="mt-2 alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                    @endif

                    @if (session('success'))
                        <div class="mt-2 alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mt-2 alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Tabel Data Produksi -->
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>FFA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $index => $produk)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $produk->id_produk }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->ffa ?? 'Tidak ada' }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
ss
                                            <!-- Tombol Hapus -->

                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir Tabel Data Produksi -->

                    <!-- Modal Tambah -->

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-main>
