<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function client() {        
        return $this->belongsTo('App\Client');
    }
}
