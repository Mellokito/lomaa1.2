<?php

namespace App\Http\Controllers\administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
    }
    public function index(){
        $id = Auth::user()->id;
        $user = User::find($id);
        if (!$user) {
            return redirect('404');
        }

        $data['utilisateur'] = $user;
        return view('administration.compte.index', $data);
    } 

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if (!$user) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|max:32|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        if ($request->isMethod('put')) {
        $hashedPassword = $user->password;

        if(Hash::check($request->old_password, $hashedPassword)){
            $user->password = Hash::make($request->password);
            $user->update();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Mot de passe modifié avec succès');
        }else{
            return redirect()->back()->with('error','L\'ancien mot de passe est incorrecte');
        }
    }
        
    }
}
