<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	
    protected $table = 'project';

    public function tasks()
    {
        return $this->hasMany('App\task');
    }

    public function submission(){
        return $this->hasMany('App\submission');
    }

}
