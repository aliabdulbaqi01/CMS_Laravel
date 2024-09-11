<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            dd($image );
        }
    }
}
