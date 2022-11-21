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
                <a href="<?= base_url('produk/tambah') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Total Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tbl_produk as $produk) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $produk->nama_produk; ?></td>
                        <td><?= $produk->jenis_produk; ?></td>
                        <td>Rp. <?= number_format($produk->harga,2,',','.'); ?></td>
                        <td><?= $produk->satuan; ?></td>
                        <td><?= $produk->total_stok; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= base_url() . 'produk/ubah/' . $produk->id_produk  ?>"><i class="bi bi-pencil"></i></a>
                            <a class="btn btn-danger" onclick="return confirm('Yakin ? ');" href="<?= base_url() . 'produk/hapus/' . $produk->id_produk  ?>" class="btn btn-small text-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="container">
    <canvas id="myChart"></canvas>
    </div>
 
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            if (count($tbl_produk)>0) {
              foreach ($tbl_produk as $data) {
                echo "'" .$data->nama_produk ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Stok',
            backgroundColor: ['#343090', '#5f59f7', '#6592fd', '#44c2fd', '#8c61ff'],
            borderColor: '#93C3D2',
            data: [
              <?php
                if (count($tbl_produk)>0) {
                   foreach ($tbl_produk as $data) {
                    echo $data->total_stok . ", ";
                  }
                }
                    ?>
                ]
            }]
        },
        });
 
  </script>
    </div>
</section>