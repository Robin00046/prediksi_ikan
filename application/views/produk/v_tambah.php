<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk">
                            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jenis_produk">Jenis Produk</label>
                            <input type="text" name="jenis_produk" class="form-control" id="jenis_produk">
                            <small class="form-text text-danger"><?= form_error('jenis_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="harga">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" name="satuan" class="form-control" id="satuan">
                            <small class="form-text text-danger"><?= form_error('satuan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="total_stok">Total Stok</label>
                            <input type="number" name="total_stok" class="form-control" id="total_stok">
                            <small class="form-text text-danger"><?= form_error('total_stok'); ?></small>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>