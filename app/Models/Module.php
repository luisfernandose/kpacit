<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $guarded = ['id'];

    public function files()
    {
        return $this->hasMany('App\Models\File', 'module_id', 'id');
    }
}
