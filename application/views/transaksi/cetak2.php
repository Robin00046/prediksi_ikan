<html>

<head>
    <title>.</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        .table tr {
            padding: 5px;
        }

        .table td {
            word-wrap: break-word;
            width: 12%;
            padding: 1px;
        }

        .tandatangan {

            text-align: center;
            margin-left: 345px;

        }
    </style>
</head>

<body>
    <!-- <h2 align=center>Laporan Penjualan</h2> -->
    <h2 align=center><?php echo $label ?></h2>

    <table class="table" align=center border=1 cellpadding=20 cellspacing=0>
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
                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada) // Ubah format tanggal jadi dd-mm-yyyy
                    ?>
                    <?php
                    $no = 1;
                    foreach ($prediksi as $value) :
                    ?>
                        <tr align=center>
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
                        <?php 
                    }
                ?>
            </tbody>
        </table>
    <script>
        window.print();
    </script>
</body>

</html>