<?php

namespace App\Http\Controllers;

use App\Models\Mraform;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    function generatePDF($id){   

       
        $mraforms = Mraform::find($id);  
        
        
       

        $data = [
            'title' => 'hello',
            'date' => '',
        ];
        //$file_nm = $id.time().'.pdf';
        $file_nm = $mraforms->invoice.'.pdf';
        //return view('rentcollection.edit', compact('rentcollection'));
        
        $pdf = PDF::loadView('operation.invoicepage',['mraforms'=>$mraforms] );
    
        return $pdf->download( $file_nm);
        
       
    
    }

}
