<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactController extends Controller
{
    /**
     * Send email
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $email = new ContactForm($validatedData);

        Mail::to(config('ersin99mehmed@gmail.com'))->send($email);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
