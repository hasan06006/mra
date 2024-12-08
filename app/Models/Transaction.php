<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Define the table name (optional, as Laravel uses plural form by default)
    protected $table = 'transactions';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'concernpersons_id', // Foreign key to customers table
        'type', // Type of transaction (Credit/Debit)
        'amount', // Transaction amount
        'transaction_date', // Date of transaction
        'description', // Optional description
        'status', // Status of the transaction
    ];

    // Define any relationships (e.g., each transaction belongs to a Concern persion) 

    public function concernperson()
    {
        return $this->belongsTo(Concernperson::class, 'concernpersons_id');  // Adjust 'concernperson_id' if needed
    }

}
