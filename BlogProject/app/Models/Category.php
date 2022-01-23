<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','detail','image'];

    public function admin(){
        return $this->belongsTo('App\Models\admin');
    }
    
    public function category(){
        return $this->hasMany('App\Models\Post');
    }
}
