<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Company;
use App\Models\DueCollection;
use App\Models\Membership;

class OrderController extends Controller
{
    public function confirmOrder(Request $request){
                
        $request->validate([
            'txtInvoice' => 'required',
            'txtSubTotal' => 'required',
        ]);

        $reg = $request->input('txtInvoice', '');
        
        $findReg = Order::where('reg', $reg)->first();
        if($findReg) {
            return redirect()->back()->with('error', 'This order already taken. Please add product to cart and try again. Thank You!');
        } 

        if($request->input('txtSubTotal', '') <= 0) {
            return redirect()->back()->with('error', 'Your cart is empty. Try again.');
        }        

        $received = $request->input('txtPay', 0);
        $total = $request->input('txtSubTotal', 0);
        $discount = $request->input('txtDiscount', 0);
        $vat = $request->input('txtVAT', 0);
        $payMethod = $request->input('paymentMethods', 0);

        $newVat = $total * $vat / 100;
        $payable = ($total - $discount) + $newVat;
        $dueAmount = $payable - $received;
                    
        if($received < 0) {
            return redirect()->back()->with('warning', 'You must be payment some amount. Unless you can not sale this product. Thanks');
        }

        $order = new Order();
        $order->date = Carbon::now()->format('Y-m-d');
        $order->user_id = Auth::guard('admin')->user()->id;
        $order->reg = $reg;
        $order->total = $total;
        $order->discount = $discount;
        $order->vat = $newVat;
        $order->payable = $payable;
        $order->paymentMethod = $payMethod;

        if($received >= $payable) {
            $order->pay = $payable;
            $order->due = 0;
        } else {
            $order->pay = $received;
            $order->due = $dueAmount;            
        }
        
        // Auto status set
        if ($dueAmount > 0) { // 1 Fully paid and 0 due
            $order->status = 0; // Due

            $request->validate([
                'txtCustomerName'   => 'required',
                'txtCustomerPhone'  => 'required',
            ]);

            $customerPhone = $request->input('txtCustomerPhone', '');

            $membership = Membership::where('phone', $customerPhone)->first(); // check membershiop when payment due
            if(empty($membership)){
                return redirect()->back()->with('warning','Membership not found.');
            }

            $order->customerName    = $membership->name;
            $order->customerPhone   = $membership->phone;

        } else {
            $order->status = 1; // Fully paid
        } 
        
        $order->save();
        
        return redirect()->back()->with('success', 'Order sale successfully.')->with('reg', $reg);
    }

    public function printInvoice($reg){
        $cart = Cart::where('reg', $reg)->with('food')->get();
        $order = Order::where('reg', $reg)->with('user')->first();
        $company = Company::first();
        $dueCollection = DueCollection::where('reg', $reg)->first();
        return view('food.print.invoice-print', compact('cart', 'company','order','dueCollection'));
    }

