<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Annonce;
use App\Models\Favori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::where('user_id', Auth::user()->id)->get();
        return view('user.annonce.lister',compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categorie::orderBy('name','asc')->get() ;
        return view('user.annonce.ajouter',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newsModel = new Annonce ; 
        // Controle éléments obligatoire 
        $request->validate(['nomAnnonce'=>'required|min:5',
                            'categorie'=>'required',
                            'prix'=>'required']);
                             
        if ($request->file()) {

            $fileName = $request->image->store('public/images') ;
            $newsModel->image = $fileName ;
            

        }

        $newsModel->name = $request->nomAnnonce ;
        $newsModel->categorie_id = $request->categorie ;
        $newsModel->user_id = Auth::user()->id ;
        $newsModel->description = $request->description;
        $newsModel->prix = $request->prix;
        
        
        $newsModel->save() ;

        return Redirect::route('user.annonce.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $actu = Annonce::findOrFail($id) ; 
        $categories = Categorie::orderBy('name','asc')->get() ; // Retourner les catégories par ordre croissant

        

        return view('user.annonce.ajouter', compact('actu','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $actu = Annonce::findOrFail($id) ; // Création d'une instance de class (model News à modifier à partir de l'id)
        $request->validate(['nomAnnonce'=>'required|min:5',
                            'categorie'=>'required',
                            'prix'=>'required']);
                             

        if ($request->file()) {
            if ($actu->image !='') {
                Storage::delete($actu->image) ;
            }
            
            $fileName = $request->image->store('public/images') ;
            $actu->image = $fileName ;
        }

        $actu->name = $request->nomAnnonce ;
        $actu->categorie_id = $request->categorie ;
        $actu->user_id = Auth::user()->id ;
        $actu->description = $request->description;
        $actu->prix = $request->prix;

        $actu->save() ;

        return Redirect::route('user.annonce.lister');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $annonces = Annonce::findOrFail($id) ;
        
        $annonces->delete() ;
        return Redirect::route('user.annonce.lister');
    }

    public function favorisAdd($id)
    {
        $annonce = new Favori ;

        $annonce->user_id = Auth::user()->id ;
        $annonce->annonce_id = $id ;
    
        $annonce->save();
    }
    public function favoris()
    {
        dd(Auth::user()->favoris);
        //$annonces = Annonce::where('user_id', Auth::user()->id)->get();
        //return view('user.annonce.favoris',compact('annonces'));
    }
}
