<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HOTEL AHADIAT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* table th {
          background: #0c1c60 !important;
          color: #fff !important;
          border: 1px solid #ddd !important;
          line-height:15px!important;
          text-align:center!important;
          vertical-align:middle!important;

      } */
        /* table td{line-height:15px!important; text-align:center!important;} */
    </style>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>HOTEL AHADIAT</b>
            </div>
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>Jurnal Umum</b>
            </div>
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
            </div>
        </div>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr class="bg-dark-light">
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">Nama Akun</th>
                    <th rowspan="2">No Akun</th>
                    <th rowspan="2" class="text-center">Debet</th>
                    <th rowspan="2" class="text-center">Kredit</th>
                    <th colspan="2" class="text-center">Saldo </th>
                </tr>
                <tr class="bg-dark-light">
                    <th class="text-center">Debet</th>
                    <th class="text-center">Kredit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td style="background-color: #eee">Saldo Awal</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <?php
                    if (strcmp($posisi_saldo_normal, 'd') == 0) {
                        echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_awal) . "</td>";
                        echo "<td>-</td>";
                        $saldo_debet = $saldo_awal;
                        $saldo_kredit = 0;
                    } else {
                        echo "<td>-</td>";
                        echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_awal) . "</td>";
                        $saldo_debet = 0;
                        $saldo_kredit = $saldo_awal;
                    }
                    ?>
                </tr>
                <?php
                //echo $saldo_debet."-".$saldo_kredit."<br>";
                if (!empty($buku_besar)) :
                    foreach ($buku_besar as $cacah) :
                        echo "<tr>";
                        echo "<td>" . $cacah['tanggal'] . "</td>";
                        echo "<td>" . $cacah['nama_akun'] . "</td>";
                        echo "<td>" . $cacah['id_akun'] . "</td>";

                        //untuk posisi d c dari jurnal adalah debet / d
                        if (strcmp($cacah['posisi'], 'd') == 0) {
                            // if ($saldo_debet >= $cacah['nominal']) {
                            echo "<td class='text-right'> Rp " . nominal1((float)$cacah['nominal']) . "</td>";
                            echo "<td>-</td>";

                            //jika posisi saldo normal ada di debet, maka di tambah dan ditampilkan ke posisi debet
                            if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                // if ($saldo_debet >= $cacah['nominal']) {
                                $saldo_debet = $saldo_debet  + $cacah['nominal'];
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                            } else {
                                $saldo_kredit = $saldo_kredit  - $cacah['nominal'];
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                            }
                        } else {
                            //jika posisi d c dari jurnal adalah kredit / c
                            echo "<td>-</td>";
                            echo "<td class='text-right'> Rp " . nominal1((float)$cacah['nominal']) . "</td>";

                            if (strcmp($posisi_saldo_normal, 'd') == 0) {
                                // if ($saldo_debet >= $cacah['nominal']) {
                                $saldo_debet = $saldo_debet  + $cacah['nominal'];
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                            } else {
                                $saldo_kredit = $saldo_kredit  + $cacah['nominal'];
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_debet) . "</td>";
                                echo "<td class='text-right'> Rp " . nominal1((float)$saldo_kredit) . "</td>";
                            }
                        }
                        echo "</tr>";
                    endforeach;
                    if (strcmp($posisi_saldo_normal, 'd') == 0) {
                        $saldo_akhir = $saldo_debet - $saldo_kredit;
                    } else {
                        $saldo_akhir = $saldo_kredit - $saldo_debet;
                    }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td>-</td>
                    <td style='background-color: #eee'>Saldo Akhir</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <?php
                    if ($saldo_debet >= $cacah['nominal']) {
                        // if (strcmp($posisi_saldo_normal, 'd') == 0) {
                        echo "<td style='background-color: ' >-</td>";
                        echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_akhir) . "</td>";
                    } else {
                        echo "<td style='background-color: #eee' class='text-right'> Rp " . nominal1((float)$saldo_akhir) . "</td>";
                        echo "<td style='background-color: #black' >-</td>";
                    }
                    ?>
                </tr>
            <?php endif; ?>
            </tfoot>
        </table>
    </div>
</body>

</html>