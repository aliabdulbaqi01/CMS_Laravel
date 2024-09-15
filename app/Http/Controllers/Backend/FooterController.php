<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $footerData = Footer::get()->first();
        return view('admin.pages.footer.edit', compact('footerData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterRequest $request, Footer $footer)
    {
        $footer->update($request->all());
        $footer->save();
        toastr()->success('Footer updated successfully!');
        return redirect()->route('admin.footer.edit');
    }

}
