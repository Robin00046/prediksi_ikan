<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Produk
                </div>
                <div class="card-body">
                <form action="" method="post">
                        <div class="form-group">
                        <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                            <label for="exampleInputPassword1">Nama produk</label>
                            <select class="form-control" id="id_barang" name="id_produk">
                                <?php foreach( $tbl_produk as $op ) : ?>
                                    <?php if( $op->id_produk == $transaksi['id_produk'] ) : ?>
                                        <option value="<?php echo $op->id_produk; ?>" data-price="<?php echo $op->harga; ?>" selected> <?php echo $op->nama_produk; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $op->id_produk; ?>" data-price="<?php echo $op->harga; ?>"> <?php echo $op->nama_produk; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama User</label>
                            <select class="form-control" id="id_user" name="id_user">
                            <?php foreach( $user as $op ) : ?>
                                    <?php if( $op->id_user == $transaksi['id_user'] ) : ?>
                                        <option value="<?php echo $op->id_user; ?>" selected> <?php echo $op->nama; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $op->id_user; ?>"> <?php echo $op->nama; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">jumlah_barang</label>
                            <input type="number" name="jumlah_barang" class="form-control" id="jumbarang" value="<?= $transaksi['jumlah_barang']; ?>" >
                            <small class="form-text text-danger"><?= form_error('jumlah_barang'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $transaksi['tanggal']; ?>">
                            <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="totalharga">Total Pemasukan </label>
                            <input type="text" class="form-control" id="totalharga" placeholder="" name="total_harga" value="<?= $transaksi['total_harga']; ?>" required>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const barangOption = $("#id_barang");
        const jum = $("#jumbarang");
        var harga = 0;
        var inpJum = 0;
        var total = 0;

        barangOption.change(function() {
            var selectedItem = $(this).val();
            harga = Number($('option:selected', this).data("price"));
            console.log(harga, ' ', inpJum);
            total = harga * inpJum;
            $("#totalharga").val(total)
        });

        jum.keyup(function() {
            inpJum = Number($(this).val());
            total = harga * inpJum;
            $("#totalharga").val(total)
        });
    </script>
</div>