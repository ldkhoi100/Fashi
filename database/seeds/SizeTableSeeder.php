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

        \DB::table('size')->insert(array(
            0 =>
            array(
                'name' => 'S',
            ),
            1 =>
            array(
                'name' => 'M',
            ),
            2 =>
            array(
                'name' => 'L',
            ),
            3 =>
            array(
                'name' => 'XL',
            ),
            4 =>
            array(
                'name' => '36',
            ),
            5 =>
            array(

                'name' => '37',
            ),
            6 =>
            array(

                'name' => '38',
            ),
            7 =>
            array(

                'name' => '39',
            ),
            8 =>
            array(
                'name' => '40',
            ),
            9 =>
            array(
                'name' => '41',
            ),
            10 =>
            array(

                'name' => '42',
            ),
            11 =>
            array(
                'name' => '43',
            ),
            12 =>
            array(
                'name' => 'No size',
            ),
        ));
    }
}