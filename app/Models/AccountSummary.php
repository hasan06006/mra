<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSummary extends Model
{
    use HasFactory;

    // Define the table name (optional, as Laravel uses plural form by default)
    protected $table = 'account_summaries';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'concernpersons_id', // Foreign key to customers table
        'total_deposit', // Total amount deposited
        'total_withdrawal', // Total amount withdrawn
        'current_balance', // Current balance in the account
    ];

    // Define any relationships (e.g., each account summary belongs to a customer)
    public function concernperson()
    {
        return $this->belongsTo(Concernperson::class, 'concernpersons_id');  // Adjust 'concernperson_id' if needed
    }

}
