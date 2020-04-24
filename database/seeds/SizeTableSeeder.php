<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('size')->delete();
        
        \DB::table('size')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => '36',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => '37',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => '38',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => '39',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => '40',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => '41',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => '42',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => '43',
            ),
            8 => 
            array (
                'id' => 3,
                'name' => 'L',
            ),
            9 => 
            array (
                'id' => 2,
                'name' => 'M',
            ),
            10 => 
            array (
                'id' => 1,
                'name' => 'S',
            ),
            11 => 
            array (
                'id' => 4,
                'name' => 'XL',
            ),
        ));
        
        
    }
}