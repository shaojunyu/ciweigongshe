<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $hidden = ['id','created_at','updated_at'];
}
