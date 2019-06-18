<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function team_member(){
        return $this->hasMany('App\Team_member');
    }
}
