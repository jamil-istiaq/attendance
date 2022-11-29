<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    public function employee() {        
        return $this->belongsTo('App\Employee','assign_to');
    }

    public function client() {        
        return $this->belongsTo('App\Client');
    }
}
