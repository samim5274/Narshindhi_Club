<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Company;
use App\Models\BankDetail;
use App\Models\BankTransectionDetail;
use App\Models\Admin;

class BankController extends Controller
{
    public function setting()
    {
        $company = Company::first();
        $bankDetails = BankDetail::all();
        return view('bank.bank-setting', compact('company','bankDetails'));
    }

    public function createBank(Request $request){
        // Validation
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_number' => [
                'required',
                'string',
                'max:255',
                // Unique in bank_details table; exclude current record ID if updating
                \Illuminate\Validation\Rule::unique('bank_details', 'account_number')
                    ->ignore($request->id ?? null)
            ],
            'routing_number' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
        ]);

        // Insert Bank Details
        $data = new BankDetail();
        $data->bank_name         = $request->bank_name;
        $data->branch_name       = $request->branch_name;
        $data->account_name      = $request->account_name;
        $data->account_number    = $request->account_number;
        $data->routing_number    = $request->routing_number;
        $data->remarks           = $request->remarks;
        $data->save();
        return back()->with('success', 'Bank details added successfully.');
    }

    public function bankDepositView(){
        $company = Company::first();
        $bankDetails = BankDetail::all();
        $dipositDetails = BankTransectionDetail::where('status','Deposit')->where('date', Carbon::now()->format('Y-m-d'))->get();
        return view('bank.bank-deposit', compact('company','bankDetails','dipositDetails'));
    }

    public function bankDepositAmount(Request $request){
        // Validation
        $request->validate([
            'bank_name' => 'required|exists:bank_details,id',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        $data = new BankTransectionDetail();
        $data->bank_id   = $request->bank_name;
        $data->user_id   = Auth::guard('admin')->user()->id;
        $data->amount    = $request->amount;
        $data->date      = Carbon::now()->format('Y-m-d');
        $data->status    = 'Deposit';
        $data->remarks   = $request->remarks ?? 'N/A';
        $data->save();

        return back()->with('success', 'Amount deposited successfully.');
    }

    public function bankWithdrawView(){
        $company = Company::first();
        $bankDetails = BankDetail::all();
        $withdrawDetails = BankTransectionDetail::where('status','Withdraw')->where('date', Carbon::now()->format('Y-m-d'))->get();
        return view('bank.bank-withdraw', compact('company','bankDetails','withdrawDetails'));
    }

    public function bankWithdrawAmount(Request $request){
        // Validation
        $request->validate([
            'bank_name' => 'required|exists:bank_details,id',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        // Get From Bank Current Balance
        $fromBankBalance = BankTransectionDetail::where('bank_id', $request->bank_name)
                            ->selectRaw("
                                SUM(CASE WHEN status='Deposit' THEN amount ELSE 0 END) -
                                SUM(CASE WHEN status='Withdraw' THEN amount ELSE 0 END)
                                AS balance
                            ")
                            ->value('balance');
                            
        $fromBankBalance = $fromBankBalance ?? 0;

        // Check Enough Balance
        if ($request->amount > $fromBankBalance) {
            return back()->with('error', 'Not enough balance! Available balance: ' . number_format($fromBankBalance, 2));
        }

        $data = new BankTransectionDetail();
        $data->bank_id   = $request->bank_name;
        $data->user_id   = Auth::guard('admin')->user()->id;
        $data->amount    = $request->amount;
        $data->date      = Carbon::now()->format('Y-m-d');
        $data->status    = 'Withdraw';
        $data->remarks   = $request->remarks ?? 'N/A';
        $data->save();

        return back()->with('success', 'Amount withdrawn successfully.');
    }

    public function bankToTransectionView(){
        $company = Company::first();
        $bankDetails = BankDetail::all();
        $dipositDetails = BankTransectionDetail::where('status','Deposit')->where('date', Carbon::now()->format('Y-m-d'))->get();
        $withdrawDetails = BankTransectionDetail::where('status','Withdraw')->where('date', Carbon::now()->format('Y-m-d'))->get();
        $balance = BankTransectionDetail::where('date', Carbon::now()->format('Y-m-d'))
                    ->where('status', 'Deposit')
                    ->sum('amount') - BankTransectionDetail::where('date', Carbon::now()->format('Y-m-d'))
                    ->where('status', 'Withdraw')
                    ->sum('amount');    
        return view('bank.bank-to-bank-transection', compact('company','bankDetails','withdrawDetails','dipositDetails','balance'));
    }

    public function bankToBankTransection(Request $request){
        // Validation
        $request->validate([
            'from_bank' => 'required|exists:bank_details,id',
            'to_bank' => 'required|exists:bank_details,id|different:from_bank',
            'amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        // Get From Bank Current Balance
        $fromBankBalance = BankTransectionDetail::where('bank_id', $request->from_bank)
                            ->selectRaw("
                                SUM(CASE WHEN status='Deposit' THEN amount ELSE 0 END) -
                                SUM(CASE WHEN status='Withdraw' THEN amount ELSE 0 END)
                                AS balance
                            ")
                            ->value('balance');

        $fromBankBalance = $fromBankBalance ?? 0;

        // Check Enough Balance
        if ($request->amount > $fromBankBalance) {
            return back()->with('error', 'Not enough balance! Available balance: ' . number_format($fromBankBalance, 2));
        }

        // Withdraw from From Bank
        $withdraw = new BankTransectionDetail();
        $withdraw->bank_id   = $request->from_bank;
        $withdraw->user_id   = Auth::guard('admin')->user()->id;
        $withdraw->amount    = $request->amount;
        $withdraw->date      = Carbon::now()->format('Y-m-d');
        $withdraw->status    = 'Withdraw';
        $withdraw->remarks   = 'Transfer to Bank ID: ' . $request->to_bank . '. ' . ($request->remarks ?? '');
        $withdraw->save();

        // Deposit to To Bank
        $deposit = new BankTransectionDetail();
        $deposit->bank_id   = $request->to_bank;
        $deposit->user_id   = Auth::guard('admin')->user()->id;
        $deposit->amount    = $request->amount;
        $deposit->date      = Carbon::now()->format('Y-m-d');
        $deposit->status    = 'Deposit';
        $deposit->remarks   = 'Transfer from Bank ID: ' . $request->from_bank . '. ' . ($request->remarks ?? '');
        $deposit->save();

        return back()->with('success', 'Bank to bank transection completed successfully.');
    }
}
