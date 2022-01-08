<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\JurnalModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Jurnal extends BaseController
{
    protected $jurnalModel;
    protected $session;

    public function __construct()
    {
        $this->jurnalModel = new JurnalModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title'             => 'Jurnal Umum',
            'data_jurnals'      => $this->jurnalModel->getJurnal(),
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_jurnal_umum', $data);
    }

    public function show_data_jurnal()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));
        $time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
        $data_session       = array(
            'start_date'    => $this->request->getPost('start_date'),
        );

        $this->session->set($data_session);
        $data = [
            'title'             => 'Jurnal Umum',
            'data_jurnals'      => $this->jurnalModel->getJurnal($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_jurnal_umum', $data);
    }

    public function jurnal_umum_pdf()
    {
        $start_date = $this->session->get("start_date");
		$time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);
        $data = [
            'title'             => 'Jurnal Umum',
            'data_jurnals'      => $this->jurnalModel->getJurnal($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];
        $filename = 'Jurnal';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/jurnal_pdf_file', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function jurnal_umum_excel()
	{
		$start_date = $this->session->get("start_date");
		$time               = strtotime($start_date);
        $month              = date("m", $time);
        $year               = date("Y", $time);
        $bulan              = date("F", $time);

		$data = $this->jurnalModel->getJurnalExport($month, $year);
        // dd($data);

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
		$sheet->setCellValue('A2', 'Jurnal Umum');
		$sheet->setCellValue('A3', 'Per ' . $bulan . ' ' . $year);

		$sheet->setCellValue('A5', 'ID Jurnal');
		$sheet->setCellValue('B5', 'Tanggal');
		$sheet->setCellValue('C5', 'Akun');
		$sheet->setCellValue('D5', 'Reff');
		$sheet->setCellValue('E5', 'Debet');
		$sheet->setCellValue('F5', 'Kredit');

		$no = 1;
		$x = 6;
		foreach ($data as $row) {
			$sheet->setCellValue('A' . $x, $row['id_jurnal']);
			$sheet->setCellValue('B' . $x, $row['tanggal']);
			if ($row['posisi'] == 'd') :
				$sheet->setCellValue('C' . $x, $row['nama_akun']);
			else :
				$sheet->setCellValue('C' . $x, '       ' . $row['nama_akun']);
			endif;
			$sheet->setCellValue('D' . $x, $row['id_akun']);
			if ($row['posisi'] == 'd') {
				$sheet->setCellValue('E' . $x, 'Rp ' . number_format($row['nominal']));
				$sheet->setCellValue('F' . $x, 'Rp -');
			} else {
				$sheet->setCellValue('E' . $x, 'Rp -');
				$sheet->setCellValue('F' . $x, 'Rp ' . number_format($row['nominal']));
			}
			$x++;
		}

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
		$x = $x - 1;
		$sheet->getStyle('A5:F' . $x)->applyFromArray($styleArray);

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
		$sheet->getStyle("D")->applyFromArray($style);
		$sheet->getStyle("E")->applyFromArray($styleRight);
		$sheet->getStyle("F")->applyFromArray($styleRight);

		$writer = new Xlsx($spreadsheet);
		$filename = 'Jurnal';

        ob_end_clean();
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

}
