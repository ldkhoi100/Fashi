<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('coupons')->delete();

        \DB::table('coupons')->insert(array(
            0 =>
            array(
                'id_coupon' => 'FS7905278320',
                'discount' => 30,
                'used' => 0,
                'user_used' => NULL,
                'user_created' => 'ldkhoi97',
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-23 10:51:56',
                'updated_at' => '2020-04-23 10:51:56',
                'deleted_at' => NULL,
            ),
        ));
    }
}