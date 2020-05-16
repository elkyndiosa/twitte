<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    protected $table = 'tweets';
    // public function user(){
    //     return $this->hasOne('\App\User');
    // }
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
