<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class user extends Model
{
	


    public function car(){
    	return $this->belongsTo('App\Model\car','car_id','id');
    }
}
