<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\user;
use App\Model\car;

class UserController extends Controller
{
    

    public function index()
    {
        if(request()->has('search')){
            $users=user::where('name','like','%'.request('search').'%')->paginate(10);
            return view('Admin/user/show',compact('users'));
        }
        else{
        $users=user::paginate(10);
        return view('Admin/user/show',compact('users'));
    }
    }

    
    public function create()
    {
        $cars=car::all();
        return view('Admin/user/user',compact('cars'));
    }

   
    public function store(Request $request)
    {
        
          $this->validate(request(),[
            'name'=>'required|string|min:3|unique:users',
            'email'=>'required|unique:users',
            'phone'=>'required|numeric|min:11',
            'address'=>'required',
            'car'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

       $time=car::find(request('car'))->hired_user()->get();
       foreach($time as $time){
           $st_time=date_create($time->start_time);
           $end_time=date_create($time->end_time);
           $current_time=date_create(request('start_time')) ;
           if( ($st_time <=$current_time && $current_time <= $end_time) ){
               return back()->withInput()->with('message','Sorry this date is hired for another user  please choose another date');
           }
       }


        $user=new user();
        $car_id=request('car');
        DB::table('cars')->where('id',$car_id)->update(['hired'=>'1']);
        $user->name=request('name');
        $user->car_id=$car_id;
        $user->email=request('email');
        $user->phone=request('phone');
        $user->address=request('address');
        $user->start_time=request('start_time');
        $user->end_time=request('end_time');
        $user->save();
        return redirect(route('user.index'))->with('message','User Created Successfully');

    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $user=user::find($id);
        $cars=car::all();
        return view('Admin/user/edit',compact('user','cars'));
    }

   
    public function update(Request $request, $id)
    {
          $this->validate(request(),[
            'name'=>'required|string|min:3',
            'email'=>'required',
            'phone'=>'required|numeric|min:11',
            'address'=>'required',
            'car'=>'required',
        ]);

    
        $user=user::find($id);
        $car_id=request('car');
        DB::table('cars')->where('id',$car_id)->update(['hired'=>'1']);
        $user->name=request('name');
        $user->car_id=$car_id;
        $user->email=request('email');
        $user->phone=request('phone');
        $user->address=request('address');
        $user->start_time=request('start_time');
        $user->end_time=request('end_time');
        $user->save();
        return redirect(route('user.index'))->with('message','User Updated Successfully');
    }

    
    public function destroy($id)
    {
        $car_id= user::find($id)->car->id;
        DB::table('cars')->where('id',$car_id)->update(['hired'=>'0']);
        user::find($id)->delete();
        return back()->with('message','User Deleted Successfully');
    }

    function search(){
      
       $term=request('term');
       $users=user::where('name','Like','%'.$term.'%')
                   ->get();
       if(count($users)==0){
           $searchresult[]='no result found';
       }
      else{
           foreach($users as $user){
               $searchresult[]=$user->name;
           }
      }
       return $searchresult;

    }
}
