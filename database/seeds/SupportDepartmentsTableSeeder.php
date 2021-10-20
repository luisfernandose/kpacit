<?php

use Illuminate\Database\Seeder;

class SupportDepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('support_departments')->delete();

        \DB::table('support_departments')->insert(array (
            0 =>
            array (
                'id' => 2,
                'title' => 'Financial',
                'created_at' => 1616404842,
            ),
            1 =>
            array (
                'id' => 3,
                'title' => 'Content',
                'created_at' => 1626249560,
            ),
            2 =>
            array (
                'id' => 4,
                'title' => 'Marketing',
                'created_at' => 1626249572,
            ),
        ));


    }
}