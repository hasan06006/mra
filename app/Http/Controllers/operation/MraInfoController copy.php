<?php

namespace App\Http\Controllers\operation;
use App\Models\Expenselist;
use App\Models\Paymentlist;
use App\Models\Concernperson;
use App\Models\Peoplelist;
use App\Models\Mraform;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Response;

class MraInfoController extends Controller
{
    

    function index(){     
              
       $mraforms = Mraform::orderBy('id', 'desc')->paginate(50);       
       return view('operation.mraform',['mraforms'=>$mraforms]);        
       
    }


    function create(){        
        $expenselists = DB::table('expenselists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $paymentlists = DB::table('paymentlists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $concernpersons = DB::table('concernpersons')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from  
        //$peoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from          
        $rbpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                 ->where('is_received_by','YES')
                                                 ->orderBy('name', 'asc')
                                                 ->get(); 
        $pbpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                 ->where('is_prepared_by','YES')
                                                 ->orderBy('name', 'asc')
                                                 ->get(); 
        $vbpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                        ->where('is_varified_by','YES')
                                                        ->orderBy('name', 'asc')
                                                        ->get();   
        $abpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                ->where('is_approved_by','YES')
                                                ->orderBy('name', 'asc')
                                                ->get();


        $lastInvoice = Mraform::orderBy('id', 'desc')->first();    
        if ($lastInvoice) {
            $invoice = 'INV-' . str_pad($lastInvoice->id + 1, 6, '0', STR_PAD_LEFT);
        } else {
            $invoice = 'INV-0000001';
        }      
      

        return view('operation.create', compact('expenselists','paymentlists','concernpersons','invoice','rbpeoplelists','pbpeoplelists','vbpeoplelists','abpeoplelists'));
       
       
    }

    function store(Request $request){
        
        $mraforms = New Mraform;
        $mraforms->invoice               = $request->input('invoice');
        $mraforms->expense_type          = $request->input('expense_type');      
        $mraforms->payment_type          = $request->input('payment_type');
        $mraforms->concern_person        = $request->input('concern_person');  
        $mraforms->purpose               = $request->input('purpose');
        $mraforms->amount                = $request->input('amount');
        $mraforms->grand_total           = $request->input('grand_total');
        $mraforms->word                  = $request->input('word');
        $mraforms->received_by           = $request->input('received_by');
        $mraforms->remarks               = $request->input('remarks');
        $mraforms->prepared_by           = $request->input('prepared_by');
        $mraforms->varified_by           = $request->input('varified_by');
        $mraforms->approved_by           = $request->input('approved_by');
        $mraforms->created_by            = auth()->user()->id;      


        if($request->hasfile('document')){

            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();     
            $filename = $mraforms->invoice.'-AAPROVED.'.$extension;      
            $file->move(public_path().'/uploads/documents/',$filename);
            $renterinfos->document = $filename;
        }
       

        $mraforms->save();
        return redirect('mraform')->with('status','Succesfully Inserted');
       
       
    }


    function show($id){     
       
        $mraforms = Mraform::find($id);

        $expenselists = DB::table('expenselists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $paymentlists = DB::table('paymentlists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $concernpersons = DB::table('concernpersons')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
       // $peoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $rbpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                ->where('is_received_by','YES')
                                                ->orderBy('name', 'asc')
                                                ->get(); 
        $pbpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                ->where('is_prepared_by','YES')
                                                ->orderBy('name', 'asc')
                                                ->get(); 
        $vbpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                ->where('is_varified_by','YES')
                                                ->orderBy('name', 'asc')
                                                ->get();   
        $abpeoplelists = DB::table('peoplelists')->Where('is_active', 'ACTIVE')
                                                ->where('is_approved_by','YES')
                                                ->orderBy('name', 'asc')
                                                ->get();                                                                           
       
        return view('operation.edit', compact('mraforms','expenselists','paymentlists','concernpersons','rbpeoplelists','pbpeoplelists','vbpeoplelists','abpeoplelists'));
    }


    function update(Request $request, $id){     
       
        $mraforms = Mraform::find($id); 
        $mraforms->invoice               = $request->input('invoice');
        $mraforms->expense_type          = $request->input('expense_type');      
        $mraforms->payment_type          = $request->input('payment_type');
        $mraforms->concern_person        = $request->input('concern_person');  
        $mraforms->purpose               = $request->input('purpose');
        $mraforms->amount                = $request->input('amount');
        $mraforms->grand_total           = $request->input('grand_total');
        $mraforms->word                  = $request->input('word');
        $mraforms->received_by           = $request->input('received_by');
        $mraforms->remarks               = $request->input('remarks');
        $mraforms->prepared_by           = $request->input('prepared_by');
        $mraforms->varified_by           = $request->input('varified_by');
        $mraforms->approved_by           = $request->input('approved_by');               
        $mraforms->updated_by    = auth()->user()->id;     
        
        
        if($request->hasfile('document')){
            $previous_doc = public_path("uploads/documents/{$mraforms->document}");
            if(!empty($mraforms->document)){
                    if (File::exists($previous_doc)) { // unlink or remove previous image from folder
                        unlink($previous_doc);
                    } 
            }
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();     
            $filename = $mraforms->invoice.'-AAPROVED.'.$extension;      
            $file->move(public_path().'/uploads/documents/',$filename);
            $mraforms->document = $filename;
        }           
        
       
        $mraforms->update();         
        return redirect('mraform')->with('status','Updated Successfully');
    }


    function delete($id){    
          
        $mraforms = Mraform::find($id);  
        
        $doc_path = public_path("uploads/documents/{$mraforms->document}");
       
        if(!empty($mraforms->document)){
            if(File::exists($doc_path)) {
                unlink($doc_path);        
            }
        } 
        
        $mraforms->delete();    
        return redirect('mraforms')->with('status',' Deleted Succesfully ');
    }



    

    function invoicepage($id){     
       
        $mraforms = Mraform::find($id);   
        // Code select data for Edit dropdown list assignd_flat     
      
        $expenselists = DB::table('expenselists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $paymentlists = DB::table('paymentlists')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
        $concernpersons = DB::table('concernpersons')->Where('is_active', 'ACTIVE')->get(); // For dropdown flat list from 
       
        return view('operation.invoicepage', compact('mraforms','expenselists','paymentlists','concernpersons'));
    }


    
}
