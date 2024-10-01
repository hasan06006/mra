<?php

namespace App\Http\Controllers\setup;
use App\Models\Paymentlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentlistController extends Controller
{
    function index(){       
        // $expenselists = DB::table('expenselists')->orderBy('id', 'desc')->get();
         $paymentlists = Paymentlist::orderBy('id', 'desc')->paginate(50);
         return view('paymentlist.paymentlist',['paymentlists'=>$paymentlists]);
        
     }
 
     function create(){
        // $expense_types = DB::table('expense_types')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
         return view('paymentlist.create');     
     }
 
 
     function store(Request $request){
         
         $paymentlists = New Paymentlist;
 
         $paymentlists->name          = $request->input('name');      
         $paymentlists->description   = $request->input('description');
         $paymentlists->is_active     = $request->input('is_active');  
         $paymentlists->created_by    = auth()->user()->id;      
        
 
         $paymentlists->save();
         return redirect('paymentlist')->with('status','Succesfully Inserted');
        
        
     }
 
 
     function show($id){     
        
         $paymentlists = Paymentlist::find($id);     
         return view('paymentlist.edit', ['paymentlists'=>$paymentlists]);
     }
 
 
     function update(Request $request, $id){     
        
         $paymentlists = Paymentlist::find($id); 
         $paymentlists->name          = $request->input('name');      
         $paymentlists->description   = $request->input('description');
         $paymentlists->is_active     = $request->input('is_active');      
         $paymentlists->updated_by    = auth()->user()->id;       
        
         $paymentlists->update();         
         return redirect('paymentlist')->with('status','Updated Successfully');
     }
 
 
     function delete($id){     
        
         $paymentlists = Paymentlist::find($id);        
         $paymentlists->delete();    
         return redirect('paymentlist')->with('status',' Deleted Succesfully ');
     }
}
