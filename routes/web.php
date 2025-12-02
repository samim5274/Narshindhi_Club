<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Food\FoodController;
use App\Http\Controllers\Food\CartController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\SaleReportController;
use App\Http\Controllers\Kitchen\KitchenController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Expenses\ExpensesController;
use App\Http\Controllers\Income\IncomeController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Account\AccountController;

Auth::routes();

Route::get('/clear-all', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');

    return response()->json(['message' => 'All Laravel caches cleared successfully']);
});

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/user-login', [AdminController::class, 'userLogin']);
Route::post('/new-user', [AdminController::class, 'createUser']);

Route::group(['middleware' => ['admin']], function (){

    Route::get('/users', [AdminController::class, 'users'])->name('all-user');
    Route::get('/live-search-employee', [AdminController::class, 'SearchEmp']);
    Route::get('/update-employee-status/{id}', [AdminController::class, 'updateStatus']);
    Route::get('/profile', [AdminController::class, 'profile'])->name('user-profile-view');
    Route::post('/edit-profile/{id}', [AdminController::class, 'editProfile']);
    Route::get('/membership', [AdminController::class, 'membership'])->name('make-membership');
    Route::get('/live-search-member', [AdminController::class, 'SearchMember']);
    Route::post('/store-membership', [AdminController::class, 'storeMembership'])->name('store-membership');

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    // ========================= Food Controller =========================
    Route::get('/foods', [FoodController::class, 'index'])->name('foods');
    Route::get('/live-search-food-menu', [FoodController::class, 'liveSearch']);
    Route::get('/specific-food-view/{id}', [FoodController::class, 'editFood']);
    Route::get('/create-food', [FoodController::class, 'create'])->name('create-foods');
    Route::post('/create-new-food', [FoodController::class, 'createFood']);
    Route::post('/update-food/{id}', [FoodController::class, 'update'])->name('food.update');

    Route::get('/add-to-cart/{id}', [CartController::class, 'addCart']);
    Route::post('/add-to-cart-2', [CartController::class, 'addCart2']);
    Route::get('/cart', [CartController::class, 'cartView'])->name('cart-view');
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity']);
    Route::get('/edit/cart/{reg}', [CartController::class, 'editInvoice'])->name('edit-invoice-products');
    Route::post('/edit/cart/update', [CartController::class, 'UpdateInvoice']);
    Route::post('/modify/order', [CartController::class, 'modifyOrder']);
    Route::get('/remove-to-cart/{foodId}/{invoice}', [CartController::class, 'removeToCart']);

    Route::post('/confirm-order', [OrderController::class, 'confirmOrder'])->name('confirm-order');
    Route::get('/order-invoice-print/{reg}', [OrderController::class, 'printInvoice']);
    Route::get('/print-total-daily-order', [OrderController::class, 'printOrder'])->name('print-total-daily-order');
    Route::get('/print-due-list', [OrderController::class, 'printDuelist'])->name('print-total-daily-due-list');
    Route::get('/order-details', [OrderController::class, 'orderDetails'])->name('order-details-list');
    Route::post('/due-collection/{reg}', [OrderController::class, 'dueCollection']);
    Route::get('/due-details', [OrderController::class, 'dueDetails'])->name('due-list-view');
    Route::get('/total-due-list', [OrderController::class, 'totalDueList'])->name('total-due-list');
    Route::get('/total-member-due-list', [OrderController::class, 'totalMemberDueList'])->name('total-member-due-list');
    Route::get('/phone-number-wise-due-data', [OrderController::class, 'phoneNumberWiseDueData'])->name('phone-number-wise-due-data');
    Route::get('/member-due-details/{phone}', [OrderController::class, 'memberDueDetails'])->name('member-due-details');
    Route::post('/due-collect-member', [OrderController::class, 'dueCollectMember'])->name('due-collect-member');

    Route::get('/total-sale-report', [SaleReportController::class, 'index'])->name('date-wise-total-sale');
    Route::get('/filter-total-sale', [SaleReportController::class, 'filterSaleReport'])->name('filter-total-sale');
    Route::get('/user-wise-total-sale', [SaleReportController::class, 'userTotalSale'])->name('user-wise-total-sale');
    Route::get('/user-wise-total-sale-filter', [SaleReportController::class, 'filterUserReport'])->name('filter-user-total-sale');
    Route::get('/payment-wise-total-sale', [SaleReportController::class, 'paymentSaleReport'])->name('payment-wise-total-sale');
    Route::get('/payment-total-sale-filter', [SaleReportController::class, 'paymentSaleFilter'])->name('payment-mathod-total-sale');

    Route::get('/kitchen', [KitchenController::class, 'index'])->name('kitchen-view');
    Route::get('/order-item/{reg}', [KitchenController::class, 'orderItem'])->name('view-order-item');
    Route::post('/update-kitchen-status/{reg}', [KitchenController::class, 'updateStatus'])->name('update-kitchen-status');

    Route::get('/stock', [StockController::class, 'index'])->name('food-stock-view');
    Route::get('/live-search-food-stock', [StockController::class, 'liveSearch']);
    Route::post('/insert/stock', [StockController::class, 'insert']);

    Route::get('/expenses', [ExpensesController::class, 'index'])->name('daily-expenses');
    Route::get('/get-subcategories/{categoryId}', [ExpensesController::class, 'getSubcategories']);
    Route::post('/create-expenses', [ExpensesController::class, 'create']);
    Route::get('/expenses-setting', [ExpensesController::class, 'setting'])->name('expenses-setting-view');
    Route::post('/create-expenses-category', [ExpensesController::class, 'createCategory']);
    Route::post('/create-sub-category-expenses', [ExpensesController::class, 'createSubCategory']);
    Route::get('/print-expenses-invoice/{id}', [ExpensesController::class, 'printExInv']);
    Route::get('/total-expenses-report', [ExpensesController::class, 'totalExpensesReport'])->name('total-expenses-report');
    Route::get('/filter-expenses-date', [ExpensesController::class, 'filterExpensesDate'])->name('filter-expenses-date');
    Route::get('/category-expenses-report', [ExpensesController::class, 'categoryExpenses'])->name('category-wise-expenses-report');
    Route::get('/filter-expenses-category', [ExpensesController::class, 'filterCategoryExpenses']);
    Route::get('/sub-category-expenses-report', [ExpensesController::class, 'subcategoryExpenses'])->name('sub-category-wise-expenses-report');
    Route::get('/filter-expenses-sub-category', [ExpensesController::class, 'filterSubCategoryExpenses']);

    Route::get('/extra-income', [IncomeController::class, 'extraIncomeView'])->name('extra-income');
    Route::get('/get-incomesubcategories/{categoryId}', [IncomeController::class, 'getSubcategories']);
    Route::post('/create-income', [IncomeController::class, 'create']);
    Route::get('/income-setting', [IncomeController::class, 'setting'])->name('income-setting-view');
    Route::post('/create-income-category', [IncomeController::class, 'createCategory']);
    Route::post('/create-sub-category-income', [IncomeController::class, 'createSubCategory']);
    Route::get('/print-income-invoice/{id}', [IncomeController::class, 'printInInv']);
    Route::get('/total-income-report', [IncomeController::class, 'totalIncomeReport'])->name('total-income-report');
    Route::get('/filter-income-date', [IncomeController::class, 'filterIncomeDate'])->name('filter-income-date');
    Route::get('/category-income-report', [IncomeController::class, 'categoryIncomeReport'])->name('category-wise-income-report');
    Route::get('/filter-incomes-category', [IncomeController::class, 'filterIncomeReport']);
    Route::get('/sub-category-income-report', [IncomeController::class, 'SubcategoryReport'])->name('sub-category-report-date');
    Route::get('/filter-incomes-sub-category', [IncomeController::class, 'filterIncomeSubCatReport']);

    Route::get('/bank-setting', [BankController::class, 'setting'])->name('bank-setting-view');
    Route::post('/create-bank', [BankController::class, 'createBank']);
    Route::get('/bank-diposit-view', [BankController::class, 'bankDepositView'])->name('bank-diposit-view');
    Route::post('/bank-diposit-amount', [BankController::class, 'bankDepositAmount']);
    Route::get('/bank-withdraw-view', [BankController::class, 'bankWithdrawView'])->name('bank-withdraw-view');
    Route::post('/bank-withdraw-amount', [BankController::class, 'bankWithdrawAmount']);
    Route::get('/bank-to-transection-view', [BankController::class, 'bankToTransectionView'])->name('bank-to-transection-view');
    Route::post('/bank-to-bank-transection', [BankController::class, 'bankToBankTransection']);
    Route::get('/total-transection-report', [BankController::class, 'totalTransectionReport'])->name('total-transection');
    Route::get('/filter-transection-date', [BankController::class, 'filterTransectionDate'])->name('filter-transection-date');
    Route::get('/total-diposit', [BankController::class, 'totalDiposit'])->name('total-diposit');
    Route::get('/filter-total-diposit-date', [BankController::class, 'filterDipositDate'])->name('filter-total-diposit-date');
    Route::get('/total-withdraw', [BankController::class, 'totalWithdraw'])->name('total-withdraw');
    Route::get('/filter-total-Withdraw-date', [BankController::class, 'filterWithdrawDate'])->name('filter-total-Withdraw-date');

    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase-view');
    Route::post('/create-new-product', [PurchaseController::class, 'createProduct'])->name('create-product');
    Route::post('/edit-product/{id}', [PurchaseController::class, 'editProduct'])->name('edit-product');
    Route::get('/purchase-stock-in-view', [PurchaseController::class, 'purchaseStockInView'])->name('purchase-stock-in-view');
    Route::post('/product-stock-in/{id}', [PurchaseController::class, 'productStockIn'])->name('product-stock-in');
    Route::get('/purchase-stock-out-view', [PurchaseController::class, 'purchaseStockOutView'])->name('purchase-stock-out-view');
    Route::post('/product-stock-out/{id}', [PurchaseController::class, 'productStockOut'])->name('product-stock-out');
    Route::get('/specific-product-stock/{id}', [PurchaseController::class, 'specificProductStock'])->name('specific-product-stock');
    
    Route::get('/total-stock-report', [PurchaseController::class, 'totalStockReport'])->name('total-stock-report');
    Route::get('/filter-stock-date', [PurchaseController::class, 'filterStockReport'])->name('filter-stock-report');
    Route::get('/total-stock-in-report', [PurchaseController::class, 'totalStockInReport'])->name('total-stock-in-report');
    Route::get('/filter-stock-in-date', [PurchaseController::class, 'filterStockInDate'])->name('filter-stock-in-date');
    Route::get('/total-stock-out-report', [PurchaseController::class, 'totalStockOutReport'])->name('total-stock-out-report');
    Route::get('/filter-stock-out-date', [PurchaseController::class, 'filterStockOutDate'])->name('filter-stock-out-date');

    Route::get('/total-transection', [AccountController::class, 'totalTransection'])->name('total-transection-report');
    Route::get('/filter-total-transection', [AccountController::class, 'filterTotalTransection'])->name('filter-total-transection');
});