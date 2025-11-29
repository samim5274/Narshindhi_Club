<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Company;
use App\Models\Income;
use App\Models\IncomeCategory;
use App\Models\IncomeSubCategory;

class IncomeController extends Controller
{
    public function extraIncomeView()
    {
        $company = Company::first();
        $categories = IncomeCategory::all();
        $incomes = Income::with('category','subcategory','user')->orderBy('id', 'DESC')->get();
        return view('income.extra-income', compact('company', 'incomes', 'categories'));
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = IncomeSubCategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'amount' => 'required|numeric|min:1',
            'description' => 'nullable|string|max:1000',
        ]);

        $data = new Income();
        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->user_id = Auth::guard('admin')->user()->id;
        $data->subcategory_id = $request->subcategory_id;
        $data->amount = $request->amount;
        $data->income_date = Carbon::now()->format('Y-m-d');
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with('success', 'Income added successfully!');
    }

    public function printInInv($id){
        $company = Company::first();
        $incomes = Income::where('id', $id)->first();
        if(empty($incomes)){
            return redirect()->back()->with('error', 'Incomes invoice not found. Please try another. Thank You!');
        }
        return view('income.print.print-incomes-invoice', compact('company', 'incomes'));
    }

    public function setting()
    {
        $company = Company::first();
        $categories = IncomeCategory::all();
        $subcategories = IncomeSubCategory::all();
        return view('income.income-setting', compact('company', 'categories', 'subcategories'));
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:income_categories,name',
        ]);

        $category = new IncomeCategory();
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Income category created successfully!');
    }

    public function createSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'txtName' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $subcategory = new IncomeSubCategory();
        $subcategory->name = $request->txtName;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;
        $subcategory->save();

        return redirect()->back()->with('success', 'Income sub-category created successfully!');
    }

}
