<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TrendCategory extends Model
{
    protected $table = 'trend_categories';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        if(!empty($this->icon)){

            return Storage::url($this->icon);
        }
        return $this->icon;

    }
}
