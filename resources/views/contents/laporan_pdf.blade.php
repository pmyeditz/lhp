<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LHP - {{ \Carbon\Carbon::parse(request('start_date', now()->toDateString()))->format('d-m-Y') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .garis {
            border: 1px solid #000000;
        }
    </style>
</head>
<body>
    <h2>PT. KARYA BANGSA INDONESIA - PKS</h2>
    <h2>LAPORAN HARIAN PRODUKSI</h2>
    <hr class="garis">
    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse(request('start_date', now()->toDateString()))->format('d-m-Y') }}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Penerimaan</th>
                <th>Nama Pemasok</th>
                <th>Hari Ini (kg)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penerimaans as $index => $penerimaan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $penerimaan->kode_penerimaan }}</td>
                    <td>{{ $penerimaan->pemasok->nama_pemasok ?? '-' }}</td>
                    <td>{{ $penerimaan->berat_diterima }} Kg</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data penerimaan untuk tanggal ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
