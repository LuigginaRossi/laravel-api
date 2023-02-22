<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

        $admin= User::where('email', 'cicciopasticcio@gmail.com')->get();
        
        // $admins= User::where('role', 'admin')->get();
        //$adminsEmail= $admins->pluck('emial);

        //stringa o array di stringa: 'luigginavaldivia@gmail.com'/ $adminsEmail
        Mail::to($admin)->send(new NewContact($contactData));
        return response()->json($contactData);
    }
}
