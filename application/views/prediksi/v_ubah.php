<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data prediksi
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_prediksi" value="<?= $prediksi['id_prediksi']; ?>">                        
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="bulan1">Bulan 1 </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control hitung uang" id="bulan1" name="bulan1" placeholder="Nilai" value="<?= $prediksi['bulan1']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="bulan2">Bulan Ke 2</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control hitung uang" id="bulan2" name="bulan2" placeholder=" Nilai"value="<?= $prediksi['bulan2']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-7" for="bulan3">Bulan Ke 3 </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control hitung uang" id="bulan3" name="bulan3" placeholder=" Nilai"value="<?= $prediksi['bulan3']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama User</label>
                            <select class="form-control" id="id_user" name="id_user">
                                <option selected="0">select..</option>
                                <?php foreach( $user as $op ) : ?>
                                    <?php if( $op->id_user == $prediksi['id_user'] ) : ?>
                                        <option value="<?php echo $op->id_user; ?>" selected> <?php echo $op->nama; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $op->id_user; ?>"> <?php echo $op->nama; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="control-label col-sm-12" for="n_rata_rata">Nilai rata rata </label>
                                <div class="col-sm-12">
                                    <input readonly type="text" class="form-control uang" name="hasil" id="n_rata_rata" placeholder="Nilai rata rata">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>