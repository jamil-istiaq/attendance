<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function task() {
        return $this->hasMany('App\Task');
    }

    public function project() {
        return $this->hasMany('App\Project');
    }

}
