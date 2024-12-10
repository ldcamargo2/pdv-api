<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) 
        {
            if($key == 0){
                continue;
            }

            Product::create([
                'key' => $row[0], 
                'code' => $row[2],
                'description' => $row[3],
                'type' => $row[4],
                'dimension' => $row[5],
                'unity_measure' => $row[6],
                'holes' => $row[7],
                'mixed_or_pure' => $row[8],
                'color' => $row[9],
                'rpm' => $row[10],
                'barcode' => null,
                'stock' => 0,
                'status' => 1,
                'company_id' => $row[1],
            ]);
        }
    }
}
