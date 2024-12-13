<!-- resources/views/dashboard.blade.php -->
<x-main>
    @section('content')
    <x-header />
    <x-sidebar />
        <link rel="stylesheet" href="{{ asset('css/dataTables.css') }}">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    <div class="d-flex p-4 justify-content-between">
                        <div class="row">
                            <h5 class="card-title">Pengguna</h5>
                        </div>
                        <!-- Tombol Tambah Data -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="ri-add-circle-line"></i>Add
                        </button>
                    </div>
                    <hr class="bg-dark">


                        <!-- Add Modal -->
                        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add User</button>
                                        </div>
                                    </form>
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
                        <div class="table-responsive p-4 mt-3">
                            <table id="example" class="contoh table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->tgl_lahir }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                            <input type="date" name="tgl_lahir" class="form-control" value="{{ $user->tgl_lahir }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
