<?php

use Illuminate\Database\Seeder;

class SubscribeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subscribe')->delete();
        
        \DB::table('subscribe')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'ldkhoi100@gmail.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'ldkhoi101@gmail.com',
                'created_at' => '2020-04-11 10:54:59',
                'updated_at' => '2020-04-11 10:54:59',
            ),
        ));
        
        
    }
}