<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    protected $fillable = ['user_id', 'title', 'sub_title'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
