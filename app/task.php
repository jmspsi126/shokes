<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model {

    protected $table = "tasks" ;

    public function project()
    {
        return $this->belongsTo('App\project');
    }

    public function user()
    {
        return $this->belongsToMany('App\User')->withTimestamps();

    }

    public function rank()
    {
        return $this->hasMany('App\rank');
    }

    public function skill()
    {
        return $this->belongsToMany('App\skill')->withTimestamps();
    }

    public function taskUsers() {
        return $this->hasMany('App\TaskUser');
    }


}
