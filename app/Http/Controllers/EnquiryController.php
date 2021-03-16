<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function index()
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        $mails = Enquiry::all();
        return view('admin.mail.show', compact('mails'));

    }

    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'message' => 'required'
        ]);

        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->message = $request->message;


        if ($enquiry->save() == true) {

            $settings = settings::where('name', 'email')->first();
            $admin_email = $settings->value;

            Mail::to($admin_email)->send(new ContactMail($data));

            return redirect()->back()->with('success', 'Your message has been successfully send');

        }
    }

    public function show($id)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        $mail = Enquiry::find($id);
        return view('admin.mail.mail', compact('mail'));
    }

    public function destroy($id)
    {
        Enquiry::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Mail deleted successfully');
    }
}
