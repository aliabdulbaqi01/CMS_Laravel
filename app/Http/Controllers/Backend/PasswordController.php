<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /*
     * change the password
     */
    public function edit() {
        return view('admin.password.edit');
    }

    /*
     * Update user Password
     */
    public function update(UpdatePasswordRequest $request) {

        if(!Hash::check($request->get('current_password'), Auth::user()->password)) {
            toastr()->error('current password does not match');
            return redirect()->route('admin.password.edit');
        }
        $request->user()->update([
            'password' => hash::make($request->input('password'))
        ]);
        $request->user()->save();
        toastr()->success('Password changed successfully.');
        return redirect()->route('admin.password.edit');

    }
}
