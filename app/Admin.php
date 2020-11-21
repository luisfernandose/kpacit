<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use App\Models\BaseModel;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use NotificationChannels\WebPush\HasPushSubscriptions;
use App\Traits\Encryptable;

class Admin extends BaseModel implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use HasRoles, Authenticatable, Authorizable;
    use HasPushSubscriptions;
    use Encryptable;
    
    protected $connection = 'common';
    protected $encryptable = [
        'email','mobile'        
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email','mobile','country_code','password','company_id','picture','type','country_id','city_id',"zone_id",'commision','company_name','currency_symbol'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'company_id', 'created_at', 'updated_at',
    ];

    public function scopeSearch($query, $searchText='') {
        return $query
            ->where('name', 'like', "%" . $searchText . "%")
            ->orWhere('email', 'like', "%" . $this->cusencrypt($searchText,env('DB_SECRET')) . "%");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function routeNotificationFor()
    {
        return $this->pushSubscriptions;
    }
}