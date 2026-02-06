<?php

namespace App\Http\Controllers;

use App\Mail\ContactUserMail;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    /**
     * Show contact form
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store contact message
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = ContactMessage::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status'  => 'new',
        ]);

        //  Send confirmation email to user
        Mail::to($request->email)->send(
            new ContactUserMail([
                'name'    => $request->name,
                'email'   => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ])
        );

        return back()->with('success', 'Your message has been sent successfully!');
    }


    /**
     * Admin: list messages
     */
    public function adminIndex()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('contact-messages.index', compact('messages'));
    }

    /**
     * Admin: view single message
     */
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['status' => 'read']);

        return view('contact-messages.contact-message-view', compact('message'));
    }
}
