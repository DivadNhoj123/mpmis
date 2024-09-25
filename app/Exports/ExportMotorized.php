<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\BoatRegistration;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ExportMotorized implements FromCollection, WithHeadings, WithCustomStartCell, WithStyles
{
    public function collection()
    {
        $registrations = BoatRegistration::select(
            'owner',
            'address',
            'registration_no',
            'fisherfolk_id',
            'name_of_boat',
            'engine',
            'engine_serial',
            'hp',
            'color',
            'tonnage',
            'date_registered' // Include this for calculations only
        )->get();

        // Add custom logic for "Registered" or "Expired" status
        return $registrations->map(function ($registration) {
            $currentDate = Carbon::now(); // Current date and time
            $expiryDate = Carbon::parse($registration->date_registered)->addYear(1); // One-year validity

            // Check if registration is still valid
            $registration->status = $expiryDate->greaterThanOrEqualTo($currentDate) ? 'Registered' : 'Expired';

            // Return an array excluding date_registered
            return [
                'owner' => $registration->owner,
                'address' => $registration->address,
                'registration_no' => $registration->registration_no,
                'fisherfolk_id' => $registration->fisherfolk_id,
                'name_of_boat' => $registration->name_of_boat,
                'engine' => $registration->engine,
                'engine_serial' => $registration->engine_serial,
                'hp' => $registration->hp,
                'color' => $registration->color,
                'tonnage' => $registration->tonnage,
                'status' => $registration->status, // Include the status field
            ];
        });
    }

    public function headings(): array
    {
        // Data column headings
        return [
            'NAME OF OWNER/OPERATOR',
            'ADDRESS',
            'REGISTRATION #',
            'FISHERFOLK I.D. #',
            'NAME OF BOAT',
            'ENGINE/MODEL',
            'ENGINE SERIAL #',
            'HP',
            'COLOR',
            'NET REGISTERED TONNAGE',
            'REMARKS'
        ];
    }

    public function startCell(): string
    {
        return 'A7'; // Start data after custom header
    }

    public function styles(Worksheet $sheet)
    {
        $currentYear = Carbon::now()->year;

        // Adding the custom static header
        $sheet->setCellValue('A1', 'Republic of the Philippines');
        $sheet->setCellValue('A2', 'Province of Southern Leyte');
        $sheet->setCellValue('A3', 'MUNICIPALITY OF MALITBOG');
        $sheet->setCellValue('A4', '');
        $sheet->setCellValue('A5', "$currentYear MASTERLIST ON MOTORIZED FISHING BOAT LICENSES & REGISTRATION");

        // Merge cells for the header
        $sheet->mergeCells('A1:K1');
        $sheet->mergeCells('A2:K2');
        $sheet->mergeCells('A3:K3');
        $sheet->mergeCells('A4:K4');
        $sheet->mergeCells('A5:K5');

        // Set column widths for columns A to K
        $columns = range('A', 'K');
        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setWidth(15.5);
        }

        // Style the custom header: Bold and center alignment
        $sheet->getStyle('A1:A5')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Style the data headings: Bold and yellow fill
        $sheet->getStyle('A7:K7')->getFont()->setBold(true);
        $sheet->getStyle('A7:K7')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFFF00'] // Yellow fill color for the header
            ]
        ]);

        // Align the headings to center
        $sheet->getStyle('A7:K7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set text color for the status column based on its value
        $rowIndex = 8; // Starting from the first data row
        foreach ($sheet->getRowIterator() as $row) {
            if ($rowIndex > 7) { // Skip header row
                $statusCell = "K$rowIndex"; // Assuming status is in column K
                $statusValue = $sheet->getCell($statusCell)->getValue();
                $color = $statusValue === 'Expired' ? 'FF0000' : '008000'; // Red for expired, green for registered
                $sheet->getStyle($statusCell)->getFont()->getColor()->setARGB($color);
            }
            $rowIndex++;
        }

        return $sheet;
    }
}
