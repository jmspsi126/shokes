<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\task')->withTimestamps();
    }

    public function projects(){
        return $this->belongsToMany('App\project')->withTimestamps();
    }

}
