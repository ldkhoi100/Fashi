<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('comments')->delete();

        \DB::table('comments')->insert(array(
            0 =>
            array(
                'commenter_id' => '1',
                'commenter_type' => 'App\\User',
                'guest_name' => NULL,
                'guest_email' => NULL,
                'commentable_type' => 'App\\Blogs',
                'commentable_id' => '4',
                'comment' => 'helooooooooooooo',
                'approved' => 1,
                'child_id' => NULL,
                'created_at' => '2020-04-21 11:29:20',
                'updated_at' => '2020-04-21 11:29:20',
            ),
        ));
    }
}