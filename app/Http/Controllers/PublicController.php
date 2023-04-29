<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Categorie;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $annonces = Annonce::orderBy('created_at','desc')->paginate(4) ;
        $categories = Categorie::orderBy('name','asc')->get() ;

        return view('public.accueil',compact('annonces','categories'));
    }

    public function detail(Annonce $annonce)
    {
        
        return view('public.annonceDetail', compact('annonce')) ;
    }

    public function categorie ($id=0)
    {
        if ($id !=0 ) { // Si $id est différent de 0 alors on liste par catégorie sinon on liste tout
            $annonces = Annonce::where('categorie_id', $id)->orderBy('created_at','desc')->paginate(4) ;
        } else {
            $annonces = Annonce::orderBy('created_at','desc')->paginate(4) ;
        }
        $categories = Categorie::orderBy('name','asc')->get() ;
               
        return view("public.accueil", compact('annonces','categories'));
    }
    
    
}
