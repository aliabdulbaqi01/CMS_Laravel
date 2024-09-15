<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Footer;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /*
     * about page
     */
    public function index() {
        $about = About::get()->first();
        $footerData = Footer::get()->first();
        return view('frontend.about', compact('about', 'footerData' ));

    }
}
