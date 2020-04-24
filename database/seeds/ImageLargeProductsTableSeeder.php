<?php

use Illuminate\Database\Seeder;

class ImageLargeProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('image_large_products')->delete();
        
        \DB::table('image_large_products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'link' => '/shop/women',
                'image' => '6mvxI_women-large.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 10:49:17',
                'updated_at' => '2020-04-02 22:04:52',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'link' => '/shop/men',
                'image' => 'aUy83_man-large.jpg',
                'user_created' => 'ldkhoi97',
                'user_updated' => 'ldkhoi97',
                'user_deleted' => NULL,
                'created_at' => '2020-03-24 10:49:33',
                'updated_at' => '2020-04-02 22:04:46',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}