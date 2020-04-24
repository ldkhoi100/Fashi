<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Watches',
                'description' => '<p>Clothings for man</p>',
                'image' => 'BT4f1_123.jpg',
                'id_objects' => 2,
                'user_created' => NULL,
                'user_updated' => 'ldkhoi97',
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-22 08:40:41',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'HandBag',
                'description' => 'HandBag for man',
                'image' => NULL,
                'id_objects' => 2,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-06 11:26:56',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Shoes',
                'description' => 'Shoes for man',
                'image' => NULL,
                'id_objects' => 2,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 13:54:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Accessories',
                'description' => 'Accessories for man',
                'image' => NULL,
                'id_objects' => 2,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-03-21 21:47:36',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Clothings',
                'description' => 'Clothings for woman',
                'image' => NULL,
                'id_objects' => 3,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-16 11:13:37',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'HandBag',
                'description' => 'HandBag for woman',
                'image' => NULL,
                'id_objects' => 3,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-03-21 21:47:36',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Shoes',
                'description' => 'Shoes for woman',
                'image' => NULL,
                'id_objects' => 3,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 13:55:55',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Accessories',
                'description' => 'Accessories for woman',
                'image' => NULL,
                'id_objects' => 3,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-15 22:11:07',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Clothings',
                'description' => 'Clothings for kid',
                'image' => NULL,
                'id_objects' => 4,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 13:56:38',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'HandBag',
                'description' => 'HandBag for kid',
                'image' => NULL,
                'id_objects' => 4,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-06 10:47:25',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Shoes',
                'description' => '<p>Shoes for kid</p>

<p>&nbsp;</p>',
                'image' => NULL,
                'id_objects' => 4,
                'user_created' => NULL,
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 13:56:57',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Accessories',
                'description' => 'Accessories for kid',
                'image' => NULL,
                'id_objects' => 4,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 14:25:07',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Fashion',
                'description' => 'Fashion blog',
                'image' => NULL,
                'id_objects' => 5,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 10:07:54',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Travel',
                'description' => '<p>Travel blog</p>',
                'image' => NULL,
                'id_objects' => 5,
                'user_created' => NULL,
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-04-24 10:08:36',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Picnic',
                'description' => 'Picnic blog',
                'image' => NULL,
                'id_objects' => 5,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-03-30 17:07:23',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Model',
                'description' => 'Model blog',
                'image' => NULL,
                'id_objects' => 5,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:36',
                'updated_at' => '2020-03-30 17:08:29',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 27,
                'name' => 'Jeans & Trousers',
                'description' => '<p>Jeans &amp; Trousers for men</p>',
                'image' => 'oYLSW_20083717-1-brown.jfif',
                'id_objects' => 2,
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-23 17:02:30',
                'updated_at' => '2020-04-24 13:53:42',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 28,
                'name' => 'T-shirts',
                'description' => '<p>T-shirts for men</p>',
                'image' => '1Hftf_205794421_9612.jpg',
                'id_objects' => 2,
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-23 17:11:45',
                'updated_at' => '2020-04-24 15:01:13',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 29,
                'name' => 'Shirts',
                'description' => '<h1>SHIRTS FOR MEN</h1>',
                'image' => '8iOun_23.jpg',
                'id_objects' => 2,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 15:14:18',
                'updated_at' => '2020-04-24 14:23:55',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 30,
                'name' => 'Wallets',
                'description' => '<p>Wallets for men</p>',
                'image' => 'DgXVV_wallet.jpg',
                'id_objects' => 2,
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 20:02:50',
                'updated_at' => '2020-04-24 13:55:06',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 31,
                'name' => 'Western wear',
                'description' => '<h1>WESTERN WEAR Women</h1>',
                'image' => NULL,
                'id_objects' => 3,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-04-04 15:26:08',
                'updated_at' => '2020-04-24 14:35:21',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 32,
                'name' => 'Jeans & leggings',
                'description' => '<h1>JEANS &amp; LEGGINGS Women</h1>',
                'image' => NULL,
                'id_objects' => 3,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-04-04 15:47:26',
                'updated_at' => '2020-04-24 13:57:12',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}