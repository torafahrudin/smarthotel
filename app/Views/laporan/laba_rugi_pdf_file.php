<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HOTEL AHADIAT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        table th {
            background: #0c1c60 !important;
            color: #fff !important;
            border: 1px solid #ddd !important;
            line-height: 15px !important;
            text-align: center !important;
            vertical-align: middle !important;

        }

        table td {
            line-height: 15px !important;
            text-align: center !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>HOTEL AHADIAT</b>
            </div>
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>Laba Rugi</b>
            </div>
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
            </div>
        </div>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr class="bg-gray-400">
                    <th><b>Pendapatan</b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_pendapatan_bulan_lalu = 0;
                if (!empty($pendapatan_bulan_lalu)) :
                    foreach ($pendapatan_bulan_lalu as $bulan_lalu) :
                        $total_pendapatan_bulan_lalu += $bulan_lalu['nominal'];
                ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php
                $total_pendapatan = 0;
                foreach ($pendapatans as $pendapatan) :
                    $total_pendapatan += $pendapatan['nominal'];
                ?>
                    <tr>
                        <td> <?php echo $pendapatan['nama_akun'] ?> </td>
                        <!-- <td>Harga Pokok Penjualan</td> -->
                        <td></td>
                        <td></td>
                        <td class='text-center'> Rp <?php echo number_format($pendapatan['nominal']) ?> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                <?php endforeach; ?>


                <?php $laba_kotor = $total_pendapatan  ?>
                <?php if ($laba_kotor < 0) : ?>
                    <tr>
                        <td></td>
                        <td> <b> Rugi Kotor</b> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='text-center'> Rp <?php echo number_format($laba_kotor) ?> </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td></td>
                        <td> <b> Laba Kotor</b> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='text-center'> Rp <?php echo number_format($laba_kotor) ?> </td>
                    </tr>
                <?php endif; ?>

            </tbody>
            <thead>
                <tr class="bg-gray-400">
                    <th><b>Beban</b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                    <th><b></b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_beban_bulan_lalu = 0;
                if (!empty($beban_bulan_lalu)) :
                    foreach ($beban_bulan_lalu as $bulan_lalu) :
                        $total_beban_bulan_lalu += $bulan_lalu['total'];
                ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php
                $total_beban = 0;
                foreach ($beban as $beban) :
                    $total_beban += $beban['total'];
                ?>
                    <tr>
                        <td> <?php echo $beban['nama_akun'] ?> </td>
                        <td></td>
                        <td></td>
                        <td class='text-center'> Rp <?php echo number_format($beban['total']) ?> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                <?php endforeach; ?>


                <tr>
                    <td></td>
                    <td> <b> Total Beban</b> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='text-center'> Rp (<?php echo number_format($total_beban) ?>) </td>
                </tr>
                <?php $laba_bersih = $laba_kotor - $total_beban ?>
                <?php if ($laba_bersih < 0) : ?>
                    <tr>
                        <td></td>
                        <td class="bg-gray-400"> <b> Rugi Bersih</b> </td>
                        <td class="bg-gray-400"></td>
                        <td class="bg-gray-400"></td>
                        <td class="bg-gray-400"></td>
                        <td class='text-center bg-gray-400'> Rp <?php echo number_format($laba_bersih) ?> </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td></td>
                        <td class="bg-gray-400"> <b> Laba Bersih</b> </td>
                        <td class="bg-gray-400"></td>
                        <td class="bg-gray-400"></td>
                        <td class="bg-gray-400"></td>
                        <td class='text-center bg-gray-400'> Rp <?php echo number_format($laba_bersih) ?> </td>
                    </tr>
                <?php endif; ?>


            </tbody>
        </table>
    </div>
</body>

</html>