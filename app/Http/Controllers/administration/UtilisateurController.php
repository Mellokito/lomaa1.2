<?php

namespace App\Http\Controllers\administration;

use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;
use Validator;

class UtilisateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('checkAdministrateur');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_utilisateurs'] = User::all();
        return view('administration.utilisateur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $data['roles'] = $user->role();

        return view('administration.utilisateur.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:32|confirmed',
            'role' => 'required|in:1,2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $user = new User();
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
    
            $statut = $request->input('statut');
            if($statut == null){
                $user->statut = 0;
            }else{
                $user->statut = 1;
            }

            $user->edition = false;
            $user->image = false;
            $user->video = false;
            
            $user->save(); 
            return redirect()->route('utilisateur.index')->with('success', 'Enregistrement effectué');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('404');
        }

        $data['utilisateur'] = $user;

        return view('administration.utilisateur.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8|max:32|confirmed',
            'role' => 'required|in:1,2',
        ]);
        // return var_dump($user->role);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        try {
            if ($request->isMethod('put')) {
                $user->name = $request->nom;
                $user->email = $request->email;
                if (!empty($request->password)) {
                    $user->password = Hash::make($request->password);
                }
    
                if ($user->id == Auth::user()->id) {
                    if($user->role == 'Super Administrateur'){
                        $user->role = 1;
                    }elseif($user->role == 'Administrateur'){
                        $user->role = 2;
                    }else{
                        $user->role = 3;
                    }
                    
                    $user->statut = $user->statut  == 'Actif' ? 1 : 0;
                } else {
                    $user->role = $request->role;
    
                    $statut = $request->input('statut');
                    if ($statut == null) {
                        $user->statut = 0;
                    } else {
                        $user->statut = 1;
                    }
                }
                $user->update();
                return redirect()->route('utilisateur.index')->with('success', 'Modification effectuée');
            }
            
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->back()->with('error', 'Cet Email existe déjà');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('404');
        }

        if($user->id == Auth::user()->id){
            return redirect()->route('utilisateur.index')->with('error', 'Impossible de supprimer votre compte');
        }
        if (!$user->article->isEmpty()) {
            return "Impossible de supprimer";
            // return redirect()->route('importance_piece.index')->with('error', 'Impossible de supprimer !! une ou plusieurs pieces sont affectées à cet enregistrement');
        }

        $user->delete();
        return redirect()->route('utilisateur.index')->with('success', 'Suppression effectuée');
    }

    public function droit_acces(User $user){
        $categorie = Categorie::find(1);
        
        try {
            $user->droit_acces()->attach($categorie->id, ['droit_acces' => 1]);
            return redirect()->route('utilisateur.index')->with('success', 'Suppression effectuée');
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->route('utilisateur.index')->with('error', 'Cet utilisateur à déjà un droit d\'accès sur cette catégorie');
            }
        }
        
        
    }
}
