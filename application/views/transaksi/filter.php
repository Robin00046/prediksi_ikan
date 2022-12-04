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
                        <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <form method="get" action="<?php echo base_url("Laporan")?>">
                                        <div class="row">
                                            
                                            <div class="col-sm-6 col-md-6">
                                                <select class="form-select" id="tgl1" name="tgl1">
                                                    <option selected="0">Pilih Bulan</option>
                                                <?php foreach ($dropdownbulan as $op) : ?>
                                                    <option value="<?php echo $op->bulan; ?>"> <?php echo $op->bulan; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                                <div class="col-sm-6 col-md-6">
                                                <select class="form-select" id="tgl2" name="tgl2">
                                                    <option selected="0">Pilih Tahun</option>
                                                <?php foreach ($dropdowntahun as $op) : ?>
                                                    <option value="<?php echo $op->tahun; ?>"> <?php echo $op->tahun; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                        </div>
                                        <input type="submit" name="filter" class="btn btn-primary mt-3 mb-3" value="Tampilkan"> 
                                        <?php
                                            if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                                echo '<a href="' . base_url('Laporan') . '" class="btn btn-info">RESET</a>';
                                        ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                                        <a target="_blank" href="<?php echo $url_cetak ?>" class="btn btn-info" style=' font-size:17px;'><i class="bi bi-printer" style=' font-size:17px;'></i> Cetak PDF</a>
                                    </div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr align=center>
                                    <td>No</td>
                                    <td>Nama Produk</td>
                                    <td>Nama</td>
                                    <td>Jumlah Barang</td>
                                    <td>Total Harga</td>
                                    <td>Bulan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($filter)) { // Jika data tidak ada
                                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                    $no = 1;
                                    foreach ($filter as $data) { // Looping hasil data filter
                                        $tanggal = date('F Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy
                                        
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
                    </div>
                </div>
            </div>
        </div>
</body>