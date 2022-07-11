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
        $this->call(PostsSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ForeignKeySeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
    }
}
