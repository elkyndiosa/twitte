<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    protected $table = 'tweets';
    function user(){
        return $this->hasOne('App\User');
    }
}