    public function orderDetails(){
        $company = Company::first();
        $order = Order::with('user')->orderByDesc('id')->paginate(15);

        $summary = Order::selectRaw('
                    SUM(total) as total,
                    SUM(discount) as discount,
                    SUM(payable) as payable,
                    SUM(pay) as pay,
                    SUM(due) as due,
                    SUM(vat) as vat
                ')->first();

        return view('order.order-list', [
            'company' => $company,
            'order' => $order,
            'total' => $summary->total,
            'discount' => $summary->discount,
            'payable' => $summary->payable,
            'pay' => $summary->pay,
            'due' => $summary->due,
            'vat' => $summary->vat,
        ]);
    }

    // public function dueCollection(Request $request, $reg){
    //     $order = Order::where('reg', $reg)->first();
        
    //     if (!$order) {
    //         return back()->with('error', 'Order not found!');
    //     }

    //     $validated = $request->validate([
    //         'txtDiscount' => 'nullable|numeric|min:0',
    //         'txtPay'      => 'nullable|numeric|min:0'
    //     ]);

    //     $dueCollections = DueCollection::where('reg', $reg)->first();
    //     if($dueCollections){
    //         return redirect()->back()->with('warning', 'Due payment has already been processed for Invoice: ' . $reg);
    //     }

    //     $pay = $request->input('txtPay', '');
    //     $discount = $request->input('txtDiscount', '');

    //     $oldDue = $order->due;
    //     $oldPayable = $order->payable;

    //     if($discount > $oldDue) {
    //         return redirect()->back()->with('warning', 'Discount more then due. It is not possible.');
    //     }

    //     $total = $order->total;
    //     $payable = $total - ($discount + $order->discount);

    //     $alreadyPaid = $order->pay ?? 0;
    //     $remainingDue = max($payable - $alreadyPaid, 0);

    //     if ($pay > $remainingDue) {
    //         $pay = $remainingDue;
    //     }

    //     $newDue = max($remainingDue - $pay, 0);
    //     $previousDue =  $payable + $discount;

    //     $data           = new DueCollection();
    //     $data->reg      = $order->reg;
    //     $data->total    = $previousDue;
    //     $data->discount = $discount;
    //     $data->pay      = $pay;
    //     $data->due      = $newDue;
    //     $data->user_id  = Auth::guard('admin')->user()->id;
    //     $data->save();

    //     $order->status = $newDue <= 0 ? 1 : 0; // 1 Fully paid and 0 due
    //     $order->update();

    //     return redirect()->back()->with('success', 'Due collection successfully done. ORD-'.$reg);
    // }

    public function dueCollection(Request $request, $reg){
        $order = Order::where('reg', $reg)->first();
        
        if (!$order) {
            return back()->with('error', 'Order not found!');
        }

        $validated = $request->validate([
            'txtDiscount' => 'nullable|numeric|min:0',
            'txtPay'      => 'nullable|numeric|min:0'
        ]);

        $dueCollections = DueCollection::where('reg', $reg)->first();
        if($dueCollections){
            return redirect()->back()->with('warning', 'Due payment has already been processed for Invoice: ' . $reg);
        }

        $pay = $request->input('txtPay', '');
        $discount = $request->input('txtDiscount', '');

        $oldDue = $order->due;
        $oldPayable = $order->payable;

        if($discount > $oldDue) {
            return redirect()->back()->with('warning', 'Discount more then due. It is not possible.');
        }

        $payable = $oldDue - $discount;

        if ($pay >= $payable) {
            $pay = $payable;
        } else {
            return redirect()->back()->with('warning', 'Due collection failed. Must be paid full due. Thank You!');
        }

        $remainingDue = $oldDue - ($pay + $discount);

        $membership = Membership::where('phone', $order->customerPhone)->first();

        $data           = new DueCollection();
        $data->reg      = $order->reg;
        $data->member_id= $membership->id;
        $data->total    = $order->total;
        $data->discount = $discount;
        $data->pay      = $pay;
        $data->due      = $remainingDue; // find new due
        $data->user_id  = Auth::guard('admin')->user()->id;
        $data->save();

        $order->status = $remainingDue <= 0 ? 1 : 0; // 1 Fully paid and 0 due
        $order->update();

        return redirect()->back()->with('success', 'Due collection successfully done. ORD-'.$reg);
    }

    public function dueDetails(){
        $company = Company::first();
        $data = Order::where('status', 0)->orderByDesc('id')->paginate(15);
        return view('order.due-details', compact('data','company'));
    }

    public function printOrder(){
        $date = Carbon::now()->format('Ymd');
        $company = Company::first();
        $data = Order::where('date', $date)->with('user')->get();
        return view('order.print.print-order-list', compact('data','company'));
    }

    public function printDuelist(){
        $date = Carbon::now()->format('Ymd');
        $company = Company::first();
        $data = Order::where('date', $date)->where('status', 0)->with('user')->get();
        return view('order.print.print-order-list', compact('data','company'));
    }

    public function totalDueList(){
        $company = Company::first();
        $orders = Order::where('status', 0)
                ->orderBy('customerPhone')
                ->orderBy('date', 'desc')
                ->get()
                ->groupBy('customerPhone');
        return view('order.report.total-due-list', compact('orders','company'));
    }

    public function totalMemberDueList(){
        $company = Company::first();
        $customers = Membership::where('is_active', 1)->get();
        $orders = Order::where('status', 0)
                ->orderBy('date', 'desc')
                ->get();
        return view('order.report.total-member-due-list', compact('customers','company','orders'));
    }

    public function phoneNumberWiseDueData(Request $request){
        $start  = $request->input('start_date', ''); 
        $end    = $request->input('end_date', ''); 
        $phone  = $request->input('customer_id', ''); 
        
        $company = Company::first();
        $customers = Membership::where('is_active', 1)->get();

        $orders = Order::where('status', 0)->whereBetween('date', [$start, $end])->where('customerPhone', $phone)->get();
        $total = $orders->sum('total');
        $discount = $orders->sum('discount');
        $vat = $orders->sum('vat');
        $payable = $orders->sum('payable');
        $pay = $orders->sum('pay');
        $due = $orders->sum('due');

        if($request->input('print')){
            return view('order.report.print.print-total-member-due-list', compact('orders','company','customers', 'start', 'end', 'total', 'discount','vat','payable','pay','due'));
        }
        
        return view('order.report.total-member-due-list', compact('orders','company','customers'));
    }

    public function memberDueDetails($phone){
        $company = Company::first();
        $dueCollections = DueCollection::where('member_id', function($query) use ($phone) {
                            $query->select('id')
                                ->from('memberships')
                                ->where('phone', $phone);
                        })->orderByDesc('id')->get(); 
        $dueDiscount = $dueCollections->sum('discount');
        $duePay = $dueCollections->sum('pay');
                        
        $data = Order::where('customerPhone', $phone)->orderByDesc('id')->get();
        $totalSum = $data->sum('total');
        $discountSum = $data->sum('discount');
        $payableSum = $data->sum('payable');
        $paidSum = $data->sum('pay');
        $dueSum = $data->sum('due');

        $balance = $payableSum - ($paidSum + $duePay + $dueDiscount );

        return view('order.member-due-details', 
        compact(
            'data',
            'company',
            'phone',
            'totalSum',
            'discountSum',
            'payableSum', 
            'paidSum', 
            'dueSum', 
            'dueCollections',
            'dueDiscount',
            'duePay',
            'balance'
        ));
    }
}
