<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
