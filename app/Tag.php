<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{

    public function posts(){
        return $this->belongsToMany('App\Post');
    }

    public static function tagSlug($string){
        $slug = Str::slug($string, '-');
        $new_slug = $slug;
        $getslug = Tag::where('slug', $slug)->first();
        $s = 1;

        while($getslug){
            $slug = $new_slug . $s;
            $s++;
            $getslug = Tag::where('slug', $slug)->first();
        }

        return $slug;
    }
}
