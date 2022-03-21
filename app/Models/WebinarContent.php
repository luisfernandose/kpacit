<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebinarContent extends Model
{
    protected $table = 'webinars_contents';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];

    static $active = 'active';
    static $pending = 'pending';
    static $isDraft = 'is_draft';
    static $inactive = 'inactive';

    static $webinar = 'webinar';
    static $course = 'course';
    static $textLesson = 'text_lesson';

    static $statuses = [
        'active', 'pending', 'is_draft', 'inactive',
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }
    public function module()
    {
        return $this->belongsTo('App\Module', 'module_id', 'id');
    }
    public function file()
    {
        return $this->belongsTo('App\Models\File', 'resource_id', 'id');
    }
    public function session()
    {
        return $this->belongsTo('App\Models\Session', 'resource_id', 'id');
    }
    public function textLesson()
    {
        return $this->belongsTo('App\Models\TextLesson', 'resource_id', 'id');
    }

    public function getContentType()
    {
        switch ($this->resource_type) {
            case 'file':
                return trans('panel.file');
                break;
            case 'session':
                return trans('panel.session');
                break;
            case 'text':
                return trans('panel.text_lesson');
                break;
        }

    }
    public function getContentTitle()
    {
        switch ($this->resource_type) {
            case 'file':
                return $this->file->title;
                break;
            case 'session':
                return $this->session->title;
                break;
            case 'text':
                return $this->textLesson->title;
                break;
        }

    }

}
