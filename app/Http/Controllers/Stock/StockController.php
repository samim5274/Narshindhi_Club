<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Models\Company;
use App\Models\Food;
use App\Models\Stock;

class StockController extends Controller
{
    public function index(){
        $foods = Food::where('stock', '<=', 50)->paginate(15);
        $company = Company::first();
        return view('stock.food-stock', compact('foods','company'));
    }

    public function liveSearch(Request $request){
        $output = "";

        $food = Food::where('name', 'like','%'.$request->search.'%')
                    ->orWhere('id', 'like','%'.$request->search.'%')
                    ->orWhere('sku', 'like','%'.$request->search.'%')
                    ->orWhereHas('category', function($q) use($request) {
                        $q->where('name', 'like', '%'.$request->search.'%');
                    })->get();

        foreach($food as $key => $val) {

            $imagePath = asset('img/food/' . $val->image);
            $link = url('/specific-food-view/'.$val->id);

            $ingredients = strlen($val->ingredients) > 40 
                            ? substr($val->ingredients, 0, 40) . '...' 
                            : $val->ingredients;

            // Generate unique modal ID                
            $modalId = "stock".$val->id;

            $output .= '
                <tr>
                    <td>'.($key+1).'</td>

                    <!-- Image -->
                    <td>
                        <img src="'.$imagePath.'" width="60" height="45"
                            style="object-fit:cover; border-radius:5px;">
                    </td>

                    <!-- Name -->
                    <td class="fw-bold">
                        <a href="'.$link.'" class="text-dark text-decoration-none">
                            '.$val->name.'
                        </a>
                    </td>

                    <!-- Price -->
                    <td class="text-success fw-bold">
                        ৳'.$val->price.'
                    </td>

                    <!-- Stock -->
                    <td class="fw-bold">
                        '.$val->stock.'
                    </td>

                    <!-- Ingredients -->
                    <td style="max-width:220px;">
                        <span class="text-muted small d-inline-block text-truncate"
                            style="max-width:220px;">
                            '.$ingredients.'
                        </span>
                    </td>

                    <!-- Action -->
                    <td>
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#'.$modalId.'">
                            <i class="fa-solid fa-pen-to-square"></i> View
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="'.$modalId.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$val->id.'" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="'.url('/insert/stock').'" method="POST">
                                '.csrf_field().'
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel'.$val->id.'">Stock - <small>'.$val->sku.'</small></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="">                                
                                            <h1 class="display-4 text-primary">'.$val->name.'</h1>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="num2'.$val->id.'" class="col-sm-3 col-form-label">Pay:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="txtStock" placeholder="Stock" required min="1">
                                            <input type="hidden" value="'.$val->id.'" name="txtFoodId" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm(\'Are you sure you want '.$val->name.' insert stock?\')">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            ';
        }

        if ($output == '') {
            $output = '<tr>
                        <td colspan="7" class="text-center py-3 text-muted">
                            No food found.
                        </td>
                    </tr>';
        }

        return response($output);
    }

    public function insert(Request $request){
        $request->validate([
            'txtFoodId' => 'required|integer|exists:food,id',
            'txtStock' => 'required|integer|min:1',
        ]);

        $food = Food::where('id', $request->txtFoodId)->first();
        if(empty($food)){
            return redirect()->back()->with('error', 'Food not found. Please try another one. Thanks!');
        }

        $food->stock += $request->txtStock;
        $food->remark = "Stock inserted date of " . Carbon::now()->format('Y-m-d');

        $data = new Stock();
        $data->date = Carbon::now()->format('Y-m-d');
        $data->foodId = $request->txtFoodId;
        $data->stockIn = $request->txtStock;
        $data->remark = "Stock In";
        $data->status = 3; // 1 sale, 2 return, 3 stock in and 4 stock out
        $data->save();
        $food->update();
        return redirect()->back()->with('success', 'Product stock inserted successfully.');
    }
}
