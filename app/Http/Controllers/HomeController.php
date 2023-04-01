<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $userCategories = UserCategory::select('id', 'name')->get();
        $candidates = Candidate::select('number', 'user_category_id', 'photo', 'result_voting')->get();



        return view('home', compact('userCategories', 'candidates'));
    }
}
