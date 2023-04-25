<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;



class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::orderBy('name','asc')->paginate(10) ;
        return view('admin.categorie.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    { 
        // Création d'une categorie 
        $newsModel = new Categorie ; 

        $request->validate(['nomCategorie'=>'required|min:5']); 

        $newsModel->name = $request->nomCategorie ;
        $newsModel->icone = 'icone';
        $newsModel->save() ;

        return Redirect::route('admin.categorie');
    }

    /**
     * Store a newly created resource in storage.
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
    public function edit(Request $request, $id)
    { 
        $categorie = Categorie::findOrFail($id) ;
        $request->validate(['nomCategorie'=>'required|min:5']);

        $categorie->name = $request->nomCategorie ;
        $categorie->icone = 'icone';
        $categorie->save() ;

        return Redirect::route('admin.categorie');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $categories = Categorie::findOrFail($id) ;
        
        $categories->delete() ;
        return Redirect::route('admin.categorie');
    }
}
