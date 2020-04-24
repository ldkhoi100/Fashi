<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'id' => 6,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 10,
                'role_id' => 1,
                'user_id' => 2,
                'created_at' => '2020-04-24 09:18:47',
                'updated_at' => '2020-04-24 09:18:47',
            ),
        ));
        
        
    }
}