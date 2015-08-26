<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class News extends Model
{
    protected $table="news";
    protected $fillable=['title','slug','content','created_at'];
    protected $hidden=['_token'];
    protected $dates=['created_at'];
    public function scopeCreatedAt($query){
        $query->where('created_at','<=',Carbon::now())->orderBy('created_at','DESC');
    }
    public function setCreatedAt($date){
        $this->attributes['created_at']= Carbon::createFromFormat('Y-m-d H:i:s', $date);
    }
    public function scopeUnpublished($query){
        $query->where('created_at','>',Carbon::now())->orderBy('created_at','DESC');;
    }
    public function setTitle($title){
        $this->attributes['title']=News::getConnection()->getPdo()->quote($title);
    }
    public function setContent($content){
        $this->attributes['content']=News::getConnection()->getPdo()->quote($content);
    }
}
