<?php

namespace App\Http\Controllers\setup;
use App\Models\Peoplelist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeoplelistController extends Controller
{
    function index(){       
        // $expenselists = DB::table('expenselists')->orderBy('id', 'desc')->get();
         $peoplelists = Peoplelist::orderBy('id', 'desc')->paginate(50);
         return view('peoplelist.peoplelist',['peoplelists'=>$peoplelists]);
        
     }
 
     function create(){
        // $expense_types = DB::table('expense_types')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
         return view('peoplelist.create');     
     }
 
 
     function store(Request $request){
         
         $peoplelists = New Peoplelist;
         $peoplelists->office_id          = $request->input('office_id');
         $peoplelists->name          = $request->input('name');
         $peoplelists->is_received_by          = $request->input('is_received_by'); 
         $peoplelists->is_prepared_by          = $request->input('is_prepared_by'); 
         $peoplelists->is_varified_by          = $request->input('is_varified_by'); 
         $peoplelists->is_approved_by          = $request->input('is_approved_by');        
         $peoplelists->is_active     = $request->input('is_active');  
         $peoplelists->created_by    = auth()->user()->id;      
        
 
         $peoplelists->save();
         return redirect('peoplelist')->with('status','Succesfully Inserted');
        
        
     }
 
 
     function show($id){     
        
         $peoplelists = Peoplelist::find($id);     
         return view('peoplelist.edit', ['peoplelists'=>$peoplelists]);
     }
 
 
     function update(Request $request, $id){     
        
         $peoplelists = Peoplelist::find($id); 

         $peoplelists->office_id       = $request->input('office_id');
         $peoplelists->name          = $request->input('name'); 
         $peoplelists->is_received_by          = $request->input('is_received_by'); 
         $peoplelists->is_prepared_by          = $request->input('is_prepared_by'); 
         $peoplelists->is_varified_by          = $request->input('is_varified_by'); 
         $peoplelists->is_approved_by          = $request->input('is_approved_by');       
         $peoplelists->is_active     = $request->input('is_active');       
         $peoplelists->updated_by    = auth()->user()->id;       
        
         $peoplelists->update();         
         return redirect('peoplelist')->with('status','Updated Successfully');
     }
 
 
     function delete($id){     
        
         $peoplelists = Peoplelist::find($id);        
         $peoplelists->delete();    
         return redirect('peoplelist')->with('status',' Deleted Succesfully ');
     }
}
