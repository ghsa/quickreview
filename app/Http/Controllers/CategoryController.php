<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(20);

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => request()->name,
        ]);

        return back()->with(['success' => "Category successfully created!"]);
    }

    public function update()
    {
        request()->validate([
            'name' => 'required',
            'id' => 'required'
        ]);

        $category = Category::find(request()->id);
        $category->name = request()->name;
        $category->save();

        return back()->with(['success' => "Category successfully updated!"]);
    }
}
