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
                <b>Jurnal Umum</b>
            </div>
            <div class="col-sm-12" style="background-color:white;" align="center">
                <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
            </div>
        </div>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>ID Jurnal</th>
                    <th>Tanggal</th>
                    <th>Akun</th>
                    <th class="text-center">Reff</th>
                    <th class="text-center">Debet</th>
                    <th class="text-center">Kredit</th>
                </tr>
            </thead>
            <?php
            $total_debit = 0;
            $total_kredit = 0;
            ?>
            <tbody>
                <?php foreach ($data_jurnals as $data_jurnal) :
                    $total_debit += $data_jurnal->debet;
                    $total_kredit += $data_jurnal->kredit;
                ?>
                    <tr>
                        <td>
                            <?= $data_jurnal->id_jurnal ?>
                        </td>
                        <td>
                            <?= format_indo($data_jurnal->tanggal) ?>
                        </td>
                        <?php if ($data_jurnal->posisi == 'd') : ?>
                            <td class="text" width="250">
                                <?= $data_jurnal->nama_akun ?>
                            </td>
                        <?php else : ?>
                            <td class="text pl-5" width="250">
                                <?= $data_jurnal->nama_akun ?>
                            </td>
                        <?php endif; ?>
                        <td class="text-center">
                            <?= $data_jurnal->id_akun ?>
                        </td>
                        <td class="text-right">
                            <?= nominal($data_jurnal->debet) ?>
                        </td>
                        <td class="text-right">
                            <?= nominal($data_jurnal->kredit) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="text-right"><?= nominal($total_debit) ?></th>
                    <th class="text-right"><?= nominal($total_kredit) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>