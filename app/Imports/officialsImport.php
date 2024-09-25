<?php

namespace App\Imports;

use App\Models\Official;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class OfficialsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $positionMapping = [
            'Punong Barangay' => 1,
            'Sangguniang Barangay Member' => 2,
            'SK Chairperson' => 3,
            'SK Member' => 4,
            'Barangay Treasurer' => 5,
            'Barangay Secretary' => 6,
            'SK Treasurer' => 7,
            'SK Secretary' => 8,
            'Barangay Health Worker' => 9,
            'Nutrition Scholar' => 10,
            'Lupon Member' => 11,
            'Barangay Tanod' => 12,
        ];

        // Skip header row if it contains 'POSITION'
        if (strtoupper($row[4]) === 'POSITION') {
            return null;
        }

        // Map the position from the Excel sheet to the appropriate integer value
        $position = $positionMapping[$row[4]] ?? 0;

        // Check if the position was not found in the mapping
        if ($position === 0) {
            // Log the issue, and skip the insertion for this row
            Log::warning("Position not found: " . $row[4] . " in row: " . implode(', ', $row));
            return null; // Skip the row if the position is invalid
        }

        // Check if the official already exists in the database
        $existingOfficial = Official::where('name', $row[0])
            ->where('middle_name', $row[1])
            ->where('surname', $row[2])
            ->where('suffix', $row[3])
            ->where('position', $position)
            ->where('barangay', $row[5])
            ->first();

        // If the official already exists, skip this row
        if ($existingOfficial) {
            return null;
        }

        // Proceed to create the Official record if it doesn't exist
        return new Official([
            'image' => '1.jpg',           // Placeholder for the image
            'name' => $row[0],            // First Name
            'middle_name' => $row[1],     // Middle Name
            'surname' => $row[2],         // Last Name
            'suffix' => $row[3],          // Suffix
            'position' => $position,      // Mapped Position
            'barangay' => $row[5],        // Barangay
        ]);
    }

}
