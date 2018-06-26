<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    public function cars(){
     return	$this->belongsToMany('App\Model\car','agency_cars');
    }

   
}
