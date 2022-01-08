<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\BukuBesarModel;
use \App\Models\CoaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;


class BukuBesar extends BaseController
{
    protected $bukuBesarModel;
    protected $coaModel;
    protected $session;

    public function __construct()
    {
        $this->bukuBesarModel = new BukuBesarModel();
        $this->coaModel = new CoaModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => $this->bukuBesarModel->getBukuBesar(),
            'list_akun'             => $this->coaModel->getListAkun(),
            'posisi_saldo_normal'   => '',
            'saldo_awal'            => 0,
            'date'                  => '',
            'year'                  => '',
            'id_akun'               => ''
        ];
        return view('laporan/view_data_buku_besar', $data);
    }

    public function show_data_buku_besar()
    {
        $akun = $this->request->getPost('id_akun');
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);
        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => $this->bukuBesarModel->getBukuBesar($akun, $month, $year),
            'list_akun'             => $this->coaModel->getListAkun(),
            'posisi_saldo_normal'   => $this->bukuBesarModel->getPosisiSaldoNormal($akun),
            'saldo_awal'            => $this->bukuBesarModel->getSaldoAwalBukuBesar($akun, $month, $year),
            'date'                  => $bulan,
            'year'                  => $year,
            'id_akun'               => $akun
        ];
        $data_session       = array(
            'akun'          => $akun,
            'start_date'    => $this->request->getPost('start_date'),
        );
        // dd($data);
        $this->session->set($data_session);
        return view('laporan/view_data_buku_besar', $data);
    }

    public function buku_besar_pdf()
    {
        $start_date         = $this->session->get("start_date");
        $akun               = $this->session->get("akun");
		$time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
        $data = [
            'title'                 => 'Buku Besar',
            'buku_besar'            => $this->bukuBesarModel->getBukuBesar($akun, $month, $year),
            'list_akun'             => $this->coaModel->getListAkun(),
            'posisi_saldo_normal'   => $this->bukuBesarModel->getPosisiSaldoNormal($akun),
            'saldo_awal'            => $this->bukuBesarModel->getSaldoAwalBukuBesar($akun, $month, $year),
            'date'                  => $bulan,
            'year'                  => $year,
            'id_akun'               => $akun
        ];
        $filename = 'Buku Besar';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/buku_besar_pdf_file', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function buku_besar_excel()
	{
		$start_date         = $this->session->get("start_date");
        $akun               = $this->session->get("akun");
		$time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
		$buku_besar = $this->bukuBesarModel->getBukuBesar($akun, $month, $year);
		$posisi_saldo_normal = $this->bukuBesarModel->getPosisiSaldoNormal($akun);
		$saldo_awal = $this->bukuBesarModel->getSaldoAwalBukuBesar($akun, $month, $year);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->mergeCells('A1:G1');
		$spreadsheet->getActiveSheet()->mergeCells('A2:G2');
		$spreadsheet->getActiveSheet()->mergeCells('A3:G3');
		$sheet->setCellValue('A1', 'HOTEL AHADIAT');
		$sheet->setCellValue('A2', 'Buku Besar');
		$sheet->setCellValue('A3', 'Per ' . $bulan . ' ' . $year);

		$sheet->setCellValue('A5', 'Tanggal');
		$sheet->setCellValue('B5', 'Nama Akun');
		$sheet->setCellValue('C5', 'No Akun');
		$sheet->setCellValue('D5', 'Debet');
		$sheet->setCellValue('E5', 'Kredit');
		$sheet->setCellValue('F5', 'Saldo Debet');
		$sheet->setCellValue('G5', 'Saldo Kredit');

		$sheet->setCellValue('A6', '-');
		$sheet->setCellValue('B6', 'Saldo Awal');
		$sheet->setCellValue('C6', '-');
		$sheet->setCellValue('D6', '-');
		$sheet->setCellValue('E6', '-');
		if (strcmp($posisi_saldo_normal, 'd') == 0) {
			$sheet->setCellValue('F6', 'Rp ' . number_format($saldo_awal));
			$sheet->setCellValue('G6', '-');
			$saldo_debet = $saldo_awal;
			$saldo_kredit = 0;
		} else {
			$sheet->setCellValue('F6', '-');
			$sheet->setCellValue('G6', 'Rp ' . number_format($saldo_awal));
			$saldo_debet = 0;
			$saldo_kredit = $saldo_awal;
		}


		$no = 1;
		$x = 7;
		foreach ($buku_besar as $cacah) {
			$sheet->setCellValue('A' . $x, $cacah['tanggal']);
			if ($cacah['posisi'] == 'd') :
				$sheet->setCellValue('B' . $x, $cacah['nama_akun']);
			else :
				$sheet->setCellValue('B' . $x, '       ' . $cacah['nama_akun']);
			endif;
			$sheet->setCellValue('C' . $x, $cacah['id_akun']);
			if (strcmp($cacah['posisi'], 'd') == 0) {
				$sheet->setCellValue('D' . $x, 'Rp ' . number_format($cacah['nominal']));
				$sheet->setCellValue('E' . $x, '-');
				if (strcmp($posisi_saldo_normal, 'd') == 0) {
					$saldo_debet = $saldo_debet  + $cacah['nominal'];
					$sheet->setCellValue('F' . $x, 'Rp ' . number_format($saldo_debet));
					$sheet->setCellValue('G' . $x, 'Rp ' . number_format($saldo_kredit));
				} else {
					$saldo_kredit = $saldo_kredit  + $cacah['nominal'];
					$sheet->setCellValue('F' . $x, 'Rp ' . number_format($saldo_debet));
					$sheet->setCellValue('G' . $x, 'Rp ' . number_format($saldo_kredit));
				}
			} else {
				$sheet->setCellValue('D' . $x, '-');
				$sheet->setCellValue('E' . $x, 'Rp ' . number_format($cacah['nominal']));
				if (strcmp($posisi_saldo_normal, 'd') == 0) {
					$saldo_debet = $saldo_debet  - $cacah['nominal'];
					$sheet->setCellValue('F' . $x, 'Rp ' . number_format($saldo_debet));
					$sheet->setCellValue('G' . $x, 'Rp ' . number_format($saldo_kredit));
				} else {
					$saldo_kredit = $saldo_kredit  + $cacah['nominal'];
					$sheet->setCellValue('F' . $x, 'Rp ' . number_format($saldo_debet));
					$sheet->setCellValue('G' . $x, 'Rp ' . number_format($saldo_kredit));
				}
			}
			$x++;
		}
		if (strcmp($posisi_saldo_normal, 'd') == 0) {
			$saldo_akhir = $saldo_debet - $saldo_kredit;
		} else {
			$saldo_akhir = $saldo_kredit - $saldo_debet;
		}

		$sheet->setCellValue('A' . $x, '-');
		$sheet->setCellValue('B' . $x, 'Saldo Akhir');
		$sheet->setCellValue('C' . $x, '-');
		$sheet->setCellValue('D' . $x, '-');
		$sheet->setCellValue('E' . $x, '-');
		if (strcmp($posisi_saldo_normal, 'd') == 0) {
			$sheet->setCellValue('F' . $x, 'Rp ' . number_format($saldo_akhir));
			$sheet->setCellValue('G' . $x, '-');
		} else {
			$sheet->setCellValue('F' . $x, '-');
			$sheet->setCellValue('G' . $x, 'Rp ' . number_format($saldo_akhir));
		}

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
		$sheet->getStyle('A5:G' . $x)->applyFromArray($styleArray);

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
		$sheet->getStyle("A5:G5")->applyFromArray($style);
		$sheet->getStyle("C")->applyFromArray($style);
		$sheet->getStyle("D")->applyFromArray($styleRight);
		$sheet->getStyle("E")->applyFromArray($styleRight);
		$sheet->getStyle("F")->applyFromArray($styleRight);
		$sheet->getStyle("G")->applyFromArray($styleRight);

		$writer = new Xlsx($spreadsheet);
		$filename = 'Buku Besar';

		ob_end_clean();
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

}
