<section class="section dashboard">
    <div class="row">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        Data Produk <strong>Berhasil</strong> <?= $this->session->flashdata('flash') ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="text-center h3">
                                        <?php echo $label ?>
                                    </div>
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="form-group">
                    <form method="get" action="<?php echo base_url("prediksi")?>">
                        
                        <select class="form-select" id="nama_produk" name="nama_produk">
                            <option selected="0">Pilih Jenis Ikan</option>
                            <?php foreach ($tbl_produk as $op) : ?>
                                <option value="<?php echo $op->nama_produk; ?>"> <?php echo $op->nama_produk; ?></option>
                                <?php endforeach; ?>
                            </select>
            
                    <input type="submit" name="filter" class="btn btn-primary mt-3 mb-3" value="Cari"> 
                    <?php
                        if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                            echo '<a href="' . base_url('prediksi') . '" class="btn btn-info">RESET</a>';
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Penjualan</th>
                    <th>Bulan Prediksi</th>
                    <th>Hasil Prediksi 3 Bulan</th>
                    <th>Hasil Prediksi 6 Bulan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (empty($prediksi)) { // Jika data tidak ada
                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                    $no = 1;
                    foreach ($prediksi as $data) { // Looping hasil data filter
                        $tanggal = date('F Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy
                        
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $data->nama_produk . "</td>";
                        echo "<td>" . $data->jumlah_barang . "</td>";
                        echo "<td>" . $tanggal . "</td>";
                        echo "<td>" . $data->prediksi . "</td>";
                        echo "<td>" . $data->prediksin . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</section>