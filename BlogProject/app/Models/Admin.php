<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable=['username','password'];
    public function admin(){
        return $this->hasMany('App\Models\Post');
    }
}

