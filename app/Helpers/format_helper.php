
<?php
function format_bulan($a)
{
    $a = str_pad($a, 2, "0", STR_PAD_LEFT);
    $bulanIndonesia = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    return $bulanIndonesia[$a];
}

//fungsi untuk format rupiah
function format_rp($a)
{
    $jumlah_desimal = "0";
    $pemisah_desimal = ",";
    $pemisah_ribuan = ".";
    $angka = "Rp " . number_format($a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
    return $angka;
}

if (!function_exists('nominal')) {
    function nominal($angka)
    {
        $jd = number_format($angka, 0, ',', ',');
        return 'Rp ' . $jd;
    }
    function nominal1($angka)
    {
        $jd = number_format($angka, 0, ',', ',');
        return $jd;
    }
}

if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        // array hari dan bulan
        // $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . "" . $waktu;

        return $result;
    }
}

if (!function_exists('format_indo2')) {
    function format_indo2($date)
    {
        // array hari dan bulan
        // $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Bulan[(int)$bulan - 1] . " " . $tahun;

        return $result;
    }
}

if (!function_exists('format_date1')) {
    function format_date($date)
    {
        $waktu = date("d-m-Y", strtotime($date));;
        $result = $waktu;

        return $result;
    }
}

if (!function_exists('format_en')) {
    function format_en($date)
    {
        $waktu = date("Y-m-d", strtotime($date));;
        $result = $waktu;
        return $result;
    }
}

if (!function_exists('bulan')) {
    function bulan($bulan)
    {
        switch ($bulan) {
            case 'January':
                return "Januari";
                break;
            case 'February':
                return "Februari";
                break;
            case 'March':
                return "Maret";
                break;
            case 'April':
                return "April";
                break;
            case 'May':
                return "Mei";
                break;
            case "June":
                return "Juni";
                break;
            case 'July':
                return "Juli";
                break;
            case 'August':
                return "Agustus";
                break;
            case 'September':
                return "September";
                break;
            case 'October':
                return "Oktober";
                break;
            case 'November':
                return "November";
                break;
            case 'December':
                return "Desember";
                break;
        }
    }
}
?>