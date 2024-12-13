<?php

namespace App\Exports;

use App\Models\Supplier;
use App\Models\Produksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PemasokSheet implements FromCollection, WithHeadings, WithTitle, WithStyles, ShouldAutoSize
{
    protected $suppliers;

    public function __construct()
    {
        $this->suppliers = Supplier::all();
    }

    public function collection()
    {
        $data = [];
        foreach ($this->suppliers as $index => $supplier) {
            $hariIniValue = Produksi::where('supplier_id', $supplier->id)
                ->whereDate('tanggal_produksi', today())
                ->sum('cpo_diproduksi');

            $sdHariIniValue = Produksi::where('supplier_id', $supplier->id)
                ->whereDate('tanggal_produksi', '<=', today())
                ->sum('cpo_diproduksi');

            $data[] = [
                'No' => $index + 1,
                'Nama Pemasok' => $supplier->nama_pemasok,
                'Hari Ini (kg)' => $hariIniValue,
                'S/D Hari Ini (kg)' => $sdHariIniValue,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Pemasok',
            'Hari Ini (kg)',
            'S/D Hari Ini (kg)',
        ];
    }

    public function title(): string
    {
        return 'Pemasok';
    }

    public function styles(Worksheet $sheet)
    {
        $suppliers = $this->suppliers;

        $sheet->mergeCells('A1:F1');  // PT. KARYA BANGSA INDONESIA - PKS
        $sheet->mergeCells('A2:F2');  // LAPORAN HARIAN PRODUKSI
        $sheet->mergeCells('A3:B3');  // Hari Olah
        $sheet->mergeCells('D3:E3');  // Tanggal

        $sheet->setCellValue('A1', 'PT. KARYA BANGSA INDONESIA - PKS');
        $sheet->setCellValue('A2', 'LAPORAN HARIAN PRODUKSI');
        $sheet->setCellValue('A3', 'Hari Olah:');
        $sheet->setCellValue('D3', 'Tanggal: ' . today()->format('d-m-Y'));

        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => ['horizontal' => 'center'],
        ]);
        $sheet->getStyle('A2:F2')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => ['horizontal' => 'center'],
        ]);
        $sheet->getStyle('A3:B3')->getFont()->setBold(true);
        $sheet->getStyle('D3:E3')->getFont()->setBold(true);

        // Table headers
        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Nama Pemasok');
        $sheet->setCellValue('C4', 'HARI INI (kg)');
        $sheet->setCellValue('D4', 'S/D HARI INI (kg)');

        $sheet->getStyle('A4:D4')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'center'],
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
        ]);

        $sheet->getColumnDimension('A')->setWidth(5);   // "No" column width
        $sheet->getColumnDimension('B')->setWidth(25);  // "Nama Pemasok" column width
        $sheet->getColumnDimension('C')->setWidth(15);  // "HARI INI (kg)" column width
        $sheet->getColumnDimension('D')->setWidth(20);  // "S/D HARI INI (kg)" column width

        $rowCount = 6;
        foreach ($suppliers as $index => $supplier) {
            $hariIniValue = Produksi::where('supplier_id', $supplier->id)
                ->whereDate('tanggal_produksi', today())
                ->sum('cpo_diproduksi');

            $sdHariIniValue = Produksi::where('supplier_id', $supplier->id)
                ->whereDate('tanggal_produksi', '<=', today())
                ->sum('cpo_diproduksi');

            $sheet->setCellValue('A' . $rowCount, $index + 1);
            $sheet->setCellValue('B' . $rowCount, $supplier->nama_pemasok);
            $sheet->setCellValue('C' . $rowCount, $hariIniValue);
            $sheet->setCellValue('D' . $rowCount, $sdHariIniValue);

            $sheet->getStyle('A' . $rowCount . ':D' . $rowCount)->applyFromArray([
                'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
            ]);
            $sheet->getStyle('A' . $rowCount . ':D' . $rowCount)->getAlignment()->setHorizontal('center');

            $rowCount++;
        }
    }
}
