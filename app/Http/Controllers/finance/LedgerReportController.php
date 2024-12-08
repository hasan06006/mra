<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Concernperson;
use App\Models\Transaction;
use App\Models\AccountSummary;


class LedgerReportController extends Controller
{
    

    function indexLedger(){    

        $concernPersons = ConcernPerson::all();
        return view('report.ledgerparameter',compact('concernPersons'));
    
    }
   
    public function detailsLedger(Request $request)
    {
        // Fetch concern persons for filter dropdown
        $concernPersons = ConcernPerson::all();
        
        // Initialize the query for transactions
        $query = Transaction::with('concernperson');  // Eager load the concernperson relationship
        
        // Filter by customer
        if ($request->filled('concernpersons_id')) {
            $query->where('concernpersons_id', $request->concernpersons_id);
        }
    
        // Filter by transaction type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
    
        // Filter by date range
        if ($request->filled('start_date')) {
            $query->where('transaction_date', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->where('transaction_date', '<=', $request->end_date);
        }
    
        // Fetch filtered transactions
        $transactions = $query->orderBy('transaction_date', 'asc')->paginate(10);
    
        // Initialize balance and calculate debit, credit, and balance
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
    
        // Return the view with transactions, concern persons, and request parameters
        return view('report.ledgerreport', compact('transactions', 'concernPersons', 'request'));
    }
    


    function indexBalanceSummery(){    

        $concernPersons = ConcernPerson::all();
        return view('report.balance-summery-parameter',compact('concernPersons'));
    
    }
   
    public function balanceSummery(Request $request)
    {
        $concernPersons = ConcernPerson::all();  // Or however you fetch concern persons
        $query = AccountSummary::query();
    
        if ($request->has('concernpersons_id') && $request->concernpersons_id != '') {
            $query->where('concernpersons_id', $request->concernpersons_id);
        }
    
        $accountSummaries = $query->get();
    
        // Calculate total sums
        $totalCredit = $accountSummaries->sum('total_credit');
        $totalDebit = $accountSummaries->sum('total_debit');
        $totalBalance = $accountSummaries->sum('current_balance');
    
        return view('report.balance-summery-action', compact('accountSummaries', 'concernPersons', 'totalCredit', 'totalDebit', 'totalBalance'));
    }

    

}
