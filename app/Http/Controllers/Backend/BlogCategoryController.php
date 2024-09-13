<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\portfolioRequest;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::latest()->get();
        return view('admin.pages.blog_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blog_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        BlogCategory::insert($request->only('name'));
        toastr()->success('Blog Category added successfully');
        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Show portfolio in the frontend
     */
    public function show(BlogCategory $blogCategory) {
dd($blogCategory);
        return view('frontend.portfolio_detail', compact('blogCategory'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       $category = BlogCategory::findOrFail($id);

        return view('admin.pages.blog_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request,  $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->update($request->only('name'));
        toastr()->success('Blog Category Updated successfully');
        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        toastr()->success('Blog Category deleted successfully');

        return redirect()->back();
    }
}
