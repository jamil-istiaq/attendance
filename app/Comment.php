<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function Employee() {
        return $this->belongsTo('App\Employee','user_id');
    }
}
