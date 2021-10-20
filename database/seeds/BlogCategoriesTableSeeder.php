<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('blog_categories')->delete();

        \DB::table('blog_categories')->insert(array (
            0 =>
            array (
                'id' => 33,
                'title' => 'Announcements',
                'slug' => 'Vel-consequatur',
            ),
            1 =>
            array (
                'id' => 34,
                'title' => 'Articles',
                'slug' => 'Facilis-ea',
            ),
            2 =>
            array (
                'id' => 36,
                'title' => 'Events',
                'slug' => 'Fugit-dignissimos-possimus',
            ),
            3 =>
            array (
                'id' => 37,
                'title' => 'News',
                'slug' => 'new',
            ),
        ));


    }
}