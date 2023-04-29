<?php

use App\Http\Controllers\admin\AnnonceAdminController;
use App\Http\Controllers\admin\CategorieController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicController;
use App\Models\Annonce;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',function(){
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gestion des routes pour l'administration
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Gestion des catégories
    Route::get('admin/categorie',[CategorieController::class,'index'])->name('admin.categorie');
    Route::get('admin/categorie/create',[CategorieController::class,'create'])->name('admin.categorie.create');
    Route::post('admin/categorie/create',[CategorieController::class,'create'])->name('admin.categorie.create');
    Route::get('admin/categorie/edit/{id}',[CategorieController::class,'edit'])->name('admin.categorie.edit');
    Route::post('admin/categorie/edit/{id}',[CategorieController::class,'edit'])->name('admin.categorie.edit');
    Route::get('admin/categorie/delete/{id}',[CategorieController::class,'delete'])->name('admin.categorie.delete');
    
    //Gestion des annonces
    Route::get('admin/annonce',[AnnonceAdminController::class, 'index'])->name('admin.annonce.lister');
    Route::get('admin/annonce/create',[AnnonceAdminController::class, 'create'])->name('admin.annonce.create');
    Route::post('admin/annonce/store',[AnnonceAdminController::class, 'store'])->name('admin.annonce.store');
    Route::post('admin/annonce/edit/{id}',[AnnonceAdminController::class, 'update'])->name('admin.annonce.update');
    Route::get('/admin/annonce/edit/{id}',[AnnonceAdminController::class,'edit'])->name('admin.annonce.edit'); 
    
    Route::get('admin/annonce/delete/{id}',[AnnonceAdminController::class, 'delete'])->name('admin.annonce.delete');
});

Route::get('public/accueil',[PublicController::class,'index'])->name('public.accueil');
Route::get('public/annonceDetail/{annonce}',[PublicController::class,'detail'])->name('public.annonceDetail');
Route::get('/public/accueil/categorie/{id}',[PublicController::class,'categorie'])->name('public.accueil.categorie');


/* Route::middleware(['auth', 'can:user'])->group(function () {
    
});*/







require __DIR__.'/auth.php';
