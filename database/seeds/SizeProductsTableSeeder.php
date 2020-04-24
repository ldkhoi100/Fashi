<?php

use Illuminate\Database\Seeder;

class SizeProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('size_products')->delete();
        
        \DB::table('size_products')->insert(array (
            0 => 
            array (
                'id' => 8,
                'id_products' => 14,
                'id_size' => 3,
                'quantity' => 0,
                'created_at' => NULL,
                'updated_at' => '2020-04-22 13:39:28',
            ),
            1 => 
            array (
                'id' => 9,
                'id_products' => 14,
                'id_size' => 2,
                'quantity' => 0,
                'created_at' => NULL,
                'updated_at' => '2020-04-18 20:18:30',
            ),
            2 => 
            array (
                'id' => 10,
                'id_products' => 14,
                'id_size' => 1,
                'quantity' => 0,
                'created_at' => NULL,
                'updated_at' => '2020-04-18 20:18:30',
            ),
            3 => 
            array (
                'id' => 11,
                'id_products' => 14,
                'id_size' => 4,
                'quantity' => 0,
                'created_at' => NULL,
                'updated_at' => '2020-04-18 20:18:30',
            ),
            4 => 
            array (
                'id' => 12,
                'id_products' => 15,
                'id_size' => 3,
                'quantity' => 5,
                'created_at' => NULL,
                'updated_at' => '2020-04-22 20:31:01',
            ),
            5 => 
            array (
                'id' => 13,
                'id_products' => 15,
                'id_size' => 2,
                'quantity' => 10,
                'created_at' => NULL,
                'updated_at' => '2020-04-22 20:31:01',
            ),
            6 => 
            array (
                'id' => 14,
                'id_products' => 15,
                'id_size' => 1,
                'quantity' => 15,
                'created_at' => NULL,
                'updated_at' => '2020-04-22 20:31:01',
            ),
            7 => 
            array (
                'id' => 15,
                'id_products' => 15,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => '2020-04-18 13:53:11',
            ),
            8 => 
            array (
                'id' => 16,
                'id_products' => 16,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => '2020-04-17 10:44:58',
            ),
            9 => 
            array (
                'id' => 17,
                'id_products' => 16,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => '2020-04-17 10:44:58',
            ),
            10 => 
            array (
                'id' => 18,
                'id_products' => 16,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => '2020-04-17 10:44:58',
            ),
            11 => 
            array (
                'id' => 19,
                'id_products' => 16,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => '2020-04-17 10:44:58',
            ),
            12 => 
            array (
                'id' => 20,
                'id_products' => 17,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 21,
                'id_products' => 17,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 22,
                'id_products' => 17,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 23,
                'id_products' => 17,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 24,
                'id_products' => 18,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 25,
                'id_products' => 18,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 26,
                'id_products' => 18,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 27,
                'id_products' => 18,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 28,
                'id_products' => 19,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 29,
                'id_products' => 19,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 30,
                'id_products' => 19,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 31,
                'id_products' => 19,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 32,
                'id_products' => 20,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 33,
                'id_products' => 20,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 34,
                'id_products' => 20,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 35,
                'id_products' => 20,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 36,
                'id_products' => 21,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 37,
                'id_products' => 21,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 38,
                'id_products' => 21,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 39,
                'id_products' => 21,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 40,
                'id_products' => 22,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 41,
                'id_products' => 22,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 42,
                'id_products' => 22,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 43,
                'id_products' => 22,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 44,
                'id_products' => 23,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 45,
                'id_products' => 23,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 46,
                'id_products' => 23,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 47,
                'id_products' => 23,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 48,
                'id_products' => 24,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 49,
                'id_products' => 24,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 50,
                'id_products' => 24,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 51,
                'id_products' => 24,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 52,
                'id_products' => 25,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 53,
                'id_products' => 25,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 54,
                'id_products' => 25,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 55,
                'id_products' => 26,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 56,
                'id_products' => 26,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 57,
                'id_products' => 26,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 58,
                'id_products' => 26,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 59,
                'id_products' => 27,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 60,
                'id_products' => 27,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 61,
                'id_products' => 27,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 62,
                'id_products' => 27,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 63,
                'id_products' => 28,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 64,
                'id_products' => 28,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 65,
                'id_products' => 28,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 66,
                'id_products' => 28,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 67,
                'id_products' => 29,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 68,
                'id_products' => 29,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 69,
                'id_products' => 29,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 70,
                'id_products' => 29,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 71,
                'id_products' => 30,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 72,
                'id_products' => 30,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 73,
                'id_products' => 30,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 74,
                'id_products' => 30,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 75,
                'id_products' => 31,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 76,
                'id_products' => 31,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 77,
                'id_products' => 32,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 78,
                'id_products' => 32,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 79,
                'id_products' => 32,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 80,
                'id_products' => 33,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 81,
                'id_products' => 33,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 82,
                'id_products' => 33,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 113,
                'id_products' => 44,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 114,
                'id_products' => 44,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 115,
                'id_products' => 44,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 116,
                'id_products' => 45,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 117,
                'id_products' => 45,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 118,
                'id_products' => 45,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 119,
                'id_products' => 46,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 120,
                'id_products' => 46,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 121,
                'id_products' => 46,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 122,
                'id_products' => 47,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 123,
                'id_products' => 47,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 124,
                'id_products' => 47,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 125,
                'id_products' => 48,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 126,
                'id_products' => 48,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 127,
                'id_products' => 74,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 128,
                'id_products' => 74,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 129,
                'id_products' => 75,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 130,
                'id_products' => 75,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 131,
                'id_products' => 76,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 132,
                'id_products' => 76,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 133,
                'id_products' => 77,
                'id_size' => 3,
                'quantity' => 19,
                'created_at' => NULL,
                'updated_at' => '2020-04-23 16:58:10',
            ),
            96 => 
            array (
                'id' => 134,
                'id_products' => 77,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 135,
                'id_products' => 77,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 136,
                'id_products' => 77,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 137,
                'id_products' => 78,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 138,
                'id_products' => 78,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 139,
                'id_products' => 78,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 140,
                'id_products' => 79,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 141,
                'id_products' => 79,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 142,
                'id_products' => 79,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 143,
                'id_products' => 80,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 144,
                'id_products' => 80,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 145,
                'id_products' => 80,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 146,
                'id_products' => 81,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 147,
                'id_products' => 81,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 148,
                'id_products' => 81,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 149,
                'id_products' => 82,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 150,
                'id_products' => 82,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 151,
                'id_products' => 82,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 152,
                'id_products' => 82,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 153,
                'id_products' => 83,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 154,
                'id_products' => 83,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 155,
                'id_products' => 83,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 156,
                'id_products' => 83,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 192,
                'id_products' => 94,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 193,
                'id_products' => 94,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 194,
                'id_products' => 94,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 195,
                'id_products' => 95,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 196,
                'id_products' => 95,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 197,
                'id_products' => 95,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 198,
                'id_products' => 95,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 199,
                'id_products' => 96,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 200,
                'id_products' => 96,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 201,
                'id_products' => 97,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 202,
                'id_products' => 97,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 203,
                'id_products' => 97,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 204,
                'id_products' => 97,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 205,
                'id_products' => 98,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 206,
                'id_products' => 98,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 207,
                'id_products' => 98,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 208,
                'id_products' => 98,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 209,
                'id_products' => 99,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 210,
                'id_products' => 99,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 211,
                'id_products' => 99,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 212,
                'id_products' => 99,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 239,
                'id_products' => 107,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 240,
                'id_products' => 107,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 241,
                'id_products' => 107,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 242,
                'id_products' => 107,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 243,
                'id_products' => 108,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 244,
                'id_products' => 108,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 245,
                'id_products' => 108,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 246,
                'id_products' => 108,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 247,
                'id_products' => 109,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 248,
                'id_products' => 109,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 249,
                'id_products' => 109,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 250,
                'id_products' => 109,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 251,
                'id_products' => 110,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 252,
                'id_products' => 110,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 253,
                'id_products' => 110,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 254,
                'id_products' => 110,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 255,
                'id_products' => 111,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 256,
                'id_products' => 111,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 257,
                'id_products' => 111,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 258,
                'id_products' => 112,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 259,
                'id_products' => 112,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 260,
                'id_products' => 112,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 261,
                'id_products' => 113,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 262,
                'id_products' => 113,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 263,
                'id_products' => 113,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 264,
                'id_products' => 113,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 265,
                'id_products' => 114,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 266,
                'id_products' => 114,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 268,
                'id_products' => 114,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 269,
                'id_products' => 115,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 270,
                'id_products' => 115,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 271,
                'id_products' => 115,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 272,
                'id_products' => 115,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 273,
                'id_products' => 116,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 274,
                'id_products' => 116,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 275,
                'id_products' => 116,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 276,
                'id_products' => 116,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 277,
                'id_products' => 117,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 278,
                'id_products' => 117,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 279,
                'id_products' => 117,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 280,
                'id_products' => 118,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 281,
                'id_products' => 118,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 282,
                'id_products' => 118,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 283,
                'id_products' => 118,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 284,
                'id_products' => 119,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 285,
                'id_products' => 119,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 286,
                'id_products' => 119,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 287,
                'id_products' => 120,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 288,
                'id_products' => 120,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 289,
                'id_products' => 120,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 290,
                'id_products' => 121,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 291,
                'id_products' => 121,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 292,
                'id_products' => 121,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 293,
                'id_products' => 121,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 294,
                'id_products' => 122,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 295,
                'id_products' => 122,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 296,
                'id_products' => 122,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 297,
                'id_products' => 122,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 298,
                'id_products' => 123,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 299,
                'id_products' => 123,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 300,
                'id_products' => 123,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 301,
                'id_products' => 123,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 326,
                'id_products' => 130,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 327,
                'id_products' => 130,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 328,
                'id_products' => 130,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 329,
                'id_products' => 130,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 330,
                'id_products' => 131,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 331,
                'id_products' => 131,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 332,
                'id_products' => 131,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 333,
                'id_products' => 132,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 334,
                'id_products' => 132,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 335,
                'id_products' => 132,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 336,
                'id_products' => 133,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 337,
                'id_products' => 133,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 338,
                'id_products' => 133,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 339,
                'id_products' => 134,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 340,
                'id_products' => 134,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 341,
                'id_products' => 134,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 345,
                'id_products' => 136,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 346,
                'id_products' => 136,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 350,
                'id_products' => 138,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 351,
                'id_products' => 138,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 352,
                'id_products' => 139,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 353,
                'id_products' => 139,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 354,
                'id_products' => 140,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 355,
                'id_products' => 140,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 356,
                'id_products' => 141,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 357,
                'id_products' => 141,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 358,
                'id_products' => 141,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 359,
                'id_products' => 142,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 360,
                'id_products' => 142,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 361,
                'id_products' => 143,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 362,
                'id_products' => 143,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 368,
                'id_products' => 34,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => '2020-04-17 09:58:21',
            ),
            234 => 
            array (
                'id' => 369,
                'id_products' => 34,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 370,
                'id_products' => 34,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 371,
                'id_products' => 34,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 372,
                'id_products' => 34,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 373,
                'id_products' => 35,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 374,
                'id_products' => 35,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 375,
                'id_products' => 35,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 376,
                'id_products' => 35,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 377,
                'id_products' => 35,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 378,
                'id_products' => 36,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 379,
                'id_products' => 36,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 380,
                'id_products' => 36,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 381,
                'id_products' => 36,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 382,
                'id_products' => 36,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 383,
                'id_products' => 37,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 384,
                'id_products' => 37,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 385,
                'id_products' => 37,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 386,
                'id_products' => 37,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 387,
                'id_products' => 38,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 388,
                'id_products' => 38,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 389,
                'id_products' => 38,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 390,
                'id_products' => 38,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 391,
                'id_products' => 38,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 392,
                'id_products' => 39,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 393,
                'id_products' => 39,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 394,
                'id_products' => 39,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 395,
                'id_products' => 39,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 396,
                'id_products' => 39,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 397,
                'id_products' => 40,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 398,
                'id_products' => 40,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 399,
                'id_products' => 40,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 400,
                'id_products' => 40,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 401,
                'id_products' => 41,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 402,
                'id_products' => 41,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 403,
                'id_products' => 41,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 404,
                'id_products' => 42,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 405,
                'id_products' => 42,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 406,
                'id_products' => 42,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 407,
                'id_products' => 42,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 408,
                'id_products' => 42,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 409,
                'id_products' => 43,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 410,
                'id_products' => 43,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 411,
                'id_products' => 43,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 412,
                'id_products' => 43,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 413,
                'id_products' => 84,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 414,
                'id_products' => 84,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 415,
                'id_products' => 84,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 416,
                'id_products' => 84,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 417,
                'id_products' => 85,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 418,
                'id_products' => 85,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 419,
                'id_products' => 85,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 420,
                'id_products' => 85,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 421,
                'id_products' => 86,
                'id_size' => 5,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 422,
                'id_products' => 86,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 423,
                'id_products' => 86,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 424,
                'id_products' => 86,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 425,
                'id_products' => 86,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 426,
                'id_products' => 87,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 427,
                'id_products' => 87,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 428,
                'id_products' => 87,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 429,
                'id_products' => 87,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 430,
                'id_products' => 88,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 431,
                'id_products' => 88,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 432,
                'id_products' => 88,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 433,
                'id_products' => 88,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 434,
                'id_products' => 88,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 435,
                'id_products' => 89,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 436,
                'id_products' => 89,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 437,
                'id_products' => 89,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 438,
                'id_products' => 89,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 439,
                'id_products' => 89,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 440,
                'id_products' => 90,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 441,
                'id_products' => 90,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 442,
                'id_products' => 90,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 443,
                'id_products' => 90,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 444,
                'id_products' => 91,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 445,
                'id_products' => 91,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 446,
                'id_products' => 91,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 447,
                'id_products' => 91,
                'id_size' => 11,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 448,
                'id_products' => 92,
                'id_size' => 5,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 449,
                'id_products' => 92,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 450,
                'id_products' => 92,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 451,
                'id_products' => 92,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 452,
                'id_products' => 93,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 453,
                'id_products' => 93,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 454,
                'id_products' => 93,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 455,
                'id_products' => 93,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 456,
                'id_products' => 100,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 457,
                'id_products' => 100,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 458,
                'id_products' => 100,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 459,
                'id_products' => 100,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 460,
                'id_products' => 101,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 461,
                'id_products' => 101,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 462,
                'id_products' => 101,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 463,
                'id_products' => 101,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 464,
                'id_products' => 102,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 465,
                'id_products' => 102,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 466,
                'id_products' => 102,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 467,
                'id_products' => 103,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 468,
                'id_products' => 103,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 469,
                'id_products' => 103,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 470,
                'id_products' => 103,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 471,
                'id_products' => 104,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 472,
                'id_products' => 104,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 473,
                'id_products' => 104,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 474,
                'id_products' => 104,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 475,
                'id_products' => 105,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 476,
                'id_products' => 105,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 477,
                'id_products' => 105,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 478,
                'id_products' => 105,
                'id_size' => 10,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 479,
                'id_products' => 106,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 480,
                'id_products' => 106,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 481,
                'id_products' => 106,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 482,
                'id_products' => 124,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 483,
                'id_products' => 124,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 484,
                'id_products' => 124,
                'id_size' => 9,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 485,
                'id_products' => 125,
                'id_size' => 5,
                'quantity' => 0,
                'created_at' => NULL,
                'updated_at' => '2020-04-23 11:32:47',
            ),
            351 => 
            array (
                'id' => 486,
                'id_products' => 125,
                'id_size' => 6,
                'quantity' => 1,
                'created_at' => NULL,
                'updated_at' => '2020-04-23 11:26:43',
            ),
            352 => 
            array (
                'id' => 487,
                'id_products' => 126,
                'id_size' => 5,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 488,
                'id_products' => 126,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 489,
                'id_products' => 126,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 490,
                'id_products' => 127,
                'id_size' => 5,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 491,
                'id_products' => 127,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 492,
                'id_products' => 127,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 493,
                'id_products' => 128,
                'id_size' => 5,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 494,
                'id_products' => 128,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 495,
                'id_products' => 128,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 496,
                'id_products' => 128,
                'id_size' => 8,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 497,
                'id_products' => 129,
                'id_size' => 5,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 498,
                'id_products' => 129,
                'id_size' => 6,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 499,
                'id_products' => 129,
                'id_size' => 7,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 500,
                'id_products' => 49,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 501,
                'id_products' => 49,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 502,
                'id_products' => 49,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 503,
                'id_products' => 50,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 504,
                'id_products' => 50,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 505,
                'id_products' => 50,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 506,
                'id_products' => 51,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 507,
                'id_products' => 51,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 508,
                'id_products' => 51,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 509,
                'id_products' => 52,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 510,
                'id_products' => 52,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 511,
                'id_products' => 52,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 512,
                'id_products' => 52,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 513,
                'id_products' => 53,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 514,
                'id_products' => 53,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 515,
                'id_products' => 53,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 516,
                'id_products' => 135,
                'id_size' => 3,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 517,
                'id_products' => 135,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 518,
                'id_products' => 135,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 519,
                'id_products' => 135,
                'id_size' => 4,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 520,
                'id_products' => 137,
                'id_size' => 2,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 521,
                'id_products' => 137,
                'id_size' => 1,
                'quantity' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}