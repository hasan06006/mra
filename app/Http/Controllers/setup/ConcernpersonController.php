<?php

namespace App\Http\Controllers\setup;
use App\Models\Concernperson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConcernpersonController extends Controller
{
    function index(){       
        // $expenselists = DB::table('expenselists')->orderBy('id', 'desc')->get();
         $concernpersons = Concernperson::orderBy('id', 'desc')->paginate(50);
         return view('concernperson.concernperson',['concernpersons'=>$concernpersons]);
        
     }
 
     function create(){
        // $expense_types = DB::table('expense_types')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
         return view('concernperson.create');     
     }
 
 
     function store(Request $request){
         
         $concernpersons = New Concernperson;
 
         $concernpersons->name          = $request->input('name');      
         $concernpersons->description   = $request->input('description');
         $concernpersons->is_active     = $request->input('is_active');  
         $concernpersons->created_by    = auth()->user()->id;      
        
 
         $concernpersons->save();
         return redirect('concernperson')->with('status','Succesfully Inserted');
        
        
     }
 
 
     function show($id){     
        
         $concernpersons = Concernperson::find($id);     
         return view('concernperson.edit', ['concernpersons'=>$concernpersons]);
     }
 
 
     function update(Request $request, $id){     
        
         $concernpersons = Concernperson::find($id); 
         $concernpersons->name          = $request->input('name');      
         $concernpersons->description   = $request->input('description');
         $concernpersons->is_active     = $request->input('is_active');      
         $concernpersons->updated_by    = auth()->user()->id;       
        
         $concernpersons->update();         
         return redirect('concernperson')->with('status','Updated Successfully');
     }
 
 
     function delete($id){     
        
         $concernpersons = Concernperson::find($id);        
         $concernpersons->delete();    
         return redirect('concernperson')->with('status',' Deleted Succesfully ');
     }
}
