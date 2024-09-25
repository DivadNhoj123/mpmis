<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\NonBoatRegistration;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ExportNonMotorized implements FromCollection, WithHeadings, WithCustomStartCell, WithStyles
{
    public function collection()
    {
        $registrations = NonBoatRegistration::select(
            'owner',
            'address',
            'registration_no',
            'fisherfolk_id',
            'remarks',
            'date_registered'
        )->get();

        // Add custom logic for "Registered" or "Expired" status
        return $registrations->map(function ($registration) {
            $currentDate = Carbon::now(); // Current date and time
            $expiryDate = Carbon::parse($registration->date_registered)->addYear(1); // One-year validity

            // Check if registration is still valid
            $registration->status = $expiryDate->greaterThanOrEqualTo($currentDate) ? 'Registered' : 'Expired';

            // Return an array including the status field and excluding date_registered
            return [
                'owner' => $registration->owner,
                'address' => $registration->address,
                'registration_no' => $registration->registration_no,
                'fisherfolk_id' => $registration->fisherfolk_id,
                'remarks' => $registration->remarks, // Include the remarks field
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
            'REMARKS',
            'STATUS'
        ];
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function styles(Worksheet $sheet)
    {
        $currentYear = Carbon::now()->year;

        // Adding the custom static header
        $sheet->setCellValue('A1', 'Republic of the Philippines');
        $sheet->setCellValue('A2', 'Province of Southern Leyte');
        $sheet->setCellValue('A3', 'MUNICIPALITY OF MALITBOG');
        $sheet->setCellValue('A4', '');
        $sheet->setCellValue('A5', "$currentYear MASTERLIST ON NON-MOTORIZED FISHING BOAT LICENSES & REGISTRATION");

        // Merge cells for the header
        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');
        $sheet->mergeCells('A3:F3');
        $sheet->mergeCells('A4:F4');
        $sheet->mergeCells('A5:F5');

        // Set column widths for columns A to F
        $columns = range('A', 'F');
        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setWidth(15.5);
        }

        // Style the custom header: Bold and center alignment
        $sheet->getStyle('A1:A5')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A1:A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Style the data headings: Bold and yellow fill
        $sheet->getStyle('A7:F7')->getFont()->setBold(true);
        $sheet->getStyle('A7:F7')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFFF00'] // Yellow fill color for the header
            ]
        ]);

        // Align the headings to center
        $sheet->getStyle('A7:F7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set text color for the status column based on its value
        $rowIndex = 8; // Starting from the first data row
        foreach ($sheet->getRowIterator() as $row) {
            if ($rowIndex > 7) { // Skip header row
                $statusCell = "F$rowIndex"; // Assuming status is in column F
                $statusValue = $sheet->getCell($statusCell)->getValue();
                $color = $statusValue === 'Expired' ? 'FF0000' : '008000'; // Red for expired, green for registered
                $sheet->getStyle($statusCell)->getFont()->getColor()->setARGB($color);
            }
            $rowIndex++;
        }

        return $sheet;
    }
}
