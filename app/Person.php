<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function liked()
    {
        return $this->belongsTo('App\Like','person_id','id');
    }
    public function unliked()
    {
        return $this->belongsTo('App\Unlike','person_id','id');
    }
}
