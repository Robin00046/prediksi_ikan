<section class="section dashboard">
    <div class="row">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        Data transaksi <strong>Berhasil</strong> <?= $this->session->flashdata('flash') ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Nama User</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($transaksi as $transaksi) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $transaksi->nama_produk; ?></td>
                        <td><?= $transaksi->nama; ?></td>
                        <td><?= $transaksi->jumlah_barang; ?></td>
                        <td><?= $transaksi->tanggal; ?></td>
                        <td>Rp. <?= number_format($transaksi->total_harga,2,',','.'); ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= base_url() . 'transaksi/ubah/' . $transaksi->id_transaksi  ?>"><i class="bi bi-pencil"></i></a>
                            <a class="btn btn-danger" onclick="return confirm('Yakin ? ');" href="<?= base_url() . 'transaksi/hapus/' . $transaksi->id_transaksi  ?>" class="btn btn-small text-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>