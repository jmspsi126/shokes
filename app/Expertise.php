<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $table = 'expertise';

    public function user()
    {
        return $this->hasOne('App\User');
    }

}
