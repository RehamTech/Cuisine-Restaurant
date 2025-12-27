<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $meals = Meal::latest()->take(6)->get();
        return view('home', compact('categories', 'meals'));
    }

    public function menu()
    {
        $categories = Category::all();
        $meals = Meal::all();
        return view('menu', compact('categories', 'meals'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $meals = $category->meals()->get();
        $categories = Category::all();
        return view('category', compact('category', 'meals', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
