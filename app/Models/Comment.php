<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Comment extends Model
{
    use HasFactory ,SoftDeletes;

    public function blogpost(){
        return $this->belongsTo('App\Models\BlogPost');
    }

}
