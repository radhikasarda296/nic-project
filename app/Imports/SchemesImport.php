<?php

namespace App\Imports;

use App\Models\Scheme;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;

class SchemesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Scheme|null
     */
    public function model(array $row)
    {
       if(!empty($row[0])){
           return new Scheme([
               'id' => $row['0'],
               'scheme_code' => $row['1'],
               'scheme_name' => $row['2'],
               'central_state_scheme' => $row['3'],
               'fin_year' => $row['4'],
               'state_disbursement' => $row['5'],
               'central_disbursement' => $row['6'],
               'total_disbursement' => $row['7']
           ]);
       }
    }
}
