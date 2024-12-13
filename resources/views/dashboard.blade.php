<x-main>
    @section('content')
    <x-header />
    <x-sidebar />

    <div class="container mt-5">
        <div class="row">
            <!-- Supplier Card -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-file-alt fa-3x me-3"></i>
                        <div>
                            <h5 class="card-title">Supplier</h5>
                            <p class="card-text fs-4">{{ $totalSuppliers }} Suppliers</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produksi Card -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-box fa-3x me-3"></i>
                        <div>
                            <h5 class="card-title">Produksi</h5>
                            <p class="card-text fs-4">{{ $totalProduksi }} Produksi</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Card -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-leaf fa-3x me-3"></i>
                        <div>
                            <h5 class="card-title">Stock</h5>
                            <p class="card-text fs-4">{{ $totalStock }} Items</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Laporan Card -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-industry fa-3x me-3"></i>
                        <div>
                            <h5 class="card-title">Laporan</h5>
                            <p class="card-text fs-4">{{ $totalLaporan }} Laporan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Candlestick Chart -->
        <div class="row">
            <div class="col">
                <div class="card text-white bg-secondary mb-3 shadow">
                    <div class="card-body">
                        <h2 class="mb-4">Candlestick Chart</h2>
                        <div class="chart" id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const chartData = [
            { open: 0, close: {{ $totalSuppliers }}, high: {{ $totalSuppliers }}, low: 0 },
            { open: 0, close: {{ $totalProduksi }}, high: {{ $totalProduksi }}, low: 0 },
            { open: 0, close: {{ $totalStock }}, high: {{ $totalStock }}, low: 0 },
            { open: 0, close: {{ $totalLaporan }}, high: {{ $totalLaporan }}, low: 0 }
        ];

        const chart = document.getElementById('chart');
        const chartHeight = chart.clientHeight;
        const chartWidth = chart.clientWidth;
        const maxPrice = Math.max(...chartData.flatMap(data => [data.high, data.low]));
        const minPrice = Math.min(...chartData.flatMap(data => [data.high, data.low]));

        const priceRange = maxPrice - minPrice;
        const barWidth = 40;
        const gap = 20;

        chartData.forEach((data, index) => {
            const barLeft = index * (barWidth + gap);

            const openY = chartHeight - ((data.open - minPrice) / priceRange) * chartHeight;
            const closeY = chartHeight - ((data.close - minPrice) / priceRange) * chartHeight;
            const highY = chartHeight - ((data.high - minPrice) / priceRange) * chartHeight;
            const lowY = chartHeight - ((data.low - minPrice) / priceRange) * chartHeight;

            // Membuat wick (garis tinggi-rendah)
            const wick = document.createElement('div');
            wick.classList.add('wick');
            wick.style.position = 'absolute';
            wick.style.left = `${barLeft + barWidth / 2}px`;
            wick.style.top = `${highY}px`;
            wick.style.height = `${lowY - highY}px`;
            wick.style.width = '2px';
            wick.style.backgroundColor = 'black';
            chart.appendChild(wick);

            // Membuat candlestick (batang harga)
            const candle = document.createElement('div');
            candle.classList.add('candlestick');
            candle.style.position = 'absolute';
            candle.style.left = `${barLeft}px`;
            candle.style.top = `${Math.min(openY, closeY)}px`;
            candle.style.height = `${Math.abs(closeY - openY)}px`;
            candle.style.width = `${barWidth}px`;
            candle.style.backgroundColor = data.close < data.open ? 'red' : 'green';
            candle.style.border = '1px solid #000';
            chart.appendChild(candle);
        });
    </script>
    @endsection
</x-main>
