<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function thread(){
        return $this->belongsTo('App\Models\Thread');
    }
    public function desk(){
        return $this->belongsTo('App\Models\Desk');
    }
}
