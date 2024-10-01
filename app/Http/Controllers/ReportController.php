<?php

namespace App\Http\Controllers;
use App\Models\Mraform;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class ReportController extends Controller
{
   

    function indexadvance(){        
        
        return view('report.advanceparameter');
    
    }


    function showadvance(Request $request){      
            
     
        if($request->input('from') !=NULL AND $request->input('to') != NULL ){

            $from  =  date('Y-m-d 00:00:00' , strtotime($request->input('from')));       
            $to    =  date('Y-m-d 23:59:59' , strtotime($request->input('to'))); 

        

        }else{

            $from  = "";
            $to = "";
        }
         

        
        $invoice    =  trim($request->input('invoice'));  
         
       
       
        if (empty($invoice) &&  !empty($from) && !empty($to)){  

            //$mraforms = Mraform::whereBetween('created_at', [$from, $to])->paginate(1);
            $mraforms = Mraform::whereBetween('created_at', [$from, $to])->paginate(50)->appends(request()->query());
           
         }
         
         if (!empty($invoice) &&  empty($from) && empty($to)){        
          
            
            $mraforms = Mraform::where('invoice',$invoice)->paginate(50);   
                           
         }

         if (!empty($invoice) && !empty($from) && !empty($to)){
            
            
            $mraforms = Mraform::Wherebetween('created_at', [$from, $to])
                                ->where('invoice',$invoice)
                                ->get();  
         }

        
        
         if (empty($invoice) && empty($from) && empty($to)){
          
            return view('report.advanceparameter');

         }else{

            return view('report.advancereport', compact('mraforms','from','to','invoice'));
         }
      
           
       
    }



}
