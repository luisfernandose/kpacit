<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $table = 'prueba';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];
}
