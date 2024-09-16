<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('name', 'asc')->get();
        return view('admin.pages.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $path = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $path = 'uploads/frontend_images/' . $imageName;
            $manager = new ImageManager(new Driver());
            $imageManager = $manager->read($image);
            $imageManager->resize(430,327)->save($path);

        }
        Blog::insert([
            'title' => $request->title,
            'tags' => $request->tags,
            'image' => $path,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        toastr()->success('Blog added successfully');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        dd($blog);
        return view('admin.pages.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('name', 'asc')->get();

        return view('admin.pages.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $path = $blog->image;
        if($request->hasFile('image')){
            if (File::exists(public_path($blog->image))) {
                File::delete(public_path($blog->image));
            }
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $path = 'uploads/frontend_images/' . $imageName;
            $manager = new ImageManager(new Driver());
            $imageManager = $manager->read($image);
            $imageManager->resize(430,327)->save($path);
        }
        $blog->update([
            'title' => $request->title,
            'tags' => $request->tags,
            'image' => $path,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        toastr()->success('Blog Updated successfully');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }

        $blog->delete();
        toastr()->success('Blog deleted successfully');

        return redirect()->back();
    }
}
