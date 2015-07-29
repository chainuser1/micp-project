<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table="news";
    protected $fillable=['title','slug','content','created_at'];
    protected $hidden=['_token'];
}
