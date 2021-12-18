<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    public function user(){ //追記
        return $this->belongsTo('App\Models\User');
    }
    public function rest(){ //追記
        return $this->hasMany('App\Models\rest');
    }
}
