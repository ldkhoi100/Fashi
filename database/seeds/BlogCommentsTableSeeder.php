<?php

use Illuminate\Database\Seeder;

class BlogCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_comments')->delete();
        
        \DB::table('blog_comments')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'hay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắm',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 20:20:12',
                'updated_at' => '2020-03-30 20:20:12',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'Hay cái đầu mày ấy, dở thấy ớn luôn á, đề nghị xóa web này đi',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 21:07:34',
                'updated_at' => '2020-03-30 21:07:34',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'Hay cái đầu mày ấy, dở thấy ớn luôn á, đề nghị xóa web này đi',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 21:07:38',
                'updated_at' => '2020-03-30 21:07:38',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'Hay cái đầu mày ấy, dở thấy ớn luôn á, đề nghị xóa web này đi',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 21:07:42',
                'updated_at' => '2020-03-30 21:07:42',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'Hay cái đầu mày ấy, dở thấy ớn luôn á, đề nghị xóa web này đi',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 21:07:46',
                'updated_at' => '2020-03-30 21:07:46',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'Hay cái đầu mày ấy, dở thấy ớn luôn á, đề nghị xóa web này đi',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 21:07:50',
                'updated_at' => '2020-03-30 21:07:50',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => 'hay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắmhay lắm',
                'id_blogs' => 4,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 06:10:12',
                'updated_at' => '2020-03-31 06:10:12',
            ),
        ));
        
        
    }
}