<?php

use Illuminate\Database\Seeder;

class ObjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('objects')->delete();
        
        \DB::table('objects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'None',
                'link_objects' => NULL,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:33',
                'updated_at' => '2020-03-23 14:23:54',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Men\'s',
                'link_objects' => 'men',
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:33',
                'updated_at' => '2020-04-24 15:01:13',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Women\'s',
                'link_objects' => 'women',
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:33',
                'updated_at' => '2020-04-24 14:35:21',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Kid\'s',
                'link_objects' => 'kid',
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:33',
                'updated_at' => '2020-04-24 14:25:07',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Blog',
                'link_objects' => NULL,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-03-21 21:47:33',
                'updated_at' => '2020-04-24 10:08:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}