<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PDF;

use App\Models\Company;
use App\Models\BankTransectionDetail;
use App\Models\Expense;
use App\Models\Order;
use App\Models\DueCollection;
use App\Models\Income;

class AccountController extends Controller
{
    public function totalTransection()
    {
        $company = Company::first();
        $today = now()->toDateString();

        // Daily Transactions expenses, income, due collection, orders
        $totalExpenses = Expense::whereDate('expense_date', $today)->sum('amount');
        $totalIncome = Income::whereDate('income_date', $today)->sum('amount');
        $totalDueCollection = DueCollection::whereDate('payment_date', $today)->sum('pay');
        $totalOrders = Order::whereDate('date', $today)->sum('pay');

        // Bank Transactions
        $bankDeposit = BankTransectionDetail::whereDate('date', $today)->where('status', 'Deposit')->sum('amount');
        $bankWithdraw = BankTransectionDetail::whereDate('date', $today)->where('status', 'Withdraw')->sum('amount');

        return view('account.total-transection', 
        compact(
            'company', 
            'totalExpenses', 
            'totalIncome', 
            'totalDueCollection', 
            'totalOrders',
            'bankDeposit',
            'bankWithdraw',
        ));
    }

    public function filterTotalTransection(Request $request)
    {
        $company = Company::first();
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        // Filtered Transactions expenses, income, due collection, orders
        $totalExpenses = Expense::whereBetween('expense_date', [$fromDate, $toDate])->sum('amount');
        $totalIncome = Income::whereBetween('income_date', [$fromDate, $toDate])->sum('amount');
        $totalDueCollection = DueCollection::whereBetween('payment_date', [$fromDate, $toDate])->sum('pay');
        $totalOrders = Order::whereBetween('date', [$fromDate, $toDate])->sum('pay');

        // Bank Transactions
        $bankDeposit = BankTransectionDetail::whereBetween('date', [$fromDate, $toDate])->where('status', 'Deposit')->sum('amount');
        $bankWithdraw = BankTransectionDetail::whereBetween('date', [$fromDate, $toDate])->where('status', 'Withdraw')->sum('amount');

        if($request->has('btnPrint')){
            return "Printing Functionality Coming Soon";
        }

        if($request->has('btnDownload')){
            $pdf = PDF::loadView('account.download-daily-transection-report', [
                'company' => $company,
                'totalExpenses' => $totalExpenses,
                'totalIncome' => $totalIncome,
                'totalDueCollection' => $totalDueCollection,
                'totalOrders' => $totalOrders,
                'bankDeposit' => $bankDeposit,
                'bankWithdraw' => $bankWithdraw,
                'fromDate' => $fromDate,
                'toDate' => $toDate,
            ]);

            return $pdf->download('total-transaction-report.pdf');
        }

        return view('account.total-transection', 
        compact(
            'company', 
            'totalExpenses', 
            'totalIncome', 
            'totalDueCollection', 
            'totalOrders',
            'bankDeposit',
            'bankWithdraw',
            'fromDate',
            'toDate',
        ));
    }
}
