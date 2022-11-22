<body>
        <div style="padding: 15px;">


            <hr />
            <div class="container-fluid">
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="container">
                                <div class="text-center h3">
                                    <?php echo $label ?>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <form method="get" action="<?php echo base_url("grafik")?>">
                                                    
                                                    <select class="form-control" id="nama_produk" name="nama_produk">
                                                        <option selected="0">Pilih Jenis Ikan</option>
                                                        <?php foreach ($tbl_produk as $op) : ?>
                                                            <option value="<?php echo $op->nama_produk; ?>"> <?php echo $op->nama_produk; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                        
                                                <input type="submit" name="filter" class="btn btn-primary mt-3 mb-3" value="Cari"> 
                                                <?php
                                                    if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                                        echo '<a href="' . base_url('grafik') . '" class="btn btn-info">RESET</a>';
                                                    ?>         
                                                   
                                     </div>
                                </div>
                            </div>
                        </div>
                        </form>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align=center>
                                            <td>No</td>
                                            <td>Nama Produk</td>
                                            <td>Nama</td>
                                            <td>Jumlah Barang</td>
                                            <td>Total Harga</td>
                                            <td>Tanggal</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($grafik)) { // Jika data tidak ada
                                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                        } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                            $no = 1;
                                            foreach ($grafik as $data) { // Looping hasil data grafik
                                                $tanggal = date('d-m-Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy
                                                
                                                echo "<tr>";
                                                echo "<td style='width: 80px;'>" . $no++ . "</td>";
                                                echo "<td style='width: 80px;'>" . $data->nama_produk . "</td>";
                                                echo "<td style='width: 300px;'>" . $data->nama . "</td>";
                                                echo "<td style='width: 60px;'>" . $data->jumlah_barang . "</td>";
                                                echo "<td style='width: 100px;'>". 'Rp. ' . number_format($data->total_harga,2,',','.') . "</td>";
                                                echo "<td style='width: 100px;'>" . $tanggal . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                </div>
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
            if (count($grafik)>0) {
              foreach ($grafik as $data) {
                echo "'" .$data->tanggal ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Jumlah Penjualan',
            backgroundColor: ['#343090', '#5f59f7', '#6592fd', '#44c2fd', '#8c61ff'],
            borderColor: '#93C3D2',
            data: [
              <?php
                if (count($grafik)>0) {
                   foreach ($grafik as $data) {
                    echo $data->jumlah_barang . ", ";
                  }
                }
                    ?>
                ]
            }]
        },
        });
 
  </script>
    </body>