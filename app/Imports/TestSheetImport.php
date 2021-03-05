<?php


namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TestSheetImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'ImportProduct' => new ImportProduct()
        ];
    }
}
