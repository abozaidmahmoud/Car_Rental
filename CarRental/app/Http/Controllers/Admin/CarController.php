<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\car;
use App\Model\agency;

class CarController extends Controller
{
    
    public function index()
    {
        if(request()->has('search')){
            $cars=car::where('name','like','%'.request('search').'%')->paginate(10);
            return view('Admin/car/show',compact('cars'));
        }
        else{
        $cars=car::paginate(10);
        return view('Admin/car/show',compact('cars'));
    }
    }
/*
    //show all users hired cars in agency
    public function hired_cars(){
        $cars=car::where('available',0)->get();
        return view('Admin/car/hired_cars',compact('cars'));
    }*/

  
    
    public function create()
    {
        $agencies=agency::all();
        return view('Admin/car/car',compact('agencies'));
    }

   
    public function store(Request $request)
    {
       
        $this->validate(request(),[
            'name'=>'required|string|min:3|unique:cars',
            'agency'=>'required',
            'rent_price'=>'required|numeric',
            'image'=>'required',
            'description'=>'required'
        ]);
       //store multible image for car
       $image_names=array();
       $name=array();
        if($request->hasfile('image')){
            foreach(request()->image as $image){
               $name[]=$image->getClientOriginalName();
              $image_names[]= $image->store('public/image_car');   
            }
        }
       
     
  
        $car=new car();
        $car->name=request('name');
        $car->agency_id=request('agency');
        $car->rent_price=request('rent_price');
        $car->model=request('model');
        $car->image=implode('|',$image_names); //cobvery array to string to store in db
        $car->description=strip_tags(request('description'));
        $car->save();
        $car->agency()->Sync(request('agency'));
        return redirect(route('car.index'))->with('message','car created successfully');
    }

    
    
    public function show($id)
    {
     
        $car=car::find($id);

        return view('Admin/car/car_details',compact('car'));
    }

   
    public function edit($id)
    {
        $car=car::find($id);
        $agencies=agency::all();
        return view('Admin/car/edit',compact('car','agencies'));
    }

   
    public function update(Request $request, $id)
    {
        
        $this->validate(request(),[
            'name'=>'required|string|min:3',
            'agency'=>'required',
            'rent_price'=>'required|numeric',
            'description'=>'required'
        ]);
        
       $image_names=array();
        if($request->hasfile('image')){
            foreach(request()->image as $image){
               $name=$image->getClientOriginalName();
              $image_names[]= $image->store('public/image_car');   
            }
        }
        
        $car=car::find($id);
        $car->name=request('name');
        $car->agency_id=request('agency');
        $car->rent_price=request('rent_price');
        $car->model=request('model');
         if($request->hasfile('image')){
        $car->image=implode('|',$image_names); //cobvery array to string to store in db
    }
        $car->description=strip_tags(request('description'));
        $car->agency()->Sync(request('agency'));
        $car->save();
        return redirect(route('car.index'))->with('message','Car Updated Successfully');

    }

   
    public function destroy($id)
    {
        car::find($id)->delete();
        return back();
    }

     function search(){
      
       $term=request('term');
       $cars=car::where('name','Like','%'.$term.'%')
                   ->get();
       if(count($cars)==0){
           $searchresult[]='no result found';
       }
      else{
           foreach($cars as $car){
               $searchresult[]=$car->name;
           }
      }
       return $searchresult;

    }

   
}
