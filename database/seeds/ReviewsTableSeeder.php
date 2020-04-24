<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reviews')->delete();
        
        \DB::table('reviews')->insert(array (
            0 => 
            array (
                'id' => 30,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'tuyệt vời lắmtuyệt vời lắmtuyệt vời lắmtuyệt vời lắmtuyệt vời lắmtuyệt vời lắmtuyệt vời lắm',
                'rating' => 4,
                'id_products' => 33,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-29 11:17:13',
                'updated_at' => '2020-03-29 11:17:13',
            ),
            1 => 
            array (
                'id' => 31,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'tuyeejt vowituyeejt vowituyeejt vowituyeejt vowituyeejt vowituyeejt vowituyeejt vowituyeejt vowi',
                'rating' => 5,
                'id_products' => 30,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-29 12:59:21',
                'updated_at' => '2020-03-29 12:59:21',
            ),
            2 => 
            array (
                'id' => 32,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi100@gmail.com',
                'comment' => '213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => NULL,
                'id_products' => 30,
                'user_created' => NULL,
                'created_at' => '2020-03-29 17:43:08',
                'updated_at' => '2020-03-29 17:43:08',
            ),
            3 => 
            array (
                'id' => 33,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi100@gmail.com',
                'comment' => '213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132',
                'rating' => NULL,
                'id_products' => 30,
                'user_created' => NULL,
                'created_at' => '2020-03-29 17:43:29',
                'updated_at' => '2020-03-29 17:43:29',
            ),
            4 => 
            array (
                'id' => 34,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'hay lắm bạn êiiiiiiiiiiiiiiiiihay lắm bạn êiiiiiiiiiiiiiiiiihay lắm bạn êiiiiiiiiiiiiiiiiihay lắm bạn êiiiiiiiiiiiiiiiii',
                'rating' => 5,
                'id_products' => 30,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-29 22:42:58',
                'updated_at' => '2020-03-29 22:42:58',
            ),
            5 => 
            array (
                'id' => 35,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'hay lắm bạn êiiiiiiiiiiiiiiiiihay lắm bạn êiiiiiiiiiiiiiiiiihay lắm bạn êiiiiiiiiiiiiiiiiihay lắm bạn êiiiiiiiiiiiiiiiii',
                'rating' => 2,
                'id_products' => 30,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-29 22:43:09',
                'updated_at' => '2020-03-29 22:43:09',
            ),
            6 => 
            array (
                'id' => 36,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi101@gmail.com',
                'comment' => 'dở ẹc quá bạn êi ,đề nghị dẹp tiệm đi bạn êi dở ẹc quá bạn êi ,đề nghị dẹp tiệm đi bạn êi',
                'rating' => 1,
                'id_products' => 30,
                'user_created' => 'ldkhoi100',
                'created_at' => '2020-03-30 18:39:39',
                'updated_at' => '2020-03-30 18:39:39',
            ),
            7 => 
            array (
                'id' => 37,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '13132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 4,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 14:47:39',
                'updated_at' => '2020-03-31 14:47:39',
            ),
            8 => 
            array (
                'id' => 38,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '13132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 4,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 14:47:40',
                'updated_at' => '2020-03-31 14:47:40',
            ),
            9 => 
            array (
                'id' => 39,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '13132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 5,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 14:49:32',
                'updated_at' => '2020-03-31 14:49:32',
            ),
            10 => 
            array (
                'id' => 40,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '1231233333333333333333333333333333',
                'rating' => 3,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 14:50:34',
                'updated_at' => '2020-03-31 14:50:34',
            ),
            11 => 
            array (
                'id' => 41,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '13132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 5,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 14:57:11',
                'updated_at' => '2020-03-31 14:57:11',
            ),
            12 => 
            array (
                'id' => 42,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '13132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 3,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 14:58:05',
                'updated_at' => '2020-03-31 14:58:05',
            ),
            13 => 
            array (
                'id' => 43,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '13132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 5,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 15:06:30',
                'updated_at' => '2020-03-31 15:06:30',
            ),
            14 => 
            array (
                'id' => 44,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '12132132231321312132132132321321132',
                'rating' => 2,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 15:06:51',
                'updated_at' => '2020-03-31 15:06:51',
            ),
            15 => 
            array (
                'id' => 45,
                'name' => 'Lê Đăng Khôi123',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => '132132312321323322222222222222222222',
                'rating' => 4,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-03-31 15:08:42',
                'updated_at' => '2020-03-31 15:08:42',
            ),
            16 => 
            array (
                'id' => 46,
                'name' => 'Lê Đăng Khôi321',
                'email' => 'ldkhoi207@gmail.com',
                'comment' => 'HayHayHayHayHayHayHayHayHayHayHayHayHayHayHayHayHayHayHayHay',
                'rating' => 4,
                'id_products' => 53,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-02 04:47:58',
                'updated_at' => '2020-04-02 04:47:58',
            ),
            17 => 
            array (
                'id' => 48,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => '123312212331221233122123312212331221233122123312212331221233122123312212331221233122123312212331221233122123312212331221233122123312212331221233122123312212331221233122123312212331221233122123312212331221233122',
                'rating' => NULL,
                'id_products' => 21,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-05 08:14:18',
                'updated_at' => '2020-04-05 08:14:18',
            ),
            18 => 
            array (
                'id' => 49,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => '213132132321213132132321213132132321213132132321213132132321213132132321213132132321213132132321',
                'rating' => 5,
                'id_products' => 30,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-06 10:05:54',
                'updated_at' => '2020-04-06 10:05:54',
            ),
            19 => 
            array (
                'id' => 67,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => 'hay quá bạn êi',
                'rating' => 5,
                'id_products' => 41,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-11 11:23:07',
                'updated_at' => '2020-04-11 11:23:07',
            ),
            20 => 
            array (
                'id' => 68,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => 'hay quá bạn êi',
                'rating' => 5,
                'id_products' => 41,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-11 11:43:46',
                'updated_at' => '2020-04-11 11:43:46',
            ),
            21 => 
            array (
                'id' => 69,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => 'Nice CLOTHINGS',
                'rating' => 5,
                'id_products' => 112,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-11 21:43:40',
                'updated_at' => '2020-04-11 21:43:40',
            ),
            22 => 
            array (
                'id' => 70,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => 'Nice CLOTHINGS',
                'rating' => 5,
                'id_products' => 112,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-11 21:44:04',
                'updated_at' => '2020-04-11 21:44:04',
            ),
            23 => 
            array (
                'id' => 71,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => 'best products',
                'rating' => 5,
                'id_products' => 48,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-12 09:06:35',
                'updated_at' => '2020-04-12 09:06:35',
            ),
            24 => 
            array (
                'id' => 72,
                'name' => 'Lê Đăng Khôi',
                'email' => 'ldkhoi109@gmail.com',
                'comment' => 'best productsbest products',
                'rating' => 5,
                'id_products' => 48,
                'user_created' => 'ldkhoi97',
                'created_at' => '2020-04-12 09:46:33',
                'updated_at' => '2020-04-12 09:46:33',
            ),
        ));
        
        
    }
}