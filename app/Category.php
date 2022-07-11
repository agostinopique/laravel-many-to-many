<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public static function categorySlug($string){
        $slug = Str::slug($string, '-');
        $new_slug = $slug;
        $getslug = Category::where('slug', $slug)->first();
        $s = 1;

        while($getslug){
            $slug = $new_slug . $s;
            $s++;
            $getslug = Category::where('slug', $slug)->first();
        }

        return $slug;
    }
}
