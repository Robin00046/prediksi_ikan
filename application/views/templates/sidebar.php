    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a <?php if($this->uri->segment(1)=="home"){echo 'class="nav-link"';}else {
                    echo 'class="nav-link collapsed"';
                }?> href="<?= base_url('home')  ?>">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a <?php if($this->uri->segment(1)=="produk"){echo 'class="nav-link"';}else {
                    echo 'class="nav-link collapsed"';
                }?> href="<?= base_url('produk')  ?>">
                    <i class="bi bi-box-fill"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a <?php if($this->uri->segment(1)=="Transaksi"){echo 'class="nav-link"';}else {
                    echo 'class="nav-link collapsed"';
                }?> href="<?= base_url('Transaksi')  ?>">
                    <i class="bi bi-currency-dollar"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a <?php if($this->uri->segment(1)=="Prediksi"){echo 'class="nav-link"';}else {
                    echo 'class="nav-link collapsed"';
                }?> href="<?= base_url('Prediksi')  ?>">
                    <i class="bi bi-graph-up"></i>
                    <span>Prediksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a <?php if($this->uri->segment(1)=="Grafik"){echo 'class="nav-link"';} else {
                    echo 'class="nav-link collapsed"';
                }?> href="<?= base_url('Grafik')  ?>">
                    <i class="bi bi-bar-chart"></i>
                    <span>Grafik</span>
                </a>
            </li>
            <li class="nav-item">
                <a <?php if($this->uri->segment(1)=="Laporan"){echo 'class="nav-link"';}else {
                    echo 'class="nav-link collapsed"';
                }?> href="<?= base_url('Laporan')  ?>">
                    <i class="bi bi-clipboard-pulse"></i>
                    <span>Laporan</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->