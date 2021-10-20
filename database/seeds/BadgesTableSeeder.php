<?php

use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('badges')->delete();

        \DB::table('badges')->insert(array (
            0 =>
            array (
                'id' => 21,
                'title' => 'Nuevo Usuario',
                'description' => 'Tiene 1 curso',
                'image' => '/store/1/default_images/badges/new_user.svg',
                'type' => 'register_date',
                'condition' => '{"from":"1","to":"30"}',
                'created_at' => 1625553769,
            ),
            1 =>
            array (
                'id' => 22,
                'title' => 'Usuario Real',
                'description' => '6 meses de suscripción',
                'image' => '/store/1/default_images/badges/loyal_user.svg',
                'type' => 'register_date',
                'condition' => '{"from":"31","to":"180"}',
                'created_at' => 1625554171,
            ),
            2 =>
            array (
                'id' => 23,
                'title' => 'Usuario fiel',
                'description' => '1 año de suscripcion',
                'image' => '/store/1/default_images/badges/faithful_user.svg',
                'type' => 'register_date',
                'condition' => '{"from":"181","to":"365"}',
                'created_at' => 1625554495,
            ),
            3 =>
            array (
                'id' => 24,
                'title' => 'Vendedor Junior',
                'description' => 'Has 1 Class',
                'image' => '/store/1/default_images/badges/junior_vendor.svg',
                'type' => 'course_count',
                'condition' => '{"from":"1","to":"1"}',
                'created_at' => 1625554772,
            ),
            4 =>
            array (
                'id' => 25,
                'title' => 'Vendedor Senior',
                'description' => 'Tiene 2 cursos',
                'image' => '/store/1/default_images/badges/senior_vendor.svg',
                'type' => 'course_count',
                'condition' => '{"from":"2","to":"2"}',
                'created_at' => 1625554960,
            ),
            5 =>
            array (
                'id' => 26,
                'title' => 'Vendedor Experto',
                'description' => 'Tiene de 3 a 6 cursos',
                'image' => '/store/1/default_images/badges/expert_vendor.svg',
                'type' => 'course_count',
                'condition' => '{"from":"3","to":"6"}',
                'created_at' => 1625555421,
            ),
            6 =>
            array (
                'id' => 27,
                'title' => 'Bronze Classes',
                'description' => 'Classes Rating from 2 to 3',
                'image' => '/store/1/default_images/badges/bronze_classes.svg',
                'type' => 'course_rate',
                'condition' => '{"from":"2","to":"3"}',
                'created_at' => 1625556048,
            ),
            7 =>
            array (
                'id' => 28,
                'title' => 'Silver Classes',
                'description' => 'Classes Rating from 3 to 4',
                'image' => '/store/1/default_images/badges/silver_classes.svg',
                'type' => 'course_rate',
                'condition' => '{"from":"3","to":"4"}',
                'created_at' => 1625556159,
            ),
            8 =>
            array (
                'id' => 29,
                'title' => 'Golden Classes',
                'description' => 'Classes Rating from 4 to 5',
                'image' => '/store/1/default_images/badges/golden_classes.svg',
                'type' => 'course_rate',
                'condition' => '{"from":"4","to":"5"}',
                'created_at' => 1625556284,
            ),
            9 =>
            array (
                'id' => 30,
                'title' => 'Best Seller',
                'description' => 'Classes Sales from 1 to 2',
                'image' => '/store/1/default_images/badges/best_seller.svg',
                'type' => 'sale_count',
                'condition' => '{"from":"1","to":"2"}',
                'created_at' => 1625557021,
            ),
            10 =>
            array (
                'id' => 31,
                'title' => 'Top Seller',
                'description' => 'Classes Sales from 3 to 9',
                'image' => '/store/1/default_images/badges/top_seller.svg',
                'type' => 'sale_count',
                'condition' => '{"from":"3","to":"9"}',
                'created_at' => 1625557247,
            ),
            11 =>
            array (
                'id' => 32,
                'title' => 'King Seller',
                'description' => 'Classes Sales from 10 to 20',
                'image' => '/store/1/default_images/badges/king_seller.svg',
                'type' => 'sale_count',
                'condition' => '{"from":"10","to":"20"}',
                'created_at' => 1625558061,
            ),
            12 =>
            array (
                'id' => 33,
                'title' => 'Buen Soporte',
                'description' => 'Support Rating from 2 to 3',
                'image' => '/store/1/default_images/badges/good_support.svg',
                'type' => 'support_rate',
                'condition' => '{"from":"2","to":"3"}',
                'created_at' => 1625558473,
            ),
            13 =>
            array (
                'id' => 34,
                'title' => 'Amazing Support',
                'description' => 'Support Rating from 3 to 4',
                'image' => '/store/1/default_images/badges/amazing_support.svg',
                'type' => 'support_rate',
                'condition' => '{"from":"3","to":"4"}',
                'created_at' => 1625558682,
            ),
            14 =>
            array (
                'id' => 35,
                'title' => 'Fantastic Support',
                'description' => 'Support Rating from 4 to 5',
                'image' => '/store/1/default_images/badges/fantastic_support.svg',
                'type' => 'support_rate',
                'condition' => '{"from":"4","to":"5"}',
                'created_at' => 1625558892,
            ),
        ));


    }
}