<?php

use Illuminate\Database\Seeder;

class SubscribesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('subscribes')->delete();

        \DB::table('subscribes')->insert(array (
            0 =>
            array (
                'id' => 3,
                'title' => 'Bronze',
                'usable_count' => 100,
                'days' => 15,
                'price' => 20,
                'icon' => '/assets/default/img/icons/cup.png',
                'description' => 'Suggested for personal usage',
                'is_popular' => 0,
                'created_at' => 1625519780,
            ),
            1 =>
            array (
                'id' => 4,
                'title' => 'Gold',
                'usable_count' => 1000,
                'days' => 30,
                'price' => 100,
                'icon' => '/store/1/default_images/subscribe_packages/gold.svg',
                'description' => 'Suggested for big businesses',
                'is_popular' => 1,
                'created_at' => 1625519568,
            ),
            2 =>
            array (
                'id' => 5,
                'title' => 'Silver',
                'usable_count' => 400,
                'days' => 30,
                'price' => 50,
                'icon' => '/store/1/default_images/subscribe_packages/silver.svg',
                'description' => 'Suggested for small businesses',
                'is_popular' => 0,
                'created_at' => 1625519652,
            ),
        ));


    }
}