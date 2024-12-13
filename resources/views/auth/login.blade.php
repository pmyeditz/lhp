<x-main>
    @section('login')
    <div class="container-login card">
        <h3 class="text-center">Login Page</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" required value="{{ old('username') }}">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <button class="btn btn-primary form-control" type="submit">Login</button>
        </form>
    </div>
    @endsection
</x-main>
