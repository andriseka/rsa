<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class CategoryUserController extends Controller
{
    public function index()
    {
        $userCategories = UserCategory::select('name', 'slug')->paginate(10);
        return view('admin.categories.index', compact('userCategories'));
    }
}
