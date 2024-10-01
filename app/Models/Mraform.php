<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mraform extends Model
{
    use HasFactory;

    protected $table = 'mraforms';

    protected $fillable = [
        'invoice',
        'expense_type',      
        'payment_type',       
        'concern_person',
        'amount', 
        'grand_total',        
                  
    ];

    

    public function expensetype(){
        return $this->belongsTo(Expenselist::class, 'expense_type','id');
      
    }

    public function paymenttype(){
        return $this->belongsTo(Paymentlist::class, 'payment_type','id');
      
    }
    
    public function concernperson(){
        return $this->belongsTo(Concernperson::class, 'concern_person','id');
      
    }


    public function receivedby(){
        return $this->belongsTo(Peoplelist::class, 'received_by','id');
      
    }

    public function preparedby(){
        return $this->belongsTo(Peoplelist::class, 'prepared_by','id');
      
    }
    public function varifiedby(){
        return $this->belongsTo(Peoplelist::class, 'varified_by','id');
      
    }

    public function approvedby(){
        return $this->belongsTo(Peoplelist::class, 'approved_by','id');
      
    }

    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }
}
