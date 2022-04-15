<?php

namespace App\Models;
use App\Models\Amin;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $guarded=[];

     public function categories(){
          return $this->belongsTo('App\Models\Category','id_cate');
     }
     public function admins(){
          return $this->belongsTo(Admin::class, 'id_admin', 'id');
     }
}
