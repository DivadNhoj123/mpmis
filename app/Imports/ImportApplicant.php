<?php

namespace App\Imports;

use App\Models\Tupad;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportApplicant implements ToCollection
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        $rows->shift();

        foreach ($rows as $row) {
            if (!empty($row[0]) && !empty($row[2])) {
                Tupad::create([
                    'name' => $row[0],         // Name
                    'initial' => $row[1] ?? null,   // Initials
                    'surname' => $row[2],      // Surname
                    'barangay' => $row[3] ?? null,  // Barangay
                    'status' => $row[4] ?? 'unknown', // Status
                ]);
            } else {

            }
        }
    }
}
