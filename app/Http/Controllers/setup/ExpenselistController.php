<?php

namespace App\Http\Controllers\setup;
use App\Models\Expenselist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenselistController extends Controller
{
    
    function index(){       
       // $expenselists = DB::table('expenselists')->orderBy('id', 'desc')->get();
        $expenselists = Expenselist::orderBy('id', 'desc')->paginate(50);
        return view('expenselist.expenselist',['expenselists'=>$expenselists]);
    }

    function create(){
       // $expense_types = DB::table('expense_types')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
        return view('expenselist.create');     
    }


    function store(Request $request){
        
        $expenselists = New Expenselist;

        $expenselists->name          = $request->input('name');      
        $expenselists->description   = $request->input('description');
        $expenselists->is_active     = $request->input('is_active');  
        $expenselists->created_by    = auth()->user()->id;      
       

        $expenselists->save();
        return redirect('expenselist')->with('status','Succesfully Inserted');
       
       
    }


    function show($id){     
       
        $expenselists = Expenselist::find($id);     
        return view('expenselist.edit', ['expenselists'=>$expenselists]);
    }


    function update(Request $request, $id){     
       
        $expenselists = Expenselist::find($id); 
        $expenselists->name          = $request->input('name');      
        $expenselists->description   = $request->input('description');
        $expenselists->is_active     = $request->input('is_active');      
        $expenselists->updated_by    = auth()->user()->id;       
       
        $expenselists->update();         
        return redirect('expenselist')->with('status','Updated Successfully');
    }


    function delete($id){     
       
        $expenselists = Expenselist::find($id);        
        $expenselists->delete();    
        return redirect('expenselists')->with('status',' Deleted Succesfully ');
    }



}
