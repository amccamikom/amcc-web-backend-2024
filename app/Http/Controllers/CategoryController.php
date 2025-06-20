<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{

  public function index()
  {
    $categories = Category::all();

    return response()->json([
      'message' => 'success',
      'data' => $categories
    ]);
  }

  public function store(StoreCategoryRequest $request)
  {
    $validated = $request->validated();
    $category = Category::create($validated);

    return response()->json([
      'message' => 'Successfull create category',
      'data' => $category
    ], 201);
  }

  public function show($id)
  {
    try {
      return response()->json(Category::findOrFail($id));
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Category not found'
      ], 404);
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $category = Category::findOrFail($id);

      $category->update($request->all());

      return response()->json([
        'message' => 'Successfull update category',
        'data' => $category]
      );
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Category not found'
      ], 404);
    }
  }

  public function destroy($id)
  {
    try {
      Category::findOrFail($id)->delete();

      return response()->json(['message' => 'Successfull remove category']);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Category not found'
      ], 404);
    }
  }
}
