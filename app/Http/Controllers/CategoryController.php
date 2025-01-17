<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {

        $request->validate(['name' => 'required|string|max:255',]);
        return Category::create($request->all());
    }
}
