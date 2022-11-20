<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Produk
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                        <div class="form-group">
                            <label for="nama_produk">nama_produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?= $produk['nama_produk']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jenis_produk">jenis_produk</label>
                            <input type="text" name="jenis_produk" class="form-control" id="jenis_produk" value="<?= $produk['jenis_produk']; ?>">
                            <small class="form-text text-danger"><?= form_error('jenis_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" value="<?= $produk['harga']; ?>">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="satuan">satuan</label>
                            <input type="text" name="satuan" class="form-control" id="satuan" value="<?= $produk['satuan']; ?>">
                            <small class="form-text text-danger"><?= form_error('satuan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="total_stok">total_stok</label>
                            <input type="number" name="total_stok" class="form-control" id="total_stok" value="<?= $produk['total_stok']; ?>">
                            <small class="form-text text-danger"><?= form_error('total_stok'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>