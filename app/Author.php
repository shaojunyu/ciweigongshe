<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    protected $hidden = ['id','created_at','updated_at'];
}
