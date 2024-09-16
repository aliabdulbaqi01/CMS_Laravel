<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AboutImageController extends Controller
{
    /*
     * display all image
     */
    public function index(){
        //
    }

    /*
     * create image
     */
    public function create()
    {
        return view('admin.pages.about_image.create');
    }
    public function store(Request $request){
        $images = $request->file('images');
        foreach($images as $image){
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $path = 'uploads/frontend_images/' . $imageName;
                $manager = new ImageManager(new Driver());
                $imageManager = $manager->read($image);
                $imageManager->resize(220,220)->save($path);

            AboutImage::create([
                'image' => $path,
                'created_at' => Carbon::now(),
            ]);
        }
        toastr()->success('About Images added successfully');
        return redirect()->route('admin.about_image.index');
    }
}
