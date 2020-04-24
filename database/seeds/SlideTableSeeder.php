<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('slide')->delete();
        
        \DB::table('slide')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Black friday',
                'id_categories' => 5,
                'id_objects' => 3,
                'description' => '<p>Black friday</p>',
                'link' => '/shop/women',
                'image' => 'AZQQW_hero-1.jpg',
                'discount' => 30,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 09:00:35',
                'updated_at' => '2020-04-06 08:46:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Black friday',
                'id_categories' => 9,
                'id_objects' => 4,
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>',
                'link' => '/shop/kid',
                'image' => 'E5vdH_hero-2.jpg',
                'discount' => 50,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 09:00:47',
                'updated_at' => '2020-04-06 08:47:02',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Khôi',
                'id_categories' => 2,
                'id_objects' => 2,
                'description' => '<p>hello</p>',
                'link' => '123123',
                'image' => 'Zz39Z_insta-5.jpg',
                'discount' => 0,
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-03-24 10:16:42',
                'updated_at' => '2020-03-24 10:32:47',
                'deleted_at' => '2020-03-24 10:32:47',
            ),
        ));
        
        
    }
}