<?php

namespace App\Models;

use App\Models\Branch;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'users';

    protected $guarded = [
        'id'
    ];
    
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'cpf_cnpj', 
        'photo', 
        'cellphone',
        'access_nivel', 
        'status',
        'company_id'
    ];
    
    protected $dates = ['deleted_at'];

    /**
     * Method to hash Password
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Method to get Photo Attribute
     *
     * @return string
     */
    public function getPhotoAttribute()
    {
        return env('APP_URL') . '/user/image/' . $this->id;
    }

    /**
     * Method to get Photo Raw Attribute
     *
     * @return mixed
     */
    public function getPhotoRawAttribute()
    {
        return 'user/' . $this->id . '/perfil.png';
    }

}