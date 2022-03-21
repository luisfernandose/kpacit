<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    protected $table = 'promotions';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'promotion_id', 'id')->whereNull('refund_at');
    }

    public function getIconAttribute($value)
    {
        if(!empty($value)){

            return Storage::url($value);
        }
        return $value;
    }
    
}
