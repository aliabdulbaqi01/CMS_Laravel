<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\portfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.pages.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(portfolioRequest $request)
    {
        $path = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $path = 'uploads/frontend_images/' . $imageName;
            $manager = new ImageManager(new Driver());
            $imageManager = $manager->read($image);
            $imageManager->resize(1020,519)->save($path);

        }
        Portfolio::insert([
            'name' => $request->name,
            'title' => $request->title,
            'image' => $path,
            'description' => $request->description
        ]);
        toastr()->success('portfolio added successfully');
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Show portfolio in the frontend
     */
    public function show(Portfolio $portfolio) {

        return view('frontend.portfolio_detail', compact('portfolio'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {

        return view('admin.pages.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $path = $portfolio->image;
        if($request->hasFile('image')){
            if (File::exists(public_path($portfolio->image))) {
                File::delete(public_path($portfolio->image));
            }
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $path = 'uploads/frontend_images/' . $imageName;
            $manager = new ImageManager(new Driver());
            $imageManager = $manager->read($image);
            $imageManager->resize(1020,519)->save($path);
        }
        $portfolio->update([
            'name' => $request->name,
            'title' => $request->title,
            'image' => $path,
            'description' => $request->description
        ]);
        toastr()->success('portfolio Updated successfully');
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {

        if (File::exists(public_path($portfolio->image))) {
            File::delete(public_path($portfolio->image));
        }

        $portfolio->delete();
        toastr()->success('portfolio deleted successfully');

        return redirect()->back();
    }
}
