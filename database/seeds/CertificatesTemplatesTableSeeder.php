<?php

use Illuminate\Database\Seeder;

class CertificatesTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('certificates_templates')->delete();

        \DB::table('certificates_templates')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Certificado Kpacit',
                'body' => 'Certifica que: [student]
Supero el  [course] con
un [grade]%, exitosamente
ID Kpacit : [certificate_id]',
                'image' => '/store/1/default_images/certificate.jpg',
                'position_x' => '320',
                'position_y' => '400',
                'font_size' => '32',
                'text_color' => '#314963',
                'status' => 'publish',
                'created_at' => 1608663541,
                'updated_at' => 1629652269,
            ),
        ));


    }
}