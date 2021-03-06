<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('bills')->delete();

        \DB::table('bills')->insert(array(
            0 =>
            array(
                'id_customer' => 113,
                'date_order' => '2020-04-08 09:37:05',
                'total' => 64.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-08 09:37:05',
                'updated_at' => '2020-04-15 10:32:41',
                'deleted_at' => NULL,
            ),
            1 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-08 14:53:38',
                'total' => 60.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-08 14:53:38',
                'updated_at' => '2020-04-15 10:32:31',
                'deleted_at' => NULL,
            ),
            2 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-09 14:18:18',
                'total' => 50.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 14:18:18',
                'updated_at' => '2020-04-15 10:32:20',
                'deleted_at' => NULL,
            ),
            3 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-08 14:32:47',
                'total' => 50.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-08 14:32:47',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => '2020-04-10 09:57:53',
            ),
            4 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-09 14:42:29',
                'total' => 69.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 14:42:29',
                'updated_at' => '2020-04-15 10:32:05',
                'deleted_at' => NULL,
            ),
            5 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-09 14:42:39',
                'total' => 89.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 14:42:39',
                'updated_at' => '2020-04-15 10:31:56',
                'deleted_at' => NULL,
            ),
            6 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-09 14:42:59',
                'total' => 89.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 14:42:59',
                'updated_at' => '2020-04-15 10:31:43',
                'deleted_at' => NULL,
            ),
            7 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-09 14:43:19',
                'total' => 138.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 14:43:19',
                'updated_at' => '2020-04-15 10:31:36',
                'deleted_at' => NULL,
            ),
            8 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-03-08 14:43:31',
                'total' => 89.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-03-09 14:43:31',
                'updated_at' => '2020-04-24 11:44:04',
                'deleted_at' => '2020-04-23 10:27:26',
            ),
            9 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-09 15:31:22',
                'total' => 890.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-09 15:31:22',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => '2020-04-10 09:57:49',
            ),
            10 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-10 09:57:07',
                'total' => 158.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-10 09:57:07',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => '2020-04-10 09:57:47',
            ),
            11 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-11 15:23:47',
                'total' => 149.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 15:23:47',
                'updated_at' => '2020-04-15 10:31:29',
                'deleted_at' => NULL,
            ),
            12 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-11 15:24:23',
                'total' => 55.2,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-11 15:24:23',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => '2020-04-12 08:33:11',
            ),
            13 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-11 16:43:39',
                'total' => 219.6,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-11 16:43:39',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => '2020-04-12 08:33:13',
            ),
            14 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-11 20:43:58',
                'total' => 69.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 20:43:58',
                'updated_at' => '2020-04-15 10:31:16',
                'deleted_at' => NULL,
            ),
            15 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-11 21:38:00',
                'total' => 69.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 21:38:00',
                'updated_at' => '2020-04-15 10:31:01',
                'deleted_at' => NULL,
            ),
            16 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-12 08:35:42',
                'total' => 79.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-12 08:35:42',
                'updated_at' => '2020-04-15 10:30:50',
                'deleted_at' => NULL,
            ),
            17 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-13 22:17:06',
                'total' => 213.0,
                'payment' => 'Pay by credit card',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-13 22:17:06',
                'updated_at' => '2020-04-15 10:39:18',
                'deleted_at' => NULL,
            ),
            18 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-15 22:11:07',
                'total' => 149.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-15 22:11:07',
                'updated_at' => '2020-04-15 22:11:07',
                'deleted_at' => NULL,
            ),
            19 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-16 08:20:45',
                'total' => 234.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-16 08:20:45',
                'updated_at' => '2020-04-22 11:08:27',
                'deleted_at' => '2020-04-18 13:17:07',
            ),
            20 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-16 08:46:48',
                'total' => 310.5,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-16 08:46:48',
                'updated_at' => '2020-04-22 11:24:32',
                'deleted_at' => NULL,
            ),
            21 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-16 11:13:37',
                'total' => 346.5,
                'payment' => 'Payment on delivery',
                'pay_money' => 1,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-16 11:13:37',
                'updated_at' => '2020-04-22 14:54:33',
                'deleted_at' => '2020-04-22 14:54:33',
            ),
            22 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-19 10:33:14',
                'total' => 25.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 1,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-19 10:33:14',
                'updated_at' => '2020-04-22 11:09:23',
                'deleted_at' => '2020-04-19 15:17:21',
            ),
            23 =>
            array(

                'id_customer' => 113,
                'date_order' => '2020-04-23 16:58:10',
                'total' => 70.0,
                'payment' => 'Payment on delivery',
                'pay_money' => 0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-23 16:58:10',
                'updated_at' => '2020-04-23 16:58:10',
                'deleted_at' => NULL,
            ),
        ));
    }
}