<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
     public function agency(){
    	return $this->belongsToMany('App\Model\agency','agency_cars');
    }

    public function hired_user(){
    	return $this->hasMany('App\Model\user');
    }
    
    

}
