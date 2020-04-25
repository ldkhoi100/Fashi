<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ObjectsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(InstagramsTableSeeder::class);
        $this->call(ImageLargeProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        // $this->call(BlogCommentsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        // $this->call(SizeProductsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        // $this->call(BillsTableSeeder::class);
        // $this->call(BillDetailTableSeeder::class);
        // $this->call(MessengeTableSeeder::class);
        // $this->call(ReviewsTableSeeder::class);
        // $this->call(MessageCenterTableSeeder::class);
        // $this->call(SubscribeTableSeeder::class);
        // $this->call(CommentsTableSeeder::class);
        // $this->call(ContactTableSeeder::class);
        // $this->call(CouponsTableSeeder::class);
        $this->call(SlideTableSeeder::class);
    }
}