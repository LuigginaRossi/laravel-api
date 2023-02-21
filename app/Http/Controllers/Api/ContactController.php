<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            "userName" => "required|string",
            "object" => "required|string",
            "email" => "required|email|max:255",
            "message" => "required|string",
            "attachment" => "nullable|file|max:5000"
        ]);

        if ($request->has("attachment")) {
            $filePath = Storage::put("/contacts", $data["attachment"]);
            $data["attachment"] = $filePath;
        }

        $contactData = Contact::create($data);
        return response()->json($contactData);
    }
}
