<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SalePayment;
use Illuminate\Http\Request;
use App\Services\SaleService;
use LaravelAux\BaseController;
use App\Http\Requests\SaleRequest;

class SaleController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param SaleService $service
     * @param SaleRequest $request
     */
    public function __construct(SaleService $service)
    {
        parent::__construct($service, new SaleRequest);
    }

    public function saveSale(Request $request){
        $data = $request->all();

        $new = [
            'total' => $data['total'],
            'total_to_pay' => $data['total_to_pay'],
            'cpf' => $data['cpf'],
            'send_nf' => $data['send_nf']
        ];

        $sale = Sale::create($new);

        foreach ($data['itens'] as $key => $item) {
            $new_item = [ 
                'sale_id' => $sale->id, 
                'product_id' => $item['product']['id'],
                'unit_value' => $item['unit_value'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
            ];

            SaleItem::create($new_item);
        }

        foreach ($data['payments'] as $key => $payment) {
            $new_payment = [ 
                'sale_id' => $sale->id, 
                'method' => $payment['method'],
                'value' => $payment['value'],
            ];

            SalePayment::create($new_payment);
        }
    }
}