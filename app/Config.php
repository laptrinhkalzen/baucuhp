<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

    protected $table = 'config';
    protected $fillable = [
        'title', 'address', 'phone', 'email', 'image', 'favicon', 'description', 'keywords'
    ];
    public $timestamps = false;
}
