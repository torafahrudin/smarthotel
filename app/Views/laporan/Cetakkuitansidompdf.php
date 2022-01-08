<html>

<head>
    <title>Print Kuitansi</title>
    <style type="text/css">
        .lead {
            font-family: "Verdana";
            font-weight: bold;
        }

        .value {
            font-family: "Verdana";
        }

        .value-big {
            font-family: "Verdana";
            font-weight: bold;
            font-size: large;
        }

        .td {
            valign: "top";
        }

        /* @page { size: with x height */
        @page {
            size: 20cm 10cm;
            margin: 10px;
        }

        /*
			@page {
				size: A4;
				margin : 0px;
			}
			*/
        /*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
        /*body { border: 2px solid #000000;  }*/
    </style>
</head>

<body>
    <?php
    foreach ($kuitansi as $row) :
        $no_kuitansi = $row->no_kuitansi;
        $nama_penghuni = $row->nama_penghuni;
        $kmr = $row->kmr;
        $tgl_bayar = $row->tgl_bayar;
        $besar_bayar = $row->besar_bayar;
        $harga_deal = $row->harga_deal;
    endforeach;
    ?>

    <br>
    <table border="1px">
        <tr>
            <td width="80px">
                <img src="images/icon.jpg" width="80px" />
            </td>
            <td>
                <table cellpadding="4">
                    <tr>
                        <td width="200px">
                            <div class="lead">No kwitansi:
                        </td>
                        <td>
                            <div class="value"><?= $no_kuitansi ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Telah terima dari:</div>
                        </td>
                        <td>
                            <div class="value"><?= $nama_customer ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Untuk Pembayaran:</div>
                        </td>
                        <td>
                            <div class="value">Kamar Kos <?= $id_produk ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Tanggal:</div>
                        </td>
                        <td>
                            <div class="value"><?= $waktu_bayar ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Rupiah:</div>
                        </td>
                        <td>
                            <div class="value-big"><?= nominal($total_bayar) ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="lead">Uang Sejumlah:</div>
                        </td>
                        <td>
                            <div class="value"><?= nominal($total_bayar) ?> Rupiah</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>____________________________________________________</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>