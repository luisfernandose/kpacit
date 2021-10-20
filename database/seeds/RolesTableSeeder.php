<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'user',
                'caption' => 'User role',
                'users_count' => 0,
                'is_admin' => 0,
                'created_at' => 1604418504,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'admin',
                'caption' => 'Admin role',
                'users_count' => 0,
                'is_admin' => 1,
                'created_at' => 1604418504,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'organization',
                'caption' => 'Organization role',
                'users_count' => 0,
                'is_admin' => 0,
                'created_at' => 1604418504,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'teacher',
                'caption' => 'Teacher role',
                'users_count' => 0,
                'is_admin' => 0,
                'created_at' => 1604418504,
            ),
            4 =>
            array (
                'id' => 6,
                'name' => 'education',
                'caption' => 'Staff role',
                'users_count' => 0,
                'is_admin' => 1,
                'created_at' => 1613370817,
            ),
            5 =>
            array (
                'id' => 9,
                'name' => 'Author Role',
                'caption' => 'Author',
                'users_count' => 0,
                'is_admin' => 1,
                'created_at' => 1625093577,
            ),
        ));


    }
}