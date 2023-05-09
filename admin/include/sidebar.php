<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php">Pesantren</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">PST</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="index"><a class="nav-link" href="index.php"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <?php if ($role == 1) : ?>
                <li class="menu-header">Data Master</li>

                <?php if ($user['hak_akses'] == 'Pengurus') : ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Menu</span></a>
                        <ul class="dropdown-menu">
                            <li class="pengurus tambahpengurus"><a class="nav-link" href="index.php?page=pengurus">Pengurus</a></li>
                            <li class="walisantripengurus tambahwalisantripengurus"><a class="nav-link" href="index.php?page=walisantripengurus">Wali Santri</a></li>
                            <li class="tanggalpendaftaran"><a class=" nav-link" href="index.php?page=tanggalpendaftaran">Tanggal Pendaftaran</a></li>
                        </ul>
                    </li>

                    <li class="menu-header">Data Transaksi</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-handshake"></i> <span>Pendaftaran</span></a>
                        <ul class="dropdown-menu">
                            <li class="santridaftar"><a class="nav-link" href="index.php?page=santridaftar">Data Pendaftaran Santri</a></li>
                            <li class="santriditerima"><a class="nav-link" href="index.php?page=santriditerima">Data Santri Diterima</a></li>
                            <li class="pembayaran"><a class="nav-link" href="index.php?page=pembayaran">Pembayaran</a></li>
                        </ul>
                    </li>
                <?php endif; ?>


                <li class="menu-header">Laporan</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="laporankeuangan"><a class="nav-link" href="index.php?page=laporankeuangan">Laporan Pembayaran</a></li>
                        <li class="laporanpendaftaran"><a class="nav-link" href="index.php?page=laporanpendaftaran">Laporan Santri Ditolak</a></li>
                        <li class="laporansantri"><a class="nav-link" href="index.php?page=laporansantri">Laporan Santri Diterima</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($role == 2) : ?>
                <li class="menu-header">Data Santri</li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Menu</span></a>
                    <ul class="dropdown-menu">
                        <li class="walisantri"><a class="nav-link" href="index.php?page=walisantri">Pendaftaran Santri</a></li>
                        <li class="santriditerima"><a class="nav-link" href="index.php?page=santriditerima">Data Santri Diterima</a></li>
                        <li class="pembayaran"><a class="nav-link" href="index.php?page=pembayaran">Pembayaran</a></li>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>


    </aside>
</div>