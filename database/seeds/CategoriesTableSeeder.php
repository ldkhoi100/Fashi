<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = new Categories();
        $categories->name = 'Clothings';
        $categories->description = 'Clothings for man';
        $categories->id_objects = 2;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'HandBag';
        $categories->description = 'HandBag for man';
        $categories->id_objects = 2;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Shoes';
        $categories->description = 'Shoes for man';
        $categories->id_objects = 2;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Accessories';
        $categories->description = 'Accessories for man';
        $categories->id_objects = 2;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Clothings';
        $categories->description = 'Clothings for woman';
        $categories->id_objects = 3;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'HandBag';
        $categories->description = 'HandBag for woman';
        $categories->id_objects = 3;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Shoes';
        $categories->description = 'Shoes for woman';
        $categories->id_objects = 3;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Accessories';
        $categories->description = 'Accessories for woman';
        $categories->id_objects = 3;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Clothings';
        $categories->description = 'Clothings for kid';
        $categories->id_objects = 4;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'HandBag';
        $categories->description = 'HandBag for kid';
        $categories->id_objects = 4;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Shoes';
        $categories->description = 'Shoes for kid';
        $categories->id_objects = 4;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Accessories';
        $categories->description = 'Accessories for kid';
        $categories->id_objects = 4;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Fashion';
        $categories->description = 'Fashion blog';
        $categories->id_objects = 5;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Travel';
        $categories->description = 'Travel blog';
        $categories->id_objects = 5;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Picnic';
        $categories->description = 'Picnic blog';
        $categories->id_objects = 5;
        $categories->save();

        $categories = new Categories();
        $categories->name = 'Model';
        $categories->description = 'Model blog';
        $categories->id_objects = 5;
        $categories->save();
    }
}