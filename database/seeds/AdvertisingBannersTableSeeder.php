<?php

use Illuminate\Database\Seeder;

class AdvertisingBannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('advertising_banners')->delete();

        \DB::table('advertising_banners')->insert(array (
            0 =>
            array (
                'id' => 2,
                'title' => 'Home - Join as instructor',
                'position' => 'home1',
                'image' => '/store/1/default_images/banners/become_instructor_banner.png',
                'size' => 12,
                'link' => '/login',
                'published' => 1,
                'created_at' => 1607885353,
            ),
            1 =>
            array (
                'id' => 3,
                'title' => 'Certificate validation - Home',
                'position' => 'home2',
                'image' => '/store/1/default_images/banners/validate_certificates_banner.png',
                'size' => 6,
                'link' => '/certificate_validation',
                'published' => 1,
                'created_at' => 1607885656,
            ),
            2 =>
            array (
                'id' => 4,
                'title' => 'Empresa- Home',
                'position' => 'home2',
                'image' => '/store/1/empresa.png',
                'size' => 6,
                'link' => '/pages/empresa',
                'published' => 1,
                'created_at' => 1607885681,
            ),
            3 =>
            array (
                'id' => 6,
                'title' => 'Reserve a meeting - Course page',
                'position' => 'course_sidebar',
                'image' => '/store/1/default_images/banners/reserve_a_meeting.png',
                'size' => 12,
                'link' => '/instructors',
                'published' => 1,
                'created_at' => 1607886391,
            ),
            4 =>
            array (
                'id' => 7,
                'title' => 'Certificate validation - Course page',
                'position' => 'course_sidebar',
                'image' => '/store/1/default_images/banners/validate_certificates_banner.png',
                'size' => 12,
                'link' => '/certificate_validation',
                'published' => 1,
                'created_at' => 1607886440,
            ),
        ));


    }
}