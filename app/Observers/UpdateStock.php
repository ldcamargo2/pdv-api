<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Product;
use App\Models\StockMovement;

class UpdateStock
{
    /**
     * Handle the StockMovement "created" event.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return void
     */
    public function created(StockMovement $stockMovement)
    {
        $product = Product::find($stockMovement->product_id);
 
        if($product->erp_code){
            $company = Company::find($product->company_id);
            
            $url = "https://app.omie.com.br/api/v1/estoque/ajuste/";
        
            $data = array(
                "call" => "IncluirAjusteEstoque",
                "app_key" => $company->omie_token,
                "app_secret" => $company->omie_secret,
                "param" => array(
                    array(
                        "id_prod" => $product->erp_code,
                        "quan" => $stockMovement->actual_value,
                        "codigo_local_estoque" => 0,
                        "data" => Carbon::now()->format('d/m/Y'),
                        "obs" => 'Atualização via EstoqueFlex - ('.$stockMovement->id.')',
                        "origem" => 'AJU',
                        "tipo" => 'SLD',
                        "motivo" => 'INV',
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
        }
    }

    /**
     * Handle the StockMovement "updated" event.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return void
     */
    public function updated(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Handle the StockMovement "deleted" event.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return void
     */
    public function deleted(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Handle the StockMovement "restored" event.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return void
     */
    public function restored(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Handle the StockMovement "force deleted" event.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return void
     */
    public function forceDeleted(StockMovement $stockMovement)
    {
        //
    }
}
