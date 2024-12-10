<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('company_id', function (Builder $builder) {

            if(auth()->user()){
                $builder->where('company_id', auth()->user()->company_id);
            }
        });
    }

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'key', 
        'code',
        'description',
        'type',
        'dimension',
        'unity_measure',
        'holes',
        'mixed_or_pure',
        'color',
        'rpm',
        'barcode',
        'stock',
        'status',
        'company_id',
        'quantity_default',
        'minimum_stock',
        'erp_code',
        'supplier_id',
        'input_value',
        'output_value',
    ];

    public $appends = ['barcode_url', 'stock_status', 'product_stripped'];

    public function getStockStatusAttribute(){

        if($this->stock == 0){
            return 'badge badge-danger';  // Estoque crítico
        }

        $limiteCritico = $this->minimum_stock * 0.10;

        if ($this->stock < $limiteCritico) {
            return 'badge badge-danger';  // Estoque crítico
        } elseif ($this->stock < $this->minimum_stock) {
            return 'badge badge-warning'; // Estoque abaixo do mínimo
        } else {
            return 'badge badge-success'; // Estoque acima do mínimo
        }
    }

    public function getBarcodeUrlAttribute(){
        return env('APP_URL').'/print_barcode/'.$this->id;
    }

    public function getProductStrippedAttribute(){
        $limite = 35;

        if(strlen($this->description) > $limite) {
            return substr($this->description, 0, $limite) . '...';
        }
        return $this->description;
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    public function movements()
    {
        return $this->hasMany(StockMovement::class, 'product_id', 'id')->with('responsible')->orderBy('id', 'desc');
    }

    public function codes()
    {
        return $this->hasMany(ProductCode::class, 'product_id', 'id');
    }
}