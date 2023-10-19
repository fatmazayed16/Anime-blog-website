<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $table = 'posts';
    protected $post =['title' , 'description' , 'category' , 'image_path' ,  'created_at' , 'updated_at'];
    
}
