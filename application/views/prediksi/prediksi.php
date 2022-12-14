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
                    <form method="get" action="<?php echo base_url("Prediksi")?>">
                        
                        <select class="form-select" id="nama_produk" name="nama_produk">
                            <option selected="0">Pilih Jenis Ikan</option>
                            <?php foreach ($tbl_produk as $op) : ?>
                                <option value="<?php echo $op->nama_produk; ?>"> <?php echo $op->nama_produk; ?></option>
                                <?php endforeach; ?>
                            </select>
            
                    <input type="submit" name="filter" class="btn btn-primary mt-3 mb-3" value="Cari"> 
                    <?php
                        if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                            echo '<a href="' . base_url('Prediksi') . '" class="btn btn-info">RESET</a>';
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <?php 
        if ($produk==null) {
            // echo('tes');
        } else {
            ?>
            <table id="datatable" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Penjualan</th>
                    <th>Bulan Prediksi</th>
                    <th>Hasil Prediksi Bualan Selanjutnya</th>
                    <th>Mape</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (empty($prediksi)) { // Jika data tidak ada
                    ?>
                    <tr><td colspan='5'>Data tidak ada</td></tr>
                    
                    <?php
                    // echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    
                } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada) // Ubah format tanggal jadi dd-mm-yyyy
                    ?>
                    <?php
                    $no = 1;
                    foreach ($prediksi as $value) :
                    ?>
                        <tr>
                            <td> <?=$no++?> </td>
                            <td> <?=$value->nama_produk?> </td>
                            <td> <?=$value->jumlah_barang?> </td>
                            <td> <?=date('F Y', strtotime($value->tanggal))?> </td>
                            <td> <?=number_format($value->prediksi)?> </td>
                            <td> <?=number_format($value->mape)?> </td>
                            </tr>
                            <?php
                            endforeach
                            ?>
                            <a href="<?= base_url() . 'Prediksi/tambah_prediski/' . $value->id_produk  ?>" class="btn btn-primary btn-sm">Tambah Data</a>
                        <?php 
                    }
                ?>
            </tbody>
        </table>  
        
            <?php
        }
        ?>
        
    </div>
</section>