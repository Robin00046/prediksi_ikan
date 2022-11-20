<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="bulan1">Bulan 1 </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control hitung uang" id="bulan1" name="bulan1" placeholder="Nilai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-7" for="bulan2">Bulan Ke 2</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control hitung uang" id="bulan2" name="bulan2" placeholder="Nilai">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-7" for="bulan3">Bulan Ke 3 </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control hitung uang" id="bulan3" name="bulan3" placeholder="Nilai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama User</label>
                            <select class="form-control" id="id_user" name="id_user">
                                <option selected="0">select..</option>
                                <?php foreach ($user as $op) : ?>
                                    <option value="<?php echo $op->id_user; ?>"> <?php echo $op->nama; ?></option>
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
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>