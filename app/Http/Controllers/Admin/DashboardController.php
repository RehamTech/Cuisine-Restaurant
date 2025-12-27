<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMeals = Meal::count();
        $totalCategories = Category::count();
        $recentMeals = Meal::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalMeals', 'totalCategories', 'recentMeals'));
    }
}
