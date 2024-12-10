<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'product_id', 
        'last_value',
        'moved_value',
        'actual_value',
        'operation',
        'responsible_id',
        'confirmed_at',
        'confirmed_by'
    ];
    
    public $appends = ['created_at_f'];

    public function responsible()
    {
        return $this->hasOne(User::class, 'id', 'responsible_id');
    }

    public function getCreatedAtFAttribute(){
        return Carbon::parse($this->getAttributes()['created_at'])->format('d/m/Y H:i:s');
    }
}