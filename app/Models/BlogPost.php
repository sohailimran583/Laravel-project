<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title','content','user_id'];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public static function  boot(){
        parent::boot();
        static::deleting(function(Blogpost $blogpost){
            $blogpost->comments()->delete();

        });
        static::restoring(function(Blogpost $blogpost){
            $blogpost->comments()->restore();

        });
    }
    public function setTitleAttribute($value){
        $this->attributes['title']=ucwords($value);
    }
    public function getTitleAttribute($value){
        return strtoupper($value);

      }
}
