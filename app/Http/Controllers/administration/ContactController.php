<?php

namespace App\Http\Controllers\administration;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('checkAdministrateur');
    }

    public function index()
    {
        $data['contacts'] = Contact::all();
               
        return view('administration.contact.index', $data);
    }

    public function destroy(Contact $contact)
    {
        if((Auth::user()->role != 'Super Administrateur' && Auth::user()->role != 'Administrateur')){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Suppression effectuée');
    }


}
