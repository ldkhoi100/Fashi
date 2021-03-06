<?php

use Illuminate\Database\Seeder;

class BillDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('bill_detail')->delete();

        \DB::table('bill_detail')->insert(array(
            0 =>
            array(

                'id_bill' => 121,
                'id_product' => 87,
                'name_products' => 'Womens 5 Pocket Mild Wash Jeans',
                'size' => 'L',
                'quantity' => 1,
                'unit_price' => 80.0,
                'discount' => 20,
                'total_price' => 64.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-08 09:37:05',
                'updated_at' => '2020-04-15 10:32:41',
                'deleted_at' => NULL,
            ),
            1 =>
            array(

                'id_bill' => 124,
                'id_product' => 41,
                'name_products' => 'Mens Leather Slipon Loafers',
                'size' => 'S',
                'quantity' => 1,
                'unit_price' => 60.0,
                'discount' => 0,
                'total_price' => 60.0,
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

                'id_bill' => 125,
                'id_product' => 113,
                'name_products' => 'Womens Mandarin Collar Checked Top',
                'size' => 'XL',
                'quantity' => 1,
                'unit_price' => 50.0,
                'discount' => 0,
                'total_price' => 50.0,
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

                'id_bill' => 126,
                'id_product' => 113,
                'name_products' => 'Womens Mandarin Collar Checked Top',
                'size' => 'L',
                'quantity' => 1,
                'unit_price' => 50.0,
                'discount' => 0,
                'total_price' => 50.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 14:32:47',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => NULL,
            ),
            4 =>
            array(

                'id_bill' => 127,
                'id_product' => 112,
                'name_products' => 'Womens Round Neck Slub Top',
                'size' => 'S',
                'quantity' => 1,
                'unit_price' => 69.0,
                'discount' => 0,
                'total_price' => 69.0,
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

                'id_bill' => 128,
                'id_product' => 78,
                'name_products' => 'Womens Washed Casual Shirt Dress',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 89.0,
                'discount' => 0,
                'total_price' => 89.0,
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

                'id_bill' => 129,
                'id_product' => 78,
                'name_products' => 'Womens Washed Casual Shirt Dress',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 89.0,
                'discount' => 0,
                'total_price' => 89.0,
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

                'id_bill' => 130,
                'id_product' => 112,
                'name_products' => 'Womens Round Neck Slub Top',
                'size' => 'M',
                'quantity' => 2,
                'unit_price' => 69.0,
                'discount' => 0,
                'total_price' => 138.0,
                'status' => 1,
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

                'id_bill' => 131,
                'id_product' => 78,
                'name_products' => 'Womens Washed Casual Shirt Dress',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 89.0,
                'discount' => 0,
                'total_price' => 89.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-09 14:43:31',
                'updated_at' => '2020-04-24 11:44:04',
                'deleted_at' => '2020-04-24 11:44:04',
            ),
            9 =>
            array(

                'id_bill' => 132,
                'id_product' => 78,
                'name_products' => 'Womens Washed Casual Shirt Dress',
                'size' => 'M',
                'quantity' => 10,
                'unit_price' => 89.0,
                'discount' => 0,
                'total_price' => 890.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-09 15:31:22',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => NULL,
            ),
            10 =>
            array(

                'id_bill' => 133,
                'id_product' => 109,
                'name_products' => 'Womens Mandarin Collar Floral Print Kurti',
                'size' => 'L',
                'quantity' => 2,
                'unit_price' => 79.0,
                'discount' => 0,
                'total_price' => 158.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-10 09:57:08',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => NULL,
            ),
            11 =>
            array(

                'id_bill' => 134,
                'id_product' => 94,
                'name_products' => 'Womens Zip Closure Satchel Handbag',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 149.0,
                'discount' => 0,
                'total_price' => 149.0,
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

                'id_bill' => 135,
                'id_product' => 112,
                'name_products' => 'Womens Round Neck Slub Top',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 69.0,
                'discount' => 20,
                'total_price' => 55.2,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 15:24:23',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => NULL,
            ),
            13 =>
            array(

                'id_bill' => 136,
                'id_product' => 91,
                'name_products' => 'Womens 5 Pocket Distressed Jeans',
                'size' => '39',
                'quantity' => 2,
                'unit_price' => 100.0,
                'discount' => 10,
                'total_price' => 180.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 16:43:39',
                'updated_at' => '2020-04-23 11:43:23',
                'deleted_at' => NULL,
            ),
            14 =>
            array(

                'id_bill' => 136,
                'id_product' => 137,
                'name_products' => 'Boys Digital Nylon Watch',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 32.0,
                'discount' => 10,
                'total_price' => 28.8,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 16:43:39',
                'updated_at' => '2020-04-15 10:34:13',
                'deleted_at' => '2020-04-12 08:33:13',
            ),
            15 =>
            array(

                'id_bill' => 136,
                'id_product' => 131,
                'name_products' => 'Kids Printed and Solid Socks - Pack of 3',
                'size' => 'L',
                'quantity' => 1,
                'unit_price' => 12.0,
                'discount' => 10,
                'total_price' => 10.8,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 16:43:39',
                'updated_at' => '2020-04-15 10:34:18',
                'deleted_at' => '2020-04-12 08:33:13',
            ),
            16 =>
            array(

                'id_bill' => 137,
                'id_product' => 112,
                'name_products' => 'Womens Round Neck Slub Top',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 69.0,
                'discount' => 0,
                'total_price' => 69.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 20:43:58',
                'updated_at' => '2020-04-15 10:31:16',
                'deleted_at' => NULL,
            ),
            17 =>
            array(

                'id_bill' => 138,
                'id_product' => 103,
                'name_products' => 'Womens Casual Wear Slipon Ballerinas',
                'size' => 'L',
                'quantity' => 1,
                'unit_price' => 69.0,
                'discount' => 0,
                'total_price' => 69.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-11 21:38:00',
                'updated_at' => '2020-04-15 10:31:01',
                'deleted_at' => NULL,
            ),
            18 =>
            array(

                'id_bill' => 139,
                'id_product' => 76,
                'name_products' => 'Womens V Neck Printed A-Line Dress',
                'size' => 'XL',
                'quantity' => 1,
                'unit_price' => 79.0,
                'discount' => 0,
                'total_price' => 79.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-12 08:35:42',
                'updated_at' => '2020-04-15 10:30:50',
                'deleted_at' => NULL,
            ),
            19 =>
            array(

                'id_bill' => 140,
                'id_product' => 86,
                'name_products' => 'Womens 5 Pocket Rinse Wash Jeans',
                'size' => 'L',
                'quantity' => 2,
                'unit_price' => 89.0,
                'discount' => 0,
                'total_price' => 178.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-13 22:17:06',
                'updated_at' => '2020-04-15 10:39:18',
                'deleted_at' => NULL,
            ),
            20 =>
            array(

                'id_bill' => 140,
                'id_product' => 17,
                'name_products' => 'Mens Round Neck Stripe T-Shirt',
                'size' => 'S',
                'quantity' => 1,
                'unit_price' => 35.0,
                'discount' => 0,
                'total_price' => 35.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-13 22:17:06',
                'updated_at' => '2020-04-15 10:30:39',
                'deleted_at' => NULL,
            ),
            21 =>
            array(

                'id_bill' => 141,
                'id_product' => 94,
                'name_products' => 'Womens Zip Closure Satchel Handbag',
                'size' => 'M',
                'quantity' => 1,
                'unit_price' => 149.0,
                'discount' => 0,
                'total_price' => 149.0,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-15 22:11:07',
                'updated_at' => '2020-04-15 22:11:07',
                'deleted_at' => NULL,
            ),
            22 =>
            array(

                'id_bill' => 142,
                'id_product' => 91,
                'name_products' => 'Womens 5 Pocket Distressed Jeans',
                'size' => '39',
                'quantity' => 2,
                'unit_price' => 100.0,
                'discount' => 10,
                'total_price' => 180.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-16 08:20:45',
                'updated_at' => '2020-04-22 11:08:25',
                'deleted_at' => NULL,
            ),
            23 =>
            array(

                'id_bill' => 142,
                'id_product' => 41,
                'name_products' => 'Mens Leather Slipon Loafers',
                'size' => '38',
                'quantity' => 1,
                'unit_price' => 60.0,
                'discount' => 10,
                'total_price' => 54.0,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-16 08:20:45',
                'updated_at' => '2020-04-22 11:08:27',
                'deleted_at' => NULL,
            ),
            24 =>
            array(

                'id_bill' => 143,
                'id_product' => 108,
                'name_products' => 'Womens Surplice Neck Striped Top',
                'size' => 'L',
                'quantity' => 5,
                'unit_price' => 69.0,
                'discount' => 10,
                'total_price' => 310.5,
                'status' => 0,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-16 08:46:48',
                'updated_at' => '2020-04-22 11:24:32',
                'deleted_at' => NULL,
            ),
            25 =>
            array(

                'id_bill' => 144,
                'id_product' => 78,
                'name_products' => 'Womens Washed Casual Shirt Dress',
                'size' => 'M',
                'quantity' => 2,
                'unit_price' => 89.0,
                'discount' => 10,
                'total_price' => 160.2,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-16 11:13:37',
                'updated_at' => '2020-04-22 14:54:33',
                'deleted_at' => '2020-04-22 14:54:33',
            ),
            26 =>
            array(

                'id_bill' => 144,
                'id_product' => 112,
                'name_products' => 'Womens Round Neck Slub Top',
                'size' => 'M',
                'quantity' => 3,
                'unit_price' => 69.0,
                'discount' => 10,
                'total_price' => 186.3,
                'status' => 1,
                'cancle' => 0,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => NULL,
                'created_at' => '2020-04-16 11:13:37',
                'updated_at' => '2020-04-22 14:54:33',
                'deleted_at' => '2020-04-22 14:54:33',
            ),
            27 =>
            array(

                'id_bill' => 148,
                'id_product' => 14,
                'name_products' => 'Mens Round Neck Printed T-Shirt',
                'size' => 'L',
                'quantity' => 1,
                'unit_price' => 25.0,
                'discount' => NULL,
                'total_price' => 25.0,
                'status' => 0,
                'cancle' => 1,
                'user_created' => NULL,
                'user_updated' => NULL,
                'user_deleted' => 'ldkhoi97',
                'created_at' => '2020-04-19 10:33:14',
                'updated_at' => '2020-04-22 11:08:42',
                'deleted_at' => '2020-04-22 11:08:42',
            ),
            28 =>
            array(

                'id_bill' => 161,
                'id_product' => 77,
                'name_products' => 'Womens Surplice Neck Solid A-Line Dress',
                'size' => 'L',
                'quantity' => 1,
                'unit_price' => 70.0,
                'discount' => NULL,
                'total_price' => 70.0,
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