<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function desk(){
        return $this->belongsTo('App\Models\Desk');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
