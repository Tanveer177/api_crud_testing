<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
        // return CategoryResource::collection(Category::with('participant'));
    }
    public function show(string $id)
    {
        $category = Category::find($id);
        if (! $category) {
            return response()->json(['error' => 'Category Not Found'], 404);
        }
        return $category;
    }
}
