<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['title','body','image','writer_id','created_at','uplodedTime','updatedTime','writter'];

    public function getImageAttribute($val){
        return '/storage/postImages/'.$val;
    }

    public function user(){
        return $this->belongsTo('App\Models\User','writer_id');
    }
}
