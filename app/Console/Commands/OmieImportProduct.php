<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Console\Command;

class OmieImportProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'omie:import_products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa produtos da plataforma Omie';

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
            $url = "https://app.omie.com.br/api/v1/geral/produtos/";

            $total_paginas = 1;
            $pagina = 1;

            while ($pagina <= $total_paginas) {

                if($pagina == 3){
                    $a = true;
                }

                $data = array(
                    "call" => "ListarProdutos",
                    "app_key" => $company->omie_token,
                    "app_secret" => $company->omie_secret,
                    "param" => array(
                        array(
                            "pagina" => $pagina,
                            "registros_por_pagina" => 500,
                            "apenas_importado_api" => "N",
                            "filtrar_apenas_omiepdv" => "N"
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

                foreach ($return->produto_servico_cadastro as $key => $value) {
                    $product = [
                        'key' => $value->descricao, 
                        'code' => $value->codigo,
                        'description' => $value->descricao,
                        'type' => $value->descricao_familia,
                        'dimension' => null,
                        'unity_measure' => null,
                        'holes' => null,
                        'mixed_or_pure' => null,
                        'color' => null,
                        'rpm' => null,
                        'barcode' => null,
                        'stock' => 0,
                        'status' => $value->inativo == 'N' ? 1 : 0,
                        'company_id' => $company->id,
                        'quantity_default' => 0,
                        'minimum_stock' => 0,
                        'erp_code' => $value->codigo_produto,
                    ];
    
                    $product = Product::firstOrCreate(['erp_code' => $value->codigo_produto],$product);  
                }                

                $total_paginas = $return->total_de_paginas;
                $pagina++;
                sleep(1);
            }
        }
    }
}
