<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Company;
use App\Models\Product;
use App\Models\ProductStockDetails;

class PurchaseController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $products = Product::all();
        return view('purchase.index', compact('company','products'));
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'txtName' => 'required|string|max:255',
            'txtPurchasePrice' => 'required|numeric|min:0',
            'txtTotalPrice' => 'required|numeric|min:0',
            'txtStock' => 'required|integer|min:0',
        ]);

        $product = new Product();
        $product->name = $request->input('txtName');
        $product->purchase_price = $request->input('txtPurchasePrice');
        $product->total_price = $request->input('txtTotalPrice');
        $product->stock = $request->input('txtStock');
        $product->remark = $request->input('remark');
        $product->save();

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function editProduct(Request $request, $id)
    {
        $request->validate([
            'txtName' => 'required|string|max:255',
            'txtPurchasePrice' => 'required|numeric|min:0',
            'txtTotalPrice' => 'required|numeric|min:0',
            'txtStock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('txtName');
        $product->purchase_price = $request->input('txtPurchasePrice');
        $product->total_price = $request->input('txtTotalPrice');
        $product->stock = $request->input('txtStock');
        $product->remark = $request->input('remark');
        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function purchaseStockInView()
    {
        $company = Company::first();
        $products = Product::orderBy('stock', 'asc')->get();
        $date = Carbon::now()->toDateString();
        $stockInDetails = ProductStockDetails::with('product')->where('stockIn', '>', '0')->where('date', $date)->get();
        return view('purchase.purchase_stock_in', compact('company','products','stockInDetails'));
    }

    public function productStockIn(Request $request, $id)
    {
        $request->validate([
            'txtStock' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $product->stock += $request->input('txtStock');

        $stockDetails = new ProductStockDetails();
        $stockDetails->date = Carbon::now()->toDateString();
        $stockDetails->product_id = $product->id;
        $stockDetails->stockIn = $request->input('txtStock');
        $stockDetails->stockOut = '0';
        $stockDetails->remark = 'Stock In Added';
        $stockDetails->user_id = Auth::guard('admin')->user()->id;

        $stockDetails->save();
        $product->save();

        return redirect()->back()->with('success', 'Product stock updated successfully.');
    }

    public function purchaseStockOutView()
    {
        $company = Company::first();
        $products = Product::orderBy('stock', 'asc')->get();
        $date = Carbon::now()->toDateString();
        $stockOutDetails = ProductStockDetails::with('product')->where('stockOut', '>', '0')->where('date', $date)->get();
        return view('purchase.purchase_stock_out', compact('company','products','stockOutDetails'));
    }

    public function productStockOut(Request $request, $id)
    {
        $request->validate([
            'txtStock' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $product->stock -= $request->input('txtStock');

        if($product->stock < 0){
            return redirect()->back()->with('error', 'Insufficient stock to perform stock out.');
        }

        $stockDetails = new ProductStockDetails();
        $stockDetails->date = Carbon::now()->toDateString();
        $stockDetails->product_id = $product->id;
        $stockDetails->stockIn = '0';
        $stockDetails->stockOut = $request->input('txtStock'); 
        $stockDetails->remark = 'Stock Out Added';
        $stockDetails->user_id = Auth::guard('admin')->user()->id;

        $stockDetails->save();
        $product->save();

        return redirect()->back()->with('success', 'Product stock updated successfully.');
    }
}
