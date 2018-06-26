<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\agency;
class AgencyController extends Controller
{


    public function show_rented_user($id){
       $cars=agency::find($id)->cars()->get();
       return view('Admin/agency/users_details',compact('cars'));
    }
    
    public function index()
    {
        if(request()->has('search')){
            $agencies=agency::where('name','like','%'.request('search').'%')->paginate(10);
            return view('Admin/agency/show',compact('agencies'));
        }
        else{
        $agencies=agency::paginate(10);
        return view('Admin/agency/show',compact('agencies'));
    }
    }

    public function agency_detail(){
        $agencies=agency::all();
        return view('Admin/agency/agency_detail',compact('agencies'));
    }

  
    public function create()
    {
        return view('Admin/agency/agency');
    }

    
    public function store(Request $request)
    {
        
        $this->validate(request(),[
            'name'=>'required|string|min:3|unique:agencies',
            'address'=>'required',
            'email'=>'required|unique:agencies|email',
            'mobile'=>'required|numeric|min:11|max:11',
            'image'=>'required'
        ]);
        $image='';
        if(request()->hasFile('image')){
           $image= request('image')->store('public/agency_images');
           
        }
        $agency=new agency();
        $agency->name=request('name');
        $agency->address=request('address');
        $agency->email=request('email');
        $agency->mobile=request('mobile');
        $agency->image=$image;
        $agency->save();
        return redirect(route('agency.index'))->with('message','Agency created successfully');
    }

    
    public function show($id)
    {

        $cars=agency::find($id)->cars()->where('hired','1')->get();
        
        return view('Admin/car/hired_cars',compact('cars'));
    }

    public function edit($id)
    {
        $agency=agency::find($id);
        return view('Admin/agency/edit',compact('agency'));
    }

   
    public function update(Request $request, $id)
    {
        
        $this->validate(request(),[
            'name'=>'required|string|min:3',
            'address'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric|min:11|max:11',
            'image'=>'required'
        ]);

        $image='';
        if(request()->hasFile('image')){
           $image= request('image')->store('public/agency_images');
        
        }
        
        $agency=agency::find($id);
        $agency->name=request('name');
        $agency->address=request('address');
        $agency->email=request('email');
        $agency->mobile=request('mobile');
        $agency->image=$image;
        $agency->save();
        return redirect(route('agency.index'))->with('message','Agency Updated successfully');

    }

    
    public function destroy($id)
    {
        agency::find($id)->delete();
        return back();
    }

    function search(){
      
       $term=request('term');
       $agencies=agency::where('name','Like','%'.$term.'%')
                   ->get();
       if(count($agencies)==0){
           $searchresult[]='no result found';
       }
      else{
           foreach($agencies as $agency){
               $searchresult[]=$agency->name;
           }
      }
       return $searchresult;

    }
}
