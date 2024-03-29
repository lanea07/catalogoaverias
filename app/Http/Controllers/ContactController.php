<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function view(Product $product)
    {
        return view('contact-form.submit-form', [
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name'  => 'required',
                'phone'   => 'required|digits_between:7,10|numeric',
                'email' => 'required|email:rfc,dns',
                'notes' => 'sometimes',
                'id'    => 'required'
            ]
        );
        $product = Product::where('id', '=', $validated['id'])->first();
        $mailData = ['validated' => $validated, 'product' => $product];
        $destination_addresses = explode(',', env('CONTACT_FORM_DESTINATION_ADDRESS', 'juan.soto@flamingo.com.co'));
        Mail::to($destination_addresses)->locale('es')->queue(new ContactMail($mailData));
        return redirect()->back()->with('status', __('Request succesfuly sent'));
    }
}
