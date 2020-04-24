<?php

use Illuminate\Database\Seeder;

class InstagramsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('instagrams')->delete();
        
        \DB::table('instagrams')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'scoutmodelagency',
                'link' => 'https://www.instagram.com/scoutmodelagency/',
                'image' => 'tNVRh_insta-1.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 13:44:27',
                'updated_at' => '2020-03-24 13:49:32',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'models',
                'link' => 'https://www.instagram.com/models/',
                'image' => 'JlrJ3_insta-2.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 13:45:09',
                'updated_at' => '2020-03-24 13:45:09',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'oneztuan',
                'link' => 'https://www.instagram.com/oneztuan/',
                'image' => 'XuCaD_insta-3.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 13:47:30',
                'updated_at' => '2020-03-24 13:47:30',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'cavoi.shop',
                'link' => 'https://www.instagram.com/cavoi.shop/',
                'image' => '2rbfb_insta-4.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 13:48:12',
                'updated_at' => '2020-03-24 13:48:12',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'shop_nuna',
                'link' => 'https://www.instagram.com/shop_nuna/',
                'image' => 'LlZgE_insta-5.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 13:48:42',
                'updated_at' => '2020-03-24 13:48:42',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'makecolor_shop',
                'link' => 'https://www.instagram.com/makecolor_shop/',
                'image' => 'D46RZ_insta-6.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 13:49:08',
                'updated_at' => '2020-03-24 13:49:08',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}