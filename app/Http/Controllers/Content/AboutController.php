<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $about = About::get()->first();
        return view('admin.pages.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path($about->image))) {
                File::delete(public_path($about->image));
            }
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $path = 'uploads/frontend_images/' . $imageName;
            $manager = new ImageManager(new Driver());
            $imageManager = $manager->read($image);

            $imageManager->resize(534,605)->save(public_path($path));

            // update the slide
            $about->image = $path;

        }
        $about->update($request->except('image'));
        $about->save();

        toastr()->success('About data updated successfully');
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
