<?php

use App\Models\adresse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\adresseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\boutiqueController;
use App\Http\Controllers\EspaceClientController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/products', [HomeController::class, 'products'])->name('products');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/client', [HomeController::class, 'client'])->name('client');
    Route::get('/connexion', function () {
        return view ('connexion');
    });
//  Route::get('/',[boutiqueController::class,'tout_produit'])->name("welcom");

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/searchresult', [SearchController::class, 'searchresult'])->name('searchresult');

//Route::get('/',[boutiqueController::class,'tout_produit'])->name("tout_produit");




/*Route::get('/login',[loginController::class,'getInscrire']);*/
/*_______________________________________________________________________________ */

/*                la boutique                          */

Route::get('/cree_compte_boutique', function () {
    return view('Logins.cree_c_boutique');
})->name("cree_c_boutique");
/* Route::get('/ajouter_Adresse', function () {
    return view('espace.cliennt.ajouteradresse');
})->name("ajouter_adresse"); */
Route::get('/ajouter_Adresse',[adresseController::class,'VosAdresse'])->name("ajouter_adresse");

Route::get('/cree_compte_boutique',[boutiqueController::class,'index'])->name("cree_c_boutique");
Route::get('/espace_Boutique',[boutiqueController::class,'index'])->name("espace_boutique");

Route::get('/ajoutProduit',[boutiqueController::class,'indexajouter'])->name("AjouterProduit");
Route::post('/Ajout_Produit',[boutiqueController::class,'Ajout_Produit'])->name("Ajout_Produit");
Route::post('/cree_compte_boutique',[boutiqueController::class,'store']);

Route::post('/ajoute_adresse',[adresseController::class,'store'])->name("ajoute_adresse");
Route::delete('/delete_adresse/{id_adresse}',[adresseController::class,'delete_adresse'])->name('suprimer_adresse');




/*_______________________________________________________________________________ */

/*                  client                              */

Route::get('/cree_c_client', [clientController::class,'index'])->name("cree_c_client");
Route::get('/espace_client',[EspaceClientController::class,'index'])->name("espace_client");
Route::post('/cree_compte_client', [clientController::class,'store']);
Route::post('/update_user',[RegisterController::class,'update_user'])->name('update_user');


//Route::post('/update_produit/{id_produit}',[RegisterController::class,'update_produit'])->name('update_produit');

Route::get('/tapi',[HomeController::class,'tapi'])->name("tapi");
Route::get('/Fruits_sec',[boutiqueController::class,'produit_Fruits_sec'])->name("Fruits_sec");
Route::get('/Huiles & Amlou',[boutiqueController::class,'produit_Huiles_Amlou'])->name("Huiles_Amlou");
Route::get('/safran',[boutiqueController::class,'produit_safran'])->name("safran");
Route::get('/Miels',[boutiqueController::class,'produit_Miels'])->name("Miels");

Route::get('/vos_commendes',[clientController::class,'VosCommendes'])->name("Vos_Commendes");
Route::Delete('/delete/{id_commende}',[clientController::class,'delete_commendee'])->name('delete_commende');

/*Route::get('/Dates', function () {return view('categories.Dates');})->name("Dates");
Route::get('/Fruits_sec', function () {return view('categories.Fruits_sec');})->name("Fruits_sec");
Route::get('/Huiles & Amlou', function () {return view('categories.Huiles_Amlou');})->name("Huiles_Amlou");
Route::get('/Miels', function () {return view('categories.Miels');})->name("Miels");
Route::get('/safran', function () {return view('categories.safran');})->name("safran"); */

/*_______________________________________________________________________________ */
Route::get('/bijou', function () {
    return view ('Categories.bijou');
});
Route::get('/coussin', function () {
    return view ('Categories.coussin');
});
Route::get('/metal', function () {
    return view ('Categories.metal');
});
Route::get('/nappe', function () {
    return view ('Categories.nappe');
});
Route::get('/poterie', function () {
    return view ('Categories.poterie');
});
Route::get('/pouf', function () {
    return view ('Categories.pouf');
});
Route::get('/sac', function () {
    return view ('Categories.sac');
});
Route::get('/tapi', function () {
    return view ('Categories.tapi');
});

