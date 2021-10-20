<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('promotions')->delete();

        \DB::table('promotions')->insert(array (
            0 =>
            array (
                'id' => 2,
                'title' => 'Gold',
                'days' => 15,
                'price' => 150,
                'icon' => '/store/1/default_images/subscribe_packages/gold.svg',
                'is_popular' => 1,
                'description' => 'One of your classes will be displayed at the top of the category list and homepage slider',
                'created_at' => 1625992059,
            ),
            1 =>
            array (
                'id' => 3,
                'title' => 'Bronze',
                'days' => 15,
                'price' => 50,
                'icon' => '/store/1/default_images/subscribe_packages/bronze.svg',
                'is_popular' => 0,
                'description' => 'One of your classes will be displayed at the top of the category list',
                'created_at' => 1625991921,
            ),
            2 =>
            array (
                'id' => 4,
                'title' => 'Silver',
                'days' => 15,
                'price' => 90,
                'icon' => '/store/1/default_images/subscribe_packages/silver.svg',
                'is_popular' => 0,
                'description' => 'One of your classes will be displayed at the homepage slider',
                'created_at' => 1625991978,
            ),
        ));


    }
}