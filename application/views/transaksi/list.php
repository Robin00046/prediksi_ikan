    <body>
        <div style="padding: 15px;">


            <hr />
            <div class="container-fluid">
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="container">
                                <div class="text-center h3">
                                    <?php echo $label ?>
                                </div>
                                <form method="get" action="<?php echo base_url('transaksi/filter') ?>">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Filter Tanggal</label>
                                                <div class="input-group">
                                                    <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal datetimepicker-input" placeholder="Tanggal Awal" data-toggle="datetimepicker" data-target=".tgl_awal" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">s/d</span>
                                                    </div>
                                                    <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir datetimepicker-input" placeholder="Tanggal Akhir" data-toggle="datetimepicker" data-target=".tgl_akhir" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                    <?php
                                    if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                        echo '<a href="' . base_url('transaksi/filter') . '" class="btn btn-info">RESET</a>';
                                    ?>
                                </form>
                                <table class="table table-bordered" id="Table" width="100%" cellspacing="0">
                                    <div class="my-3">
                                        <a target="_blank" href="<?php echo $url_cetak ?>" class="btn btn-info" style=' font-size:17px;'><i class="bi bi-printer" style=' font-size:17px;'></i> Cetak PDF</a>
                                    </div>
                                    <thead>
                                        <tr align=center>
                                            <td>No</td>
                                            <td>Nama Produk</td>
                                            <td>Nama</td>
                                            <td>Jumlah Barang</td>
                                            <td>Total Harga</td>
                                            <td>Tanggal</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($transaksi)) { // Jika data tidak ada
                                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                        } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                            $no = 1;
                                            foreach ($transaksi as $data) { // Looping hasil data transaksi
                                                $tanggal = date('d-m-Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy

                                                echo "<tr>";
                                                echo "<td style='width: 80px;'>" . $no++ . "</td>";
                                                echo "<td style='width: 80px;'>" . $data->nama_produk . "</td>";
                                                echo "<td style='width: 300px;'>" . $data->nama . "</td>";
                                                echo "<td style='width: 60px;'>" . $data->jumlah_barang . "</td>";
                                                echo "<td style='width: 100px;'>". 'Rp. ' . number_format($data->total_harga,2,',','.') . "</td>";
                                                echo "<td style='width: 100px;'>" . $tanggal . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    setDateRangePicker(".tgl_awal", ".tgl_akhir")
                                })
                            </script>
    </body>