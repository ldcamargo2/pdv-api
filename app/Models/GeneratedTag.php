<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GeneratedTag extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('company_id', function (Builder $builder) {

            if(auth()->user()){
                $builder->where('company_id', auth()->user()->company_id);
            }
        });
    }

    protected $table = 'generated_tags';
    
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'product_id', 
        'quantity',
        'responsible_id',
        'company_id'
    ];    
    
    public $appends = ['created_at_f'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getCreatedAtFAttribute(){
        return Carbon::parse($this->getAttributes()['created_at'])->format('d/m/Y H:i:s');
    }
}