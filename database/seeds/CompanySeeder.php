<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'id' => 1,
                'fantasy_name' => 'Toro M',
                'company_name' => 'Toro M',
                'cnpj' => '00.000.000/0000-00',
                'cep' => null,
                'street' => null,
                'number' => null,
                'complement' => null,
                'neighborhood' => null,
                'city' => null,
                'state' => null,
                'country' => null
            ],     
            [
                'id' => 2,
                'fantasy_name' => 'Toro T',
                'company_name' => 'Toro T',
                'cnpj' => '00.000.000/0000-00',
                'cep' => null,
                'street' => null,
                'number' => null,
                'complement' => null,
                'neighborhood' => null,
                'city' => null,
                'state' => null,
                'country' => null
            ],            
                
        ];

        foreach ($rows as $key => $row) {
            $exists = Company::where('id', $row['id'])->first();
            if ($exists) {
                $exists->update($row);
                continue;
            }
            $Company = Company::create($row);
        }

    }
}
