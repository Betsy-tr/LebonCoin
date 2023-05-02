<?php

use App\Http\Controllers\admin\AnnonceAdminController;
use App\Http\Controllers\admin\CategorieController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\user\UserDashboardController;

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
    Route::get('admin/annonce/delete/{id}',[AnnonceAdminUserController::class, 'delete'])->name('admin.annonce.delete');
    
});


// Gestion des routes pour l'utilisateur
Route::middleware(['auth'])->group(function () {
    Route::get('/user/userdashboard',[UserDashboardController::class, 'index'])->name('user.userdashboard');

    //Gestion des annonces 
    Route::get('user/annonce',[UserController::class, 'index'])->name('user.annonce.lister');

    Route::get('user/annonce/create',[UserController::class, 'create'])->name('user.annonce.create');
    Route::post('user/annonce/store',[UserController::class, 'store'])->name('user.annonce.store');
    Route::post('user/annonce/edit/{id}',[UserController::class, 'update'])->name('user.annonce.update');
    Route::get('user/annonce/edit/{id}',[UserController::class,'edit'])->name('user.annonce.edit'); 
    
    Route::get('user/annonce/delete/{id}',[UserController::class, 'delete'])->name('user.annonce.delete');

    Route::get('user/annonce/favorisAdd/{id}',[UserController::class, 'favorisAdd'])->name('user.annonce.favorisAdd');
    Route::get('user/annonce/favoris',[UserController::class, 'favoris'])->name('user.annonce.favoris');
    
});


Route::get('public/accueil',[PublicController::class,'index'])->name('public.accueil');
Route::get('public/annonceDetail/{annonce}',[PublicController::class,'detail'])->name('public.annonceDetail');
Route::get('/public/accueil/categorie/{id}',[PublicController::class,'categorie'])->name('public.accueil.categorie');










require __DIR__.'/auth.php';
