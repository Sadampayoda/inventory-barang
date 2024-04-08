<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Penjualan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('profil.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('username') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if (session()->get('level') == 'admin' Or session()->get('level') == 'bendahara' ): ?>
          <li class="nav-item menu-open">
            <a href="/" class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <?php endif; ?>
          <?php if (session()->get('level') == 'kasir'): ?>
            <li class="nav-item">
                <a href="/keranjang" class="nav-link <?= $active == 'keranjang' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-folder"></i>
                <p>
                    Keranjang
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if (session()->get('level') == 'bendahara'): ?>
            <li class="nav-item">
                <a href="/transaksi" class="nav-link <?= $active == 'transaksi' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-folder"></i>
                <p>
                    Transaksi Pemasukan dan Pengeluaran
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if (session()->get('level') == 'bendahara' or session()->get('level') == 'pimpinan'): ?>
            <li class="nav-item">
                <a href="/laporan-bendahara" class="nav-link <?= $active == 'laporan-bendahara' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Laporan Transaksi Pemasukan dan Pengeluaran
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if (session()->get('level') == 'bendahara'): ?>
            <li class="nav-item">
                <a href="/gaji-karyawan" class="nav-link <?= $active == 'gaji-karyawan' ? 'active' : '' ?>">
                    <i class=" nav-icon fas fa-dollar-sign"></i>
                <p>
                    Gaji Karyawan
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if (session()->get('level') == 'bendahara'): ?>
            <li class="nav-item">
                <a href="/hutang" class="nav-link <?= $active == 'hutang' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-times"></i>
                <p>
                    Hutang
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if (session()->get('level') == 'bendahara'): ?>
            <li class="nav-item">
                <a href="/piutang" class="nav-link <?= $active == 'piutang' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-times"></i>
                <p>
                    Piutang
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if (session()->get('level') == 'bendahara' or session()->get('level') == 'pimpinan'): ?>
            <li class="nav-item">
                <a href="/laporan-gaji" class="nav-link <?= $active == 'laporan-gaji' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Laporan Gaji Karyawan
                </p>
                </a>
            </li>
          <?php endif;?>
          
          <?php if (session()->get('level') == 'admin'): ?>
            <li class="nav-item">
                <a href="/barang" class="nav-link <?= $active == 'barang' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-folder"></i>
                <p>
                    Data Barang
                </p>
                </a>
            </li>
          <?php endif;?>
          <?php if(session()->get('level') == 'kasir' or session()->get('level') == 'pimpinan' or session()->get('level') == 'admin'): ?>
          <li class="nav-item">
            <a href="/laporan" class="nav-link <?= $active == 'laporan' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan penjualan
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if (session()->get('level') == 'admin'): ?>
            <li class="nav-item">
                <a href="/rekening" class="nav-link <?= $active == 'rekening' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-building"></i>
                <p>
                    Data Rekening
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/karyawan" class="nav-link <?= $active == 'karyawan' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>
                      Data Karyawan
                  </p>
                </a>
            </li>
            <li class="nav-item">
              <a href="/pengguna" class="nav-link <?= $active == 'pengguna' ? 'active' : '' ?>">
                 <i class="nav-icon fas fa-building"></i>
                <p>
                  Data Pengguna
                </p>
              </a>
            </li>
        <?php endif;?>
          
        <li class="nav-item">
          <a href="/profile" class="nav-link <?= $active == 'profile' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-key"></i>
            <p>
              Ganti password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/logout" class="nav-link <?= $active == 'logout' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-door-open"></i>
            <p>
              Logout
            </p>
          </a>
        </li>     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>