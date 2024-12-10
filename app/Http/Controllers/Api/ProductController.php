<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductCode;
use App\Models\GeneratedTag;
use Illuminate\Http\Request;
use App\Models\StockMovement;
use LaravelAux\BaseController;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ProductController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param ProductService $service
     * @param ProductRequest $request
     */
    public function __construct(ProductService $service)
    {
        parent::__construct($service, new ProductRequest);
    }

    public function getProduct(Request $request){
        $data = $request->all();

        if(intval($data['product'])){
            $code = ProductCode::where('code', $data['product'])->first();

            if(!$code){                
                return response()->json('Produto não cadastrado.', 500);
            }

            $product = Product::find($code->product_id);
            
            return $product;
        }

    }

    public function printBarcode($id, $quantity = 0){
        $product = Product::where('id', $id)->with(['company'])->first();

        GeneratedTag::create([
            'product_id' => $product->id, 
            'quantity' => $quantity,
            'responsible_id' => 1
        ]);

        $generator = new BarcodeGeneratorPNG();

        $barcode = base64_encode($generator->getBarcode($product->code, $generator::TYPE_CODE_128, 2, 80));

        return view('tag', ['barcode' => $barcode, 'product' => $product, 'quantity' => $quantity]);
    }

    public function saveStock(Request $request){
        $data = $request->all();

        $product = Product::where('code', $data['code'])->first();
        
        $last = $product->stock;

        $product->stock = $data['stock'];
        $product->save();

        $new_movement = [
            'product_id' => $product->id,
            'last_value' => $last,
            'moved_value' => $data['stock'],
            'actual_value' => $product->stock,
            'operation' => '999',
            'responsible_id' => auth()->user()->id,
            'confirmed_at' => Carbon::now(),
            'confirmed_by' => auth()->user()->id
        ];

        StockMovement::create($new_movement);
    }

    public function confirmMovement(Request $request){
        $data = $request->all();

        $product = Product::where('code', $data['product_code'])->first();
        $movement = StockMovement::where('product_id', $product->id)->whereNull('confirmed_by')->orderBy('created_at', 'desc')->first();

        if(!$product){
            return response()->json('Produto não cadastrado.', 500);
        }

        if(!$movement){
            return response()->json('Produto não possui pendência de movimentação de estoque.', 500);
        }

        $last = $product->stock;

        if($movement->operation == 1){
            $product->stock = $last + $movement->moved_value;
        } else {
            $product->stock = $last - $movement->moved_value;
        }

        $product->save();

        $movement->confirmed_at = Carbon::now();
        $movement->confirmed_by = auth()->user()->id;

        $movement->save();
    }

    public function movement(Request $request){
        $data = $request->all();

        $product = Product::where('code', $data['product_code'])->first();

        if(!$product){
            return response()->json('Produto não cadastrado.', 500);
        }

        if($product->stock <= 0 && $data['operation'] == 2){            
            return response()->json('O estoque deste produto está zerado, não é possível dar saída do estoque.', 500);
        }

        $last = $product->stock;

        // if($data['operation'] == 1){
        //     $product->stock = $last + $product->quantity_default;
        // } else {
        //     $product->stock = $last - $product->quantity_default;
        // }

        $product->save();

        $new_movement = [
            'product_id' => $product->id,
            'last_value' => $last,
            'moved_value' => $product->quantity_default,
            'actual_value' => $product->stock,
            'operation' => $data['operation'],
            'responsible_id' => auth()->user()->id
        ];

        StockMovement::create($new_movement);
    }

    public function manualMovement(Request $request){
        $data = $request->all();

        $product = Product::where('code', $data['product_code'])->first();

        if(!$product){
            return response()->json('Produto não cadastrado.', 500);
        }

        if($product->stock <= 0 && $data['operation'] == 2){            
            return response()->json('O estoque deste produto está zerado, não é possível dar saída do estoque.', 500);
        }

        $last = $product->stock;

        if($data['operation'] == 1){
            $product->stock = $last + $data['quantity'];
        } else {
            $product->stock = $last - $data['quantity'];
        }

        $product->save();

        $new_movement = [
            'product_id' => $product->id,
            'last_value' => $last,
            'moved_value' => $data['quantity'],
            'actual_value' => $product->stock,
            'operation' => $data['operation'],
            'responsible_id' => auth()->user()->id,
            'confirmed_at' => Carbon::now(),
            'confirmed_by' => auth()->user()->id
        ];

        StockMovement::create($new_movement);
    }
}