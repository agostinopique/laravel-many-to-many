<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Katana', 'Kodachi', 'Nodachi', 'Uchigatana', 'Wakizashi', 'Tsuba'];

        foreach($categories as $category){
            $new_category = new Category();
            $new_category->category = $category;
            $new_category->slug = Category::categorySlug($category);
            $new_category->save();
        }
    }
}
