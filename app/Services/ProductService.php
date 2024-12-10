<?php

namespace App\Services;

use App\Models\ProductCode;
use LaravelAux\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {

            $codes = $data['codes'];
            unset($data['codes']);

            if ($new = $this->repository->create($data)) {

                if($codes){
                    foreach ($codes as $key => $code) {
                        $cd = ProductCode::create([
                            'product_id' => $new->id,
                            'code' => $code
                        ]);
                    }
                }
                
                if ($new->save()) {
                    DB::commit();
                    return ['status' => '00'];
                }
            }
            DB::rollback();
            return ['status' => '01', 'message' => 'Ocorreu um erro durante a criação do registro'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {

            $codes = $data['codes'];
            unset($data['codes']);

            $entity = $this->repository->find($id);

            if (empty($entity)) {
                DB::rollback();
                return ['status' => '01', 'message' => 'Registro não encontrado'];
            }
            
            if ($entity->update($data)) {
                if($codes){
                    $all = ProductCode::where('product_id', $entity->id)->get();

                    foreach ($all as $key => $v_code) {
                        if(!in_array($v_code->code, $codes)){
                            $v_code->delete();
                        }
                    }
    
                    foreach ($codes as $key => $code) {
                        $cd = ProductCode::firstOrCreate(['code' => $code], [
                            'product_id' => $entity->id,
                            'code' => $code
                        ]);
                    }
                }
            }

            DB::commit();
            return ['status' => '00'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}