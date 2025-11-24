<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class HomeController extends Controller
{
    public function index()
    {
        $company = Company::first();
        return view('welcome', compact('company'));
    }
}
