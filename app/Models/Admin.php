<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use App\Models\Blog;


class Admin extends Model
{
    protected $guarded=[];
    public function blogs(){
    	return $this->hasMany(Blog::class, 'id_admin', 'id');
    }
}