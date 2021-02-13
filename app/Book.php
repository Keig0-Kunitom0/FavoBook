<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title','author','publisher','img_url','release_date','affiliate',
    ];
}
