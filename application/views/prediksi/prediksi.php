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
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="<?= base_url('prediksi/tambah') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bulan 1</th>
                    <th>Bulan 2</th>
                    <th>Bulan 3</th>
                    <th>Hasil Prediksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($prediksi as $prediksi) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $prediksi->bulan1; ?></td>
                        <td><?= $prediksi->bulan2; ?></td>
                        <td><?= $prediksi->bulan3; ?></td>
                        <td><?= $prediksi->hasil; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= base_url() . 'prediksi/ubah/' . $prediksi->id_prediksi  ?>"><i class="bi bi-pencil"></i></a>
                            <a class="btn btn-danger" onclick="return confirm('Yakin ? ');" href="<?= base_url() . 'prediksi/hapus/' . $prediksi->id_prediksi  ?>" class="btn btn-small text-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>