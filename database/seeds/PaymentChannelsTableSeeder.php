<?php

use Illuminate\Database\Seeder;

class PaymentChannelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('payment_channels')->delete();

        \DB::table('payment_channels')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Paypal',
                'class_name' => 'Paypal',
                'status' => 'inactive',
                'image' => '/store/1/default_images/gateways/paypal.png',
                'settings' => '',
                'created_at' => '1617345734',
            ),
            1 =>
            array (
                'id' => 4,
                'title' => 'Payu',
                'class_name' => 'Payu',
                'status' => 'active',
                'image' => '/store/1/default_images/gateways/payu.png',
                'settings' => '',
                'created_at' => '1617345734',
            ),
            2 =>
            array (
                'id' => 5,
                'title' => 'Razorpay',
                'class_name' => 'Razorpay',
                'status' => 'inactive',
                'image' => '/store/1/default_images/gateways/razorpay.png',
                'settings' => '',
                'created_at' => '1617345734',
            ),
            3 =>
            array (
                'id' => 7,
                'title' => 'Epayco',
                'class_name' => 'Stripe',
                'status' => 'active',
                'image' => '/store/1/3e181eb6-5180-4105-9895-40ee56c5304d.png',
                'settings' => '',
                'created_at' => '1617345734',
            ),
        ));


    }
}