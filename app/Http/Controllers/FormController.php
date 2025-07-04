<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;
use App\Mail\FormSubmissionMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouMail;

class FormController extends Controller
{
   public function store(Request $request)
{
    
    $data =  $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

   
    FormSubmission::create($data);

    Mail::to('sasindu.7needle@gmail.com')->send(new FormSubmissionMail($data));

    // 2. Send thank-you to user
    Mail::to($data['email'])->send(new ThankYouMail($data));

    return redirect()->back()->with('success', 'Your form has been submitted successfully!');
}
}
