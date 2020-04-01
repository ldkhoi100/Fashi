<?php

use Illuminate\Database\Seeder;
use App\Objects;

class ObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Objects();
        $obj->name = 'None';
        $obj->save();

        $obj = new Objects();
        $obj->name = 'Man';
        $obj->save();

        $obj = new Objects();
        $obj->name = 'Woman';
        $obj->save();

        $obj = new Objects();
        $obj->name = 'Kid';
        $obj->save();

        $obj = new Objects();
        $obj->name = 'Blog';
        $obj->save();
    }
}