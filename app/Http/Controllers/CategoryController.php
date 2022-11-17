<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);

        return view('categories.index',compact('categories'));
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }
}
