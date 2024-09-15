<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Footer;
use Illuminate\Support\Facades\Route;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerData = Footer::get()->first();
        $route = Route::currentRouteName();

        return view('frontend.contact', compact('footerData', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        Contact::create($request->all());
        toastr()->success('your request add successfully and we will answer in 24h');
        return redirect()->back();
    }


}
