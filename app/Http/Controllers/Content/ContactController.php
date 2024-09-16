<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
     * show all contact requests
     */
    public function index() {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.pages.contact.index',  compact('contacts'));
    }

    /*
     * show message detail
     */
    public function show(Contact $contact) {
        return view('admin.pages.contact.show', compact('contact'));
    }
}
