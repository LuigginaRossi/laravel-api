<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        return view("admin.contacts.index", [
            "contacts" => Contact::all()
        ]);
    }

    public function show(Contact $contact) {
        return view("admin.contacts.show", compact("contact"));
    }
}
