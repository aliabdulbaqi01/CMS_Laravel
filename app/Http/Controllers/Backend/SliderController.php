<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all data from the slider
        // and return the view with the data
        $slides = Slide::get()->first();
        return view('admin.pages.slide.index', compact('slides'));

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $slides = Slide::get()->first();
        return view('admin.pages.slide.edit', compact('slides'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Slide $slide)
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path($slide->image))) {
                File::delete(public_path($slide->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $path = 'uploads/frontend_images/' . $imageName;
            $manager = new ImageManager(new Driver());
            $imageManager = $manager->read($image);

            $imageManager->resize(636,852)->save(public_path($path));

            // update the slide
            $slide->image = $path;
        }
        $slide->update($request->except('image'));
        $slide->save();

        toastr()->success('slide updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
