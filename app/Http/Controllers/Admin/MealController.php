<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::with('category')->get();
        return view('admin.meals.index', compact('meals'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.meals.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('meals', 'public');
        }

        Meal::create($validated);

        return redirect()->route('admin.meals.index')
            ->with('success', 'Meal created successfully!');
    }

    public function edit(Meal $meal)
    {
        $categories = Category::all();
        return view('admin.meals.edit', compact('meal', 'categories'));
    }

    public function update(Request $request, Meal $meal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($meal->image) {
                \Storage::disk('public')->delete($meal->image);
            }
            $validated['image'] = $request->file('image')->store('meals', 'public');
        }

        $meal->update($validated);

        return redirect()->route('admin.meals.index')
            ->with('success', 'Meal updated successfully!');
    }

    public function destroy(Meal $meal)
    {
        if ($meal->image) {
            \Storage::disk('public')->delete($meal->image);
        }
        $meal->delete();
        return redirect()->route('admin.meals.index')
            ->with('success', 'Meal deleted successfully!');
    }
}
