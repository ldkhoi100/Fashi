<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact')->delete();
        
        \DB::table('contact')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'abcabc',
                'email' => 'abcabc@gmail.com',
                'message' => 'abcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabc',
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-11 14:00:23',
                'updated_at' => '2020-04-21 13:56:58',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi100@gmail.com',
                'message' => 'Lê Đăng KhôiLê ĐănLê Đăng Khôig Khôi',
                'user_deleted' => NULL,
                'created_at' => '2020-04-13 15:11:49',
                'updated_at' => '2020-04-13 15:11:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}