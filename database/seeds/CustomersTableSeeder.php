<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('customers')->delete();

        \DB::table('customers')->insert(array(
            0 =>
            array(
                'username' => 'ldkhoi97',
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi100@gmail.com',
                'address' => '4/2 Đặng Văn Ngữ, Phú Hội, Huế',
                'postcode' => 123,
                'city' => '0',
                'country' => '0',
                'phone' => 793995407,
                'note' => '0',
                'active' => 0,
                'user_created' => NULL,
                'user_updated' => 'ldkhoi97',
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-07 11:43:06',
                'updated_at' => '2020-04-23 16:58:10',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'username' => 'ldkhoi99',
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldqhxh5@gmail.com',
                'address' => '4/2 Đặng Văn Ngữ, Phú Hội, Huế',
                'postcode' => 0,
                'city' => '0',
                'country' => '0',
                'phone' => 793995402,
                'note' => '0',
                'active' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-08 08:12:12',
                'updated_at' => '2020-04-08 17:15:50',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'username' => 'ldkhoi977',
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldqhxh4@gmail.com',
                'address' => '4/2 Đặng Văn Ngữ, Phú Hội, Huế',
                'postcode' => 0,
                'city' => '0',
                'country' => '0',
                'phone' => 793995405,
                'note' => '0',
                'active' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-23 10:24:16',
                'updated_at' => '2020-04-23 10:24:16',
                'deleted_at' => NULL,
            ),
        ));
    }
}