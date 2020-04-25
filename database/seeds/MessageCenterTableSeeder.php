<?php

use Illuminate\Database\Seeder;

class MessageCenterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('message_center')->delete();

        \DB::table('message_center')->insert(array(
            0 =>
            array(
                'id_bill' => 138,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-11 21:38:00',
                'updated_at' => '2020-04-12 21:37:25',
            ),
            1 =>
            array(
                'id_bill' => NULL,
                'id_review' => 70,
                'reader' => 1,
                'created_at' => '2020-04-11 21:44:04',
                'updated_at' => '2020-04-12 10:59:49',
            ),
            2 =>
            array(
                'id_bill' => 139,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-12 08:35:42',
                'updated_at' => '2020-04-12 13:40:56',
            ),
            3 =>
            array(
                'id_bill' => NULL,
                'id_review' => 71,
                'reader' => 1,
                'created_at' => '2020-04-12 09:06:35',
                'updated_at' => '2020-04-12 15:27:00',
            ),
            4 =>
            array(
                'id_bill' => NULL,
                'id_review' => 72,
                'reader' => 1,
                'created_at' => '2020-04-12 09:46:33',
                'updated_at' => '2020-04-12 15:26:56',
            ),
            5 =>
            array(
                'id_bill' => 140,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-13 22:17:06',
                'updated_at' => '2020-04-15 15:55:17',
            ),
            6 =>
            array(
                'id_bill' => 141,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-15 22:11:07',
                'updated_at' => '2020-04-16 08:54:05',
            ),
            7 =>
            array(
                'id_bill' => 142,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-16 08:20:45',
                'updated_at' => '2020-04-16 08:54:05',
            ),
            8 =>
            array(
                'id_bill' => 143,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-16 08:46:48',
                'updated_at' => '2020-04-16 08:54:05',
            ),
            9 =>
            array(
                'id_bill' => 144,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-16 11:13:37',
                'updated_at' => '2020-04-18 21:40:19',
            ),
            10 =>
            array(
                'id_bill' => 148,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-19 10:33:14',
                'updated_at' => '2020-04-19 17:46:46',
            ),
            11 =>
            array(
                'id_bill' => 161,
                'id_review' => NULL,
                'reader' => 1,
                'created_at' => '2020-04-23 16:58:10',
                'updated_at' => '2020-04-24 08:38:08',
            ),
        ));
    }
}