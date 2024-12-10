<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductCode;
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

            $new = [
                'description' => $row[2],
                'type' => $row[3],
                'stock' => str_replace(',', '.', $row[4]),
                'output_value' => $row[5],
                'input_value' => $row[6],
                'status' => 1,
                'company_id' => $row[0],
            ];

            $product = Product::create($new);

            $new_code = [
                'product_id' => $product->id,
                'code' => $row[1]
            ];

            ProductCode::create($new_code);
        }
    }
}
