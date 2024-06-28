<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentaireController;

// Routes pour les catégories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Routes pour les commentaires
Route::prefix('commentaires')->group(function () {
    Route::get('/', [CommentaireController::class, 'index'])->name('commentaires.index');
    Route::get('/create', [CommentaireController::class, 'create'])->name('commentaires.create');
    Route::post('/', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::get('/{commentaire}', [CommentaireController::class, 'show'])->name('commentaires.show');
    Route::get('/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
    Route::put('/{commentaire}', [CommentaireController::class, 'update'])->name('commentaires.update');
    Route::delete('/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');
});

// Routes pour les idées
Route::resource('idees', IdeeController::class);
Route::post('idees/{id}/approuvé', [IdeeController::class, 'approveIdea'])->name('idees.approuvé');
Route::post('idees/{id}/refusé', [IdeeController::class, 'rejectIdea'])->name('idees.refusé');

// Routes pour l'authentification
Route::get('/login', [AuthController::class, 'getLogin'])->name('login'); // Formulaire de login
Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.postLogin'); // Traitement du login
Route::get('/register', [AuthController::class, 'getRegister'])->name('auth.getRegister'); // Formulaire d'inscription
Route::post('/register', [AuthController::class, 'postRegister'])->name('auth.postRegister'); // Traitement de l'inscription
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Route de test pour l'envoi d'email
// Route::get('/test-email', function () {
//     $idea = \App\Models\Idee::find(1); // Remplacez par l'ID de votre idée
//     $status = 'testée';

//     Mail::to('cheikhsane202@gmail.com')->send(new \App\Mail\IdeaStatusMail($idea, $status));

//     return 'Email envoyé';
// });

Route::put('/test-email',[IdeeController::class, 'update'])->name('mail');
