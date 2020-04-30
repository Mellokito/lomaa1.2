<?php

namespace App\Http\Controllers\site;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;


class ContactController extends Controller
{
    public function ajouter_contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {

            $contact = new Contact();
            $contact->email = $request->email;
            
            

            $contact->save();
            return redirect()->back()->with('success', 'Email ajouté avec succès');
        }
    }
}
