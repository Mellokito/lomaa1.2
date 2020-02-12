<?php

namespace App\Http\Controllers\administration;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statutUser');
        $this->middleware('ajoutArticle');
        $this->middleware('accesImage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'Administrateur'){
            $data['images'] = Image::all();
        }else{
            $data['images'] = Image::where('user_id',Auth::user()->id)->get();
        }
        
        return view('administration.image.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.image.create');
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
            'nom' => 'required|string|min:2',
            'image' => 'required|image|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $storage_image = false;
            if ($request->hasFile("image")) {
                $image = $request->file('image');

                $extension = $image->getClientOriginalExtension();
                $filename_image = substr(encrypt(time() . '-' . $request->titre), 1, 50) . '.' . $extension;

                if ($image->storeAs('uploads/images', $filename_image)) {
                    $storage_image = true;
                };
            }

            $image = new Image();
            if ($storage_image) {
                $image->image = $filename_image;
            }

            $image->nom = $request->nom;
            $image->user_id = Auth::user()->id;
            $image->save(); 
            return redirect()->route('image.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        if(Auth::user()->role != 'Administrateur' && $image->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $data['image'] = $image;        

        return view('administration.image.edit', $data);
    }

    public function update(Request $request,Image $image)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
           
            $image->nom = $request->nom;

            $image->save(); 
            return redirect()->route('image.index')->with('success', 'Modification effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        if(Auth::user()->role != 'Administrateur' && $image->valide){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $image->delete();

        return redirect()->route('image.index')->with('success', 'Suppression effectuée');
    }

    public function valider(Image $image){
        if($image->valide == false){
            $image->valide = true;
            $image->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $image->valide = false;
            $image->publish = false;
            $image->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }
    public function publier(Image $image){
        if($image->publish == false){
            $image->publish = true;
            $image->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }else{
            $image->publish = false;
            $image->update();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        }
    }


    }
