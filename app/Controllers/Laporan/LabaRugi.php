<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\LabaRugiModel;
use \App\Models\CoaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;


class LabaRugi extends BaseController
{
    protected $labaRugiModel;
    protected $coaModel;
    protected $session;

    public function __construct()
    {
        $this->labaRugiModel = new LabaRugiModel();
        $this->coaModel = new CoaModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Laba Rugi',
            'pendapatans'            => [],
            'pendapatan_bulan_lalu ' => [],
            'beban'                 => [],
            'beban_bulan_lalu '     => [],
            'date'                  => '',
            'year'                  => '',
            'id_akun'               => ''
        ];
        // dd($data);
        return view('laporan/view_data_laba_rugi', $data);
    }

    public function show_data_laba_rugi()
    {
        $start_date         = $this->session->get("start_date");
        $time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
        $newdate            = date("Y-m", strtotime("-1 months", $time));
        $month_bef          = substr($newdate, -2);
        $year_bef           = substr($newdate, 0, -3);

        $data = [
            'title'                         => 'Laba Rugi',
            'pendapatans'                   => $this->labaRugiModel->getJurnalPendapatan($month, $year),
            'pendapatan_bulan_lalu'         => $this->labaRugiModel->getJurnalPendapatanBulanLalu($month_bef, $year_bef),
            'beban'                         => $this->labaRugiModel->getJurnalBeban($month, $year),
            'beban_bulan_lalu'              => $this->labaRugiModel->getJurnalBebanBulanLalu($month_bef, $year_bef),
            'date'                          => $bulan,
            'year'                          => $year
        ];

        $data_session       = array(
            'start_date'    => $this->request->getPost('start_date'),
        );

        // dd($data);

        return view('laporan/view_data_laba_rugi', $data);
    }

    public function laba_rugi_pdf()
    {
        $start_date = $this->session->get("start_date");
        $time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
        $newdate            = date("Y-m", strtotime("-1 months", $time));
        $month_bef          = substr($newdate, -2);
        $year_bef           = substr($newdate, 0, -3);
        $data = [
            'title'                         => 'Laba Rugi',
            'pendapatans'                   => $this->labaRugiModel->getJurnalPendapatan($month, $year),
            'pendapatan_bulan_lalu'         => $this->labaRugiModel->getJurnalPendapatanBulanLalu($month_bef, $year_bef),
            'beban'                         => $this->labaRugiModel->getJurnalBeban($month, $year),
            'beban_bulan_lalu'              => $this->labaRugiModel->getJurnalBebanBulanLalu($month_bef, $year_bef),
            'date'                          => $bulan,
            'year'                          => $year
        ];
        $filename = 'Laba Rugi';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/laba_rugi_pdf_file', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function laba_rugi_excel()
    {
        $start_date         = $this->session->get("start_date");
        $time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
        $newdate            = date("Y-m", strtotime("-1 months", $time));
        $month_bef          = substr($newdate, -2);
        $year_bef           = substr($newdate, 0, -3);

        $pendapatans            = $this->labaRugiModel->getJurnalPendapatan($month, $year);
        $pendapatan_bulan_lalu  = $this->labaRugiModel->getJurnalPendapatanBulanLalu($month_bef, $year_bef);
        $bebans                  = $this->labaRugiModel->getJurnalBeban($month, $year);
        $beban_bulan_lalu       = $this->labaRugiModel->getJurnalBebanBulanLalu($month_bef, $year_bef);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->mergeCells('A1:F1');
        $spreadsheet->getActiveSheet()->mergeCells('A2:F2');
        $spreadsheet->getActiveSheet()->mergeCells('A3:F3');
        $sheet->setCellValue('A1', 'HOTEL AHADIAT');
        $sheet->setCellValue('A2', 'Laporan Laba Rugi');
        $sheet->setCellValue('A3', 'Per ' . $bulan . ' ' . $year);

        $sheet->setCellValue('A5', 'Pendapatan');
        $sheet->setCellValue('B5', '');
        $sheet->setCellValue('C5', '-');
        $sheet->setCellValue('D5', '');
        $sheet->setCellValue('E5', '-');
        $sheet->setCellValue('F5', '');

        $total_bulan_lalu = 0;
        foreach ((array)$pendapatan_bulan_lalu as $bulan_lalu) {
            $total_bulan_lalu += $bulan_lalu['nominal'];
            $sheet->setCellValue('A6', 'Pendapatan');
            $sheet->setCellValue('D6', 'Rp ' . number_format($bulan_lalu['nominal']));
        }

        $total_pendapatan = 0;
        foreach ((array)$pendapatans as $pendapatan) {
            $total_pendapatan += $pendapatan['nominal'];
            $sheet->setCellValue('A6', 'Pendapatan');
            $sheet->setCellValue('D6', 'Rp ' . number_format($pendapatan['nominal']));
        }

        $laba_kotor =  $total_pendapatan;

        if ($laba_kotor < 0) {
            $sheet->setCellValue('B8', 'Rugi Kotor');
            $sheet->setCellValue('F8', 'Rp ' . number_format($laba_kotor));
        } else {
            $sheet->setCellValue('B8', 'Laba Kotor');
            $sheet->setCellValue('F8', 'Rp ' . number_format($laba_kotor));
        }

        $sheet->setCellValue('A9', 'Beban');
        $sheet->setCellValue('B9', '');
        $sheet->setCellValue('C9', '');
        $sheet->setCellValue('D9', '');
        $sheet->setCellValue('E9', '');
        $sheet->setCellValue('F9', '');

        $total_beban = 0;
        $total_beban_bulan_lalu = 0;
        $x = 10;
        foreach ((array)$beban_bulan_lalu as $beban) {
            $total_beban += $beban['total'];
            $sheet->setCellValue('A' . $x, $beban['nama_akun']);
            $sheet->setCellValue('D' . $x, 'Rp ' . number_format($beban['nominal']));
            $x++;
        }

        foreach ((array)$bebans as $beban) {
            $total_beban += $beban['nominal'];
            $sheet->setCellValue('A' . $x, $beban['nama_akun']);
            $sheet->setCellValue('D' . $x, 'Rp ' . number_format($beban['nominal']));
            $x++;
        }

        $sheet->setCellValue('B13', 'Total Beban');
        $sheet->setCellValue('F13', '(Rp ' . number_format($total_beban) . ')');

        $laba_bersih = $laba_kotor - $total_beban;

        if ($laba_bersih < 0) {
            $sheet->setCellValue('B14', 'Rugi Bersih');
            $sheet->setCellValue('F14', 'Rp ' . number_format($laba_bersih));
        } else {
            $sheet->setCellValue('B14', 'Laba Bersih');
            $sheet->setCellValue('F14', 'Rp ' . number_format($laba_bersih));
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $i = 15;
        $sheet->getStyle('A5:F' . $i)->applyFromArray($styleArray);

        $style = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            )
        );
        $styleRight = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            )
        );

        $sheet->getStyle("A1:A3")->applyFromArray($style);
        $sheet->getStyle("A5")->applyFromArray($style);
        $sheet->getStyle("D")->applyFromArray($styleRight);
        $sheet->getStyle("F")->applyFromArray($styleRight);

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laba Rugi';

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
