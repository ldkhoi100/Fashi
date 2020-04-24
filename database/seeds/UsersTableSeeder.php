<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'username' => 'ldkhoi97',
                'phone' => 793995407,
                'address' => '4/2 Đặng Văn Ngữ, Phú Hội, Huế',
                'image' => 'XUpix_1.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$kXpLqTnyDrfhYcyx8CFBHONGiduUwWXTpcT9xAV99tQ1scnVwVHBa',
                'block' => 0,
                'remember_token' => 'HwFjDvmqXFJC523xfxCjODwgRTjzdrFNFYA8rncUqeozTXPzeKXbwP21LEqs',
                'provider' => NULL,
                'provider_id' => NULL,
                'created_at' => '2020-03-22 14:43:51',
                'updated_at' => '2020-04-23 21:17:06',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'username' => 'ldkhoi98',
                'phone' => 793995401,
                'address' => 'Hueessssss',
                'image' => 'PH6vC_3.jpg',
                'email_verified_at' => '2020-04-24 08:11:10',
                'password' => '$2y$10$kUZ7EXLlc6uEyKLGvgEFuOEfU2xzfRYpgvV0L/OUbnuI3CfbPREqW',
                'block' => 0,
                'remember_token' => '30V4RvXixn5GXwRbzjyXwHPAEXoanlSCAEC6kD4f7PZAPjfOu2zuAPoE5A9A',
                'provider' => NULL,
                'provider_id' => NULL,
                'created_at' => '2020-03-25 15:43:44',
                'updated_at' => '2020-04-24 09:25:38',
            ),
        ));
    }
}