Auth::routes();

Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




        Route::view('/boutique/login','boutiques.loginBoutique')->name('boutique.login');
        Route::view('/boutique/register','boutiques.registerBoutique')->name('boutique.registerBoutique');
        Route::post('/boutique/create',[boutiqueController::class,'store'])->name('boutique.create');
        Route::post('/boutique/check',[boutiqueController::class,'check'])->name('boutique.check');

        //Route::post('logout',[DoctorController::class,'logout'])->name('logout');
        Route::get('/boutique/espaceBoutique',function(){
            return view('Boutiques.homeBoutique');
            })->name('boutique.espaceBoutique');



  Route::prefix('')->name('admin.')->group(function(){
    Route::middleware(['guest:admin',])->group(function(){
        Route::get('/admin',function(){
            return view('espace.admin.adminRegister');
            })->name('admin_login');
        Route::post('/check',[adminController::class,'check'])->name('check');
    });
    Route::middleware(['auth:admin',])->group(function(){
        Route::get('/Admin-page-Officiel',function(){
            return view('espace.admin.homeAdmin');
            })->name('homeAdmin');
            /* Route::get('/Store-page',function(){
                return view('espace.store.espaceStore');
                })->name('homeStore'); */

            Route::get('/clients',[adminController::class,'clients'])->name('clients');
            Route::get('/produits',[adminController::class,'produits'])->name('produits');
            Route::get('/boutiques',[adminController::class,'boutiques'])->name('boutiques');
            //Route::Delete('/delete/{id}',[adminController::class,'delete_boutique'])->name('delete_boutique');
            Route::Delete('/delet/{id}',[clientController::class,'delete_boutique'])->name('delete_store');
    });
 });


Route::prefix('store')->name('store.')->group(function(){
    Route::middleware(['guest:store',])->group(function(){
        Route::get('/',function(){
            return view('espace.store.storeRegister');
            })->name('store_login');
            Route::post('/check',[storeController::class,'check'])->name('store.check');
            Route::view('/register','boutiques.registerBoutique')->name('registerBoutique');
        //Route::post('/check',[adminController::class,'check'])->name('check');
    });
    Route::middleware(['auth:store',])->group(function(){
        Route::get('/Store-page',function(){
            return view('espace.store.espaceStore');
            })->name('homeStore');
            Route::post('/Ajout_Produit',[boutiqueController::class,'Ajout_Produit'])->name("Ajout_Produit");
            Route::get('/vos_Produit',[boutiqueController::class,'VosProduit'])->name("Vos_Produit");
            Route::Delete('/delete/{id_produit}',[RegisterController::class,'delete_produit'])->name('delete_produit');
            Route::get('/ajoutProduit',[boutiqueController::class,'indexajouter'])->name("AjouterProduit");
            Route::post('/update_boutique',[storeController::class,'update_boutique'])->name('update_boutique');
            Route::get('/offre',[storeController::class,'offre'])->name("offre");
            Route::post('/ajoute_offre',[storeController::class,'ajouter_offre'])->name('ajouter_offre');

        /* Route::get('/Store-page',function(){
            return view('espace.store.espaceStore');
            })->name('homeStore'); */

    });
});




 //panier

 Route::get('/panier',[CartController::class,'index'])->name('panier');
 Route::post('/add/cart/{id_produit}',[CartController::class,'AddProduitTocart'])->name('add.panier');
 Route::post('/update/cart/{id}',[CartController::class,'updateProduitFromCart'])->name('update.panier');
 Route::post('/remove/cart/{id}',[CartController::class,'removeProduitFromCart'])->name('remove.panier');


 //payment
 Route::get('/panier/payment',[PaymentController::class,'handlePayment'])->name('make.payment');
 Route::get('/panier/success',[PaymentController::class,'PaymentSuccess'])->name('success.payment');
 Route::get('/panier/cancel',[PaymentController::class,'cancelPayment'])->name('cancel.payment');
