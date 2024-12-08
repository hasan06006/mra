<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Concernperson;
use App\Models\Transaction;
use App\Models\AccountSummary;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class TransactionController extends Controller
{
   
    public function index()
    {
        // Eager load the 'concernperson' relationship
        $transactions = Transaction::with('concernperson')  // Correct relationship name (singular)
                                   ->orderBy('transaction_date', 'asc')  // Order by transaction date
                                   ->paginate(50);
    
        // Calculate the running balance for each customer
        $balance = 0;  // Start with a zero balance
    
        foreach ($transactions as $transaction) {
            // Determine credit and debit based on the transaction type
            if ($transaction->type == 'Credit') {
                $transaction->credit = $transaction->amount;
                $transaction->debit = 0;
            } else {
                $transaction->credit = 0;
                $transaction->debit = $transaction->amount;
            }
    
            // Calculate the running balance
            $balance += $transaction->credit - $transaction->debit;
            $transaction->balance = $balance;  // Store the running balance
        }
    
        return view('finance.transactions-index', compact('transactions'));
    }


    public function create()
    {
         // Fetch data for dropdowns
        
         $concernpersons = Concernperson::where('is_active', 'ACTIVE')->get();      
        
 
         // Pass data to the view
         return view('finance.transactions-create', compact('concernpersons'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'concernpersons_id' => 'required|exists:concernpersons,id',
            'type' => 'required|in:Credit,Debit',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'description' => 'required|string|max:255',
        ], [
            'concernpersons_id.required' => 'Please select a customer.',
            'concernpersons_id.exists' => 'The selected customer does not exist.',
            'type.required' => 'Transaction type is required.',
            'type.in' => 'Transaction type must be either Credit or Debit.',
            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a valid number.',           
            'transaction_date.required' => 'Transaction date is required.',
            'transaction_date.date' => 'Please provide a valid date.',
            'description.required' => 'Description is required.',            
        ]);

        // Start the database transaction
        DB::beginTransaction();

        try {
            // Store data in the transactions table
            $transaction = Transaction::create([
                'concernpersons_id' => $request->concernpersons_id,
                'type' => $request->type,
                'amount' => $request->amount,
                'transaction_date' => $request->transaction_date,
                'description' => $request->description,
            ]);

            // Find or create an account summary for the concerned person
            $accountSummary = AccountSummary::firstOrCreate(
                ['concernpersons_id' => $request->concernpersons_id],
                ['total_credit' => 0.00, 'total_debit' => 0.00, 'current_balance' => 0.00]
            );

            // Update account summary based on transaction type
            if ($request->type === 'Credit') {
                $accountSummary->total_credit += $request->amount;
                $accountSummary->current_balance += $request->amount;
            } elseif ($request->type === 'Debit') {
                $accountSummary->total_debit += $request->amount;
                $accountSummary->current_balance -= $request->amount;
            }

            // Save the updated account summary
            $accountSummary->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('transactions-index')->with('success', 'Transaction added successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction if any part of the process fails
            DB::rollBack();

            // Return an error message
            return back()->with('error', 'Transaction failed! Please try again.');
        }
    }


    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $concernpersons = ConcernPerson::all();  // Fetch all customers
        return view('finance.transactions-edit', compact('transaction', 'concernpersons'));
    }

    public function update(Request $request, $id)
    {
        // Start the database transaction
        DB::beginTransaction();
    
        try {
            // Fetch the existing transaction
            $transaction = Transaction::findOrFail($id);
    
            // Find the associated account summary
            $accountSummary = AccountSummary::where('concernpersons_id', $transaction->concernpersons_id)->firstOrFail();
    
            // Reverse the effects of the old transaction on the account summary
            if ($transaction->type === 'Credit') {
                $accountSummary->total_credit -= $transaction->amount;
                $accountSummary->current_balance -= $transaction->amount;
            } elseif ($transaction->type === 'Debit') {
                $accountSummary->total_debit -= $transaction->amount;
                $accountSummary->current_balance += $transaction->amount;
            }
    
            // Save the reverted account summary
            $accountSummary->save();
    
            // Update the transaction with new values
            $transaction->update([
                'concernpersons_id' => $request->concernpersons_id,
                'type' => $request->type,
                'amount' => $request->amount,
                'transaction_date' => $request->transaction_date,
                'description' => $request->description,
            ]);
    
            // Find or create an account summary for the updated concerned person
            $newAccountSummary = AccountSummary::firstOrCreate(
                ['concernpersons_id' => $request->concernpersons_id],
                ['total_credit' => 0.00, 'total_debit' => 0.00, 'current_balance' => 0.00]
            );
    
            // Update the account summary based on the new transaction type
            if ($request->type === 'Credit') {
                $newAccountSummary->total_credit += $request->amount;
                $newAccountSummary->current_balance += $request->amount;
            } elseif ($request->type === 'Debit') {
                $newAccountSummary->total_debit += $request->amount;
                $newAccountSummary->current_balance -= $request->amount;
            }
    
            // Save the updated account summary
            $newAccountSummary->save();
    
            // Commit the transaction
            DB::commit();
    
            return redirect()->route('transactions-index')->with('success', 'Transaction updated successfully!');
    
        } catch (\Exception $e) {
            // Rollback the transaction if any part of the process fails
            DB::rollBack();
    
            // Return an error message
            return back()->with('error', 'Transaction update failed! Please try again.');
        }
    }


}
