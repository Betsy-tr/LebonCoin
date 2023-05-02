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
        
        
    }

    /**
     * Enregistrement des données issues de mon formulaire d'annonces
     */
    public function store(Request $request)
    {
        
        //
       
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        
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
