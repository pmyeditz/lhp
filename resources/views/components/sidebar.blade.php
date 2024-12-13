<aside id="sidebar" class="sidebar">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="sidebar bg-dark">
                <div class="p-3">
                    <h4 class="text-center text-white-50">LHP {{ date('Y') }}</h4>
                    <hr>
                </div>
                <div class="position-sticky flex-grow-1">
                    <ul class="nav flex-column p-3">
                        <!-- Home Section -->
                        <li class="nav-header text-white-50">Home</li>
                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '') ?>">
                            <a class="nav-link" href="/dashboard">
                                <i class="fa-solid fa-house"></i>
                                Dashboard
                            </a>
                        </li>
                        <!-- Layanan Section -->
                        <li class="nav-header text-white-50 mt-3">Layanan</li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/suppliers' ? 'active' : '') ?>">
                            <a class="nav-link" href="/suppliers">
                                <i class="fa-solid fa-truck"></i>
                                Supplier
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/penerimaans' ? 'active' : '') ?>">
                            <a class="nav-link" href="/penerimaans">
                                <i class="fa-solid fa-box-open"></i>
                                Penerimaan
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/produksis' ? 'active' : '') ?>">
                            <a class="nav-link" href="/produksis">
                                <i class="fa-solid fa-industry"></i>
                                Produksi
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/stocks' ? 'active' : '') ?>">
                            <a class="nav-link" href="/stocks">
                                <i class="fa-solid fa-warehouse"></i>
                                Stok
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/stockJadi' ? 'active' : '') ?>">
                            <a class="nav-link" href="/stockJadi">
                                <i class="fa-solid fa-boxes-stacked"></i>
                                Stok Jadi
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/qualitases' ? 'active' : '') ?>">
                            <a class="nav-link" href="/qualitases">
                                <i class="fa-solid fa-check-circle"></i>
                                Qualitas
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/pengiriman' ? 'active' : '') ?>">
                            <a class="nav-link" href="/pengiriman">
                                <i class="fa-solid fa-truck-moving"></i>
                                Pengiriman
                            </a>
                        </li>

                        <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/laporans' ? 'active' : '') ?>">
                            <a class="nav-link" href="/laporans">
                                <i class="fa-solid fa-file-lines"></i>
                                Laporan
                            </a>
                        </li>

                        <!-- Pengguna Section -->
                        <li class="nav-header text-white-50 mt-3">Pengguna</li>
                        <li>
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/pengguna' ? 'active' : '') ?>">
                                    <a class="nav-link" href="/pengguna">
                                        <i class="fa-solid fa-users"></i>
                                        Pengguna
                                    </a>
                                </li>
                                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/logout' ? 'active' : '') ?>">
                                    <a class="nav-link" href="/logout">
                                        <i class="fa-solid fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</aside>
