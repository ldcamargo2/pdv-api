<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Console\Command;

class OmieImportStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'omie:import_stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa estoque da plataforma Omie';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $companies = Company::whereNotNull('omie_token')->get();

        foreach ($companies as $key => $company) {
            $url = "https://app.omie.com.br/api/v1/estoque/consulta/";

            $products = Product::where('company_id', $company->id)->get();

            foreach ($products as $key => $product) {

                $data = array(
                    "call" => "PosicaoEstoque",
                    "app_key" => $company->omie_token,
                    "app_secret" => $company->omie_secret,
                    "param" => array(
                        array(
                            "id_prod" => $product->erp_code
                        )
                    )
                );

                $payload = json_encode($data);

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

                $response = curl_exec($ch);

                if (curl_errno($ch)) {
                    $this->error('Error:' . curl_error($ch));
                    return;
                } 
                
                $return = json_decode($response);
                
                curl_close($ch);

                $product->stock = $return->saldo;
                $product->minimum_stock = $return->estoque_minimo;
                $product->save();
                
                sleep(1);
            }
        }
    }
}
