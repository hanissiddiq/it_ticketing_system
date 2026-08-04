<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('category')
            ->latest()->get();
            //->paginate(10);

        return view('sub-categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('sub-categories.create', compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        SubCategory::create($request->validated());

        return redirect()
            ->route('sub-categories.index')
            ->with('success', 'Sub Category berhasil ditambahkan.');
    }

    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category');

        return view('sub-categories.show', compact('subCategory'));
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('sub-categories.edit', compact('subCategory', 'categories'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $subCategory->update($request->validated());

        return redirect()
            ->route('sub-categories.index')
            ->with('success', 'Sub Category berhasil diperbarui.');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return redirect()
            ->route('sub-categories.index')
            ->with('success', 'Sub Category berhasil dihapus.');
    }

    public function byCategory($categoryId)
    {
    $subCategories = SubCategory::where('category_id', $categoryId)
        ->where('is_active', true)
        ->orderBy('name')
        ->get([
            'id',
            'name'
        ]);

    return response()->json($subCategories);
    }
}