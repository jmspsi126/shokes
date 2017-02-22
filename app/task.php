<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model {

    protected $table = "tasks" ;

    protected $match = 0;

    protected $fillable = ['name','project_id','description','estimateTime','sequence'];


    public function getMatch()
    {
        return $this->match;
    }
    
    public function setMatch($m)
    {
        $this->match = $m;
    }

    public function project()
    {
        return $this->belongsTo('App\project');
    }


    public function submission()
    {
        return $this->hasMany('App\submission');
    }

    public function user()
    {
        return $this->belongsToMany('App\User')->withTimestamps();

    }

    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }


    public function rank()
    {
        return $this->hasMany('App\rank');
    }

    public function skill()
    {
        return $this->belongsToMany('App\skill')->withTimestamps();
    }


    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }

    public function taskUsers() {
        return $this->hasMany('App\TaskUser');
    }


}
