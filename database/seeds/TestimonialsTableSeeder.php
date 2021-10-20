<?php

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('testimonials')->delete();

        \DB::table('testimonials')->insert(array (
            0 =>
            array (
                'id' => 2,
                'user_name' => 'Mateo Lora',
            'user_avatar' => '/store/1/default_images/testimonials/profile_picture (28).jpg',
                'user_bio' => 'Panaderia',
                'rate' => '5',
                'comment' => '"Curso de panaderia rapida, Excelente, Kpacit excelente plataforma."',
                'status' => 'active',
                'created_at' => 1606841889,
            ),
            1 =>
            array (
                'id' => 3,
                'user_name' => 'Laura Vega',
            'user_avatar' => '/store/1/default_images/testimonials/profile_picture (50).jpg',
                'user_bio' => 'Marketing Digital',
                'rate' => '5',
                'comment' => '"Adpatable, Rapida, Simple - Ideal para aprender"',
                'status' => 'active',
                'created_at' => 1606841910,
            ),
            2 =>
            array (
                'id' => 4,
                'user_name' => 'Natasha Castro',
            'user_avatar' => '/store/1/default_images/testimonials/profile_picture (38).jpg',
                'user_bio' => 'Florista',
                'rate' => '4',
                'comment' => '"Cursos de acceso al trabajo, cortos, simples y con profesores calificados."',
                'status' => 'active',
                'created_at' => 1606841929,
            ),
            3 =>
            array (
                'id' => 5,
                'user_name' => 'Carlos Rojas',
            'user_avatar' => '/store/1/default_images/testimonials/profile_picture (20).jpg',
                'user_bio' => 'Diseñador',
                'rate' => '5',
                'comment' => '"El profesor atento, rapido, util y excelente nivel educativo, lo recomiendo."',
                'status' => 'active',
                'created_at' => 1606841946,
            ),
            4 =>
            array (
                'id' => 6,
                'user_name' => 'David Lopez',
            'user_avatar' => '/store/1/default_images/testimonials/profile_picture (52).jpg',
                'user_bio' => 'Pintor',
                'rate' => '5',
                'comment' => '"Cursos cortos y simples de entender para incluso los mas viejos"',
                'status' => 'active',
                'created_at' => 1606842000,
            ),
        ));


    }
}