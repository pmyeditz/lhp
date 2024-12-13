<!-- resources/views/components/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @stack('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/costume.css') }}" rel="stylesheet">
</head>
<body>
    <div class="content">
                @yield('login')
            </div>
    <div class="d-flex" id="app">
        <!-- Sidebar -->

        <div class="container-fluid">
            <!-- Header -->

            <div class="content">
                @yield('content')
            </div>
            <!-- Content -->

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50],
            });
        });
    </script>
</body>
</html>
