<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:50|unique:categories',
        ]);

        $category = Category::create([
            'category_name' => $request->category_name,
        ]);

        return response()->json($category);
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:50|unique:categories',
        ]);

        $category->update([
            'category_name' => $request->category_name,
        ]);

        return response()->json($category);
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category != null) {
            $category->delete();
            return response()->json([
                'message' => 'Category deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Category not found'
        ], 404);
    }
}
