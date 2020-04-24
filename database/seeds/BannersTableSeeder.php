<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 2,
                'id_objects' => 2,
                'link' => '/shop/men',
                'image' => 'wTgXi_banner-1.jpg',
                'position' => 1,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 10:59:16',
                'updated_at' => '2020-04-02 21:55:30',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'id_objects' => 3,
                'link' => '/shop/women',
                'image' => 'PizDj_banner-2.jpg',
                'position' => 2,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 10:59:25',
                'updated_at' => '2020-04-02 21:55:36',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'id_objects' => 4,
                'link' => '/shop/kid',
                'image' => 'r4aKE_banner-3.jpg',
                'position' => 3,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 10:59:31',
                'updated_at' => '2020-04-02 21:55:41',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'id_objects' => 5,
                'link' => 'Lê Đăng Khôi',
                'image' => 'r8IsB_insta-2.jpg',
                'position' => 0,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 11:39:40',
                'updated_at' => '2020-03-28 20:02:33',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}