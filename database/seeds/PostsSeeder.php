<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            $new_post = new Post();
            $new_post->title = $faker->word();
            $new_post->slug = Post::generateSlug($new_post->title);
            $new_post->description = $faker->sentence();
            $new_post->content = $faker->text(500);
            $new_post->save();
        }
    }
}
