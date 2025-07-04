<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormSubmission;

class FormDataController extends Controller
{
    public function index()
    {
        $submissions = FormSubmission::latest()->get();

        return view('admin.form-submissions.index', compact('submissions'));
    }
}
