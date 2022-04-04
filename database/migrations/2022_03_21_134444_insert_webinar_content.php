<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Webinar;
use App\Models\File;
use App\Models\TextLesson;
use App\Models\Session;
use App\Models\WebinarContent;

class InsertWebinarContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $webinars = Webinar::all();

        if(!empty($webinars)){
            foreach($webinars as $webinar){

                $files = File::where('webinar_id',$webinar->id)->get();
                $order = 0;
                
                if(!empty($files)){
                   
                    foreach($files as $file){

                        WebinarContent::create([
                            'creator_id' => $file->creator_id,
                            'webinar_id' => $webinar->id,
                            'module_id' => $file->module_id,
                            'resource_type' => 'file',
                            'resource_id' => $file->id,
                            'order' => $order,
                            'created_at' => now()
                        ]);
                        $order++;
                    }
                }
            }

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
