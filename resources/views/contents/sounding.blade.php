<!-- resources/views/dashboard.blade.php -->
<x-main>
    @section('content')
    <x-header />
    <x-sidebar />

         <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Izin</h5>
                            <!-- Tabel dengan baris terstrip -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-santri">
                                <i class="ri-add-circle-line"></i>Add
                            </button>

                            {{-- Tombol Cetak --}}
                            <a class="btn btn-info" href="/cetakIzin"><i class='bx bx-printer'></i>Export</a>



                            <!-- Modal -->
                            <div class="modal fade" id="tambah-santri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg"> <!-- Tambahkan kelas modal-lg di sini untuk modal yang lebih besar -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Santri</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- tampil pesan --}}
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
                            <div class="table-responsive">
                            <table id="example" class="contoh table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Alasan</td>
                                        <td>Status</td>
                                        <td>Mulai</td>
                                        <td>Sampai</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                    <th>Mulai</th>
                                    <th>Sampai</th>
                                    <th>Aksi</th>
                                </tbody>
                            </table>
                            </div>
                            <!-- Akhir Tabel dengan baris terstrip -->
                        </div>
                    </div>
                </div>
            </div>

    @endsection
</x-main>
