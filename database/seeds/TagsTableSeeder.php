<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Daigo', 'Nijo', 'Yamato', 'Saga', 'Minamoto', 'Taira', 'Fujiwara'];

        foreach($tags as $tag){
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Tag::tagSlug($tag);
            $new_tag->save();
        }
    }
}
