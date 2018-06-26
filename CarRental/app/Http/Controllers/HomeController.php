<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\car;
use App\Model\user;
use App\Model\agency;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function home(){

        $agencies=agency::all();
      if(request()->has('search')){
          $cars=car::where('name','like','%'.request('search').'%')->get();
          return view('User/homepage',compact('cars','agencies'));
      }
    	$cars=car::all();
    	$agencies=agency::all();
    	return view('User/homepage',compact('cars','agencies'));
    }

    public function hire_car (){
        
          $this->validate(request(),[
            'name'=>'required|string|min:3|unique:users',
            'email'=>'required|unique:users',
            'phone'=>'required|numeric|min:11',
            'address'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);
          //validate hire date to be asign to one user
          $time=car::find(request('car_id'))->hired_user()->get();
          foreach($time as $time){
              $st_time=date_create($time->start_time);
              $end_time=date_create($time->end_time);
              $current_time=date_create(request('start_time')) ;
              if( ($st_time <=$current_time && $current_time <= $end_time) ){
                  return back()->withInput()->with('message','Sorry this date is hired for another user  please choose another date');
              }
          }

     
        $user=new user();
        $car_id=request('car_id');
        DB::table('cars')->where('id',$car_id)->update(['hired'=>'1']);
        $user->name=request('name');
        $user->car_id=$car_id;
        $user->email=request('email');
        $user->phone=request('phone');
        $user->address=request('address');
        $user->start_time=request('start_time');
        $user->end_time=request('end_time');
        $user->save();
        return back()->with('message','hired Successfully');


    }

    public function show_car($id){
    	if($id=='all'){
    		$cars=car::all();
    	}
    	else{
    	$cars=agency::find($id)->cars()->get();
    }
    	$agencies=agency::all();
    	return view('User/homepage',compact('cars','agencies'));
    }


     function search(){
      
       $term=request('term');
       $cars=car::where('name','Like','%'.$term.'%')
                   ->get();
       if(count($cars)==0){
           $searchresult[]='no search result';
       }
      else{
           foreach($cars as $car){
               $searchresult[]=$car->name;
           }
      }
       return $searchresult;

    }


}
