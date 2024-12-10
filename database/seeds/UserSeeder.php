<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'Luan de Camargo',
                'email' => 'luan@ldcamargo.com',
                'password' => 'password',
                'cpf_cnpj' => '437.430.418-99',
                'rg' => '53.845.943-8',
                'photo' => '',
                'cellphone' => '(11) 95049-1045',
                'access_nivel' => '1',
                'status' => '1',
                'company_id' => 1
            ],               
                
        ];

        foreach ($rows as $key => $row) {
            $exists = User::where('id', $row['id'])->first();
            if ($exists) {
                $exists->update($row);
                continue;
            }
            $user = User::create($row);
        }

    }
}
