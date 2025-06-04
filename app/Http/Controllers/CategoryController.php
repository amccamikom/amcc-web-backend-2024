<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        return response()->json(Category::all());
    }

    // Menyimpan kategori baru
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();  // Validasi menggunakan StoreCategoryRequest
        $category = Category::create($validated);

        return response()->json([
            'message' => 'Kategori berhasil disimpan',
            'data' => $category
        ], 201);
    }

    // Menampilkan detail kategori berdasarkan ID
    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json(['message' => 'Kategori berhasil diperbarui', 'data' => $category]);
    }

    // Menghapus data kategori
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}