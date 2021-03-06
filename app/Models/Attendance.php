<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = ['user_id','date','start_time','end_time'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function rest(){
        return $this->hasMany('App\Models\rest');
    }
}
