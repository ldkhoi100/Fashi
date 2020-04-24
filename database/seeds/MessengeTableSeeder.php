<?php

use Illuminate\Database\Seeder;

class MessengeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('messenge')->delete();
        
        \DB::table('messenge')->insert(array (
            0 => 
            array (
                'id' => 1,
                'from_user' => 1,
                'to_user' => 2,
                'title' => 'Hê lu bạnHê lu bạnHê lu bạnHê lu bạnHê lu bạnHê lu bạnHê lu bạn',
                'message' => '<p>H&ecirc; lu bạn&nbsp;H&ecirc; lu bạn&nbsp;H&ecirc; lu bạn&nbsp;</p>',
                'reader' => 1,
                'remove' => 0,
                'created_at' => '2020-04-12 14:59:43',
                'updated_at' => '2020-04-13 09:02:07',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'from_user' => 2,
                'to_user' => 1,
                'title' => '23457',
                'message' => 'chào thằng bạn lâu ngày nhểchào thằng bạn lâu ngày nhểchào thằng bạn lâu ngày nhểchào thằng bạn lâu ngày nhểchào thằng bạn lâu ngày nhểchào thằng bạn lâu ngày nhể',
                'reader' => 1,
                'remove' => 0,
                'created_at' => '2020-04-12 15:03:42',
                'updated_at' => '2020-04-13 09:17:59',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'from_user' => 1,
                'to_user' => 2,
                'title' => 'RE:23457',
                'message' => '<p>ok, bạn kh&ocirc;ng sai, hhihihi</p>',
                'reader' => 1,
                'remove' => 0,
                'created_at' => '2020-04-12 17:48:24',
                'updated_at' => '2020-04-13 08:48:01',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'from_user' => 2,
                'to_user' => 1,
                'title' => 'RE:23457',
                'message' => '<p>ok ok con d&ecirc; hihihi</p>',
                'reader' => 1,
                'remove' => 0,
                'created_at' => '2020-04-12 17:56:17',
                'updated_at' => '2020-04-13 09:17:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}