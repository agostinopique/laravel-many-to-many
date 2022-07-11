<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 40; $i++){
            $post = Post::inRandomOrder()->first();

            $tag_id = Tag::inRandomOrder()->first()->id;

            $post->tags()->attach($tag_id);
        }
    }
}
