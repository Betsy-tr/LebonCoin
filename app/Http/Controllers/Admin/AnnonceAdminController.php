<?php

namespace App\Http\Controllers\admin;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AnnonceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $annonces = Annonce::orderBy('created_at','desc')->paginate(10) ;
        return view('admin.annonce.lister',compact('annonces'));
    }

    /**
     * Affichage du formulaire des annonces
     */
    public function create()
    {
        //
        $categories = Categorie::orderBy('name','asc')->get() ;
        return view('admin.annonce.ajouter',compact('categories'));
        
        
    }

    /**
     * Enregistrement des données issues de mon formulaire d'annonces
     */
    public function store(Request $request)
    {
        
        //
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

        return Redirect::route('admin.annonce.create');
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
        $actu = Annonce::findOrFail($id) ; 
        $categories = Categorie::orderBy('name','asc')->get() ; // Retourner les catégories par ordre croissant

        

        return view('admin.annonce.ajouter', compact('actu','categories'));
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

        return Redirect::route('admin.annonce.lister');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $annonces = Annonce::findOrFail($id) ;
        
        $annonces->delete() ;
        return Redirect::route('admin.annonce.lister');
    }
}
