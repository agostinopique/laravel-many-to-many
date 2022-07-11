<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable= [
        // 'category_id',
        'title',
        'description',
        'content',
        'slug'
    ];
    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $original_slug = $slug;
        $findslug = Post::where('slug', $slug)->first();
        $i = 0;

        while($findslug){
            $slug = $original_slug . $i;
            $i++;
            $findslug = Post::where('slug', $slug)->first();
        }
        return $slug;
    }
}
