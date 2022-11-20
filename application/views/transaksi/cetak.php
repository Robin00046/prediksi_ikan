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
    <h2 align=center>Laporan Penjualan</h2>
    <h4 align=center><?php echo $label ?></h4>

    <table class="table" align=center border=1 cellpadding=20 cellspacing=0>
        <tr align=center>
            <td>No</td>
            <td>Nama Produk</td>
            <td>Nama</td>
            <td>Jumlah Barang</td>
            <td>Total Harga</td>
            <td>Tanggal</td>
        </tr>

        <?php
        if (empty($transaksi)) { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        } else { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            $no = 1;
            foreach ($transaksi as $data) { // Looping hasil data transaksi
                $tanggal = date('d-m-Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy

                echo "<tr align=center>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data->nama_produk . "</td>";
                echo "<td>" . $data->nama . "</td>";
                echo "<td>" . $data->jumlah_barang . "</td>";
                echo "<td>". 'Rp. ' . number_format($data->total_harga,2,',','.') . "</td>";
                echo "<td>" . $tanggal . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>