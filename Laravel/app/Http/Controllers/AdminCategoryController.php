<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.administrator.categories.index', [
      'categories' => Category::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.administrator.categories.createCategory');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:50',
      'slug' => 'required|unique:categories',
      'color' => 'required',
    ]);

    Category::create($validatedData);

    return redirect('/dashboard/administrator/categories')->with('success', 'Category has been added!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view('dashboard.administrator.categories.editCategory', [
      'category' => $category
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {
    $rules = [
      'name' => 'required|max:50',
      'color' => 'required',
    ];


    if ($request->slug != $category->slug) {
      $rules['slug'] = 'required|unique:categories';
    }

    $validatedData = $request->validate($rules);

    Category::where('id', $category->id)->update($validatedData);

    return redirect('/dashboard/administrator/categories')->with('success', 'Category has been updated!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->destroy($category->id);

    return redirect('/dashboard/administrator/categories')->with('success', 'Category has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Category::class, 'slug', $request->category);

    return response()->json(['slug' => $slug]);
  }
}
