<?php

use App\Models\User;
use Auth\LoginController;
use App\Http\Middleware\Admin1;
use App\Http\Middleware\Admin2;
use App\Http\Middleware\Admin3;
use App\Http\Middleware\Client;
use App\Http\Controllers\MenuAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\oAuthController;
use App\Http\Controllers\CreditcardController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\gestionFaq\GestionFaqController;
use App\Http\Controllers\Admin\gestionMenu\MenuAdminController;
use App\Http\Controllers\Admin\gestionRepas\RepasAdminController;
use App\Http\Controllers\Admin\gestionAdmin\GestionAdminController;
use App\Http\Controllers\Admin\gestionOrder\GestionOrderController;
use App\Http\Controllers\Admin\gestionClient\GestionClientController;
use App\Http\Controllers\Admin\gestionTicket\GestionTicketController;
use App\Http\Controllers\ImageController;

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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/menu/{menu?}', [MenuController::class, 'index'])->name('menu');
Route::get('/repas/{repas}/{addCart?}', [MenuController::class, 'single'])->name('meal');
Route::get('/panier/{delete?}', [CartController::class, 'index'])->name('cart');

Route::get('/plat', [HomeController::class, 'platSelectionne'])->name('plat');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');


// ==========================================================================================================================================================
// ****METTRE EN RESOURCES PLUS TARD****
// USER ACCOUNT INFORMATIONS
Route::get('user/account/informations/edit/{id}', [UserController::class, 'edit'])->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.edit.info');
Route::patch('user/account/informations/update/{id}', [UserController::class, 'update'])->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.update.info');
Route::delete('user/account/destroy/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.account.destroy');
// ==========================================================================================================================================================


// ==========================================================================================================================================================
// ****METTRE EN RESOURCES PLUS TARD****
// USER ACCOUNT ORDERS
Route::get('user/account/orders/index/{id}', [OrderController::class, 'index'])->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.orders.index');
Route::get('user/account/orders/show/{order}', [OrderController::class, 'show'])->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.orders.show');
// ==========================================================================================================================================================


// ==========================================================================================================================================================
// TICKETS / USER ACCOUNT TICKETS
Route::get('user/account/tickets/{id?}', [TicketController::class, 'index'])->middleware(['auth', 'client', 'validate-user-infos'])->name('user.tickets.index');
Route::get('user/tickets/create/{id?}', [TicketController::class, 'create'])->name('user.tickets.create');
Route::post('user/tickets/store/{id?}', [TicketController::class, 'store'])->middleware('prevent-back-history')->name('user.tickets.store');
Route::get('user/account/tickets/show/{id?}', [TicketController::class, 'show'])->middleware(['auth', 'client', 'validate-user-infos',])->name('user.tickets.show');
Route::patch('user/account/tickets/close/{id?}', [TicketController::class, 'update'])->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.tickets.patch');
// ==========================================================================================================================================================



// ==========================================================================================================================================================
// MESSAGES / SINGLE ACTION CONTROLLER (INVOKE)
Route::post('user/account/tickets/message/submit/{id}', MessageController::class)->middleware(['auth', 'client', 'validate-user-infos', 'prevent-back-history'])->name('user.tickets.message.submit');
Route::post('admin/tickets/message/submit', MessageController::class)->middleware(['auth', 'admin1', 'prevent-back-history'])->name('admin.tickets.message.submit');
// ==========================================================================================================================================================




// ==========================================================================================================================================================
// AUTH, REGISTER, OAUTH
Route::get('/finish_registeration/{user}', [oAuthController::class, 'returnViewToCompleteRegisteration'])->middleware(['auth', 'prevent-back-history'])->name('finish.registeration');
Route::controller(GoogleController::class)->name('google.')->group(function () {
    Route::get('/auth/google', 'auth')->name('auth');
    Route::get('/auth/google/redirect', 'redirect')->name('redirect');
    Route::get('google/finish_registeration/{user}', 'returnViewToCompleteRegisteration')->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('finish.registeration');
});


Route::controller(GithubController::class)->name('github.')->group(function () {
    Route::get('/auth/github', 'auth')->name('auth');
    Route::get('/auth/github/redirect', 'redirect')->name('redirect');
    Route::get('github/finish_registeration/{user}', 'returnViewToCompleteRegisteration')->middleware(['auth', 'validate-user-infos', 'prevent-back-history'])->name('finish.registeration');
});


Route::controller(oAuthController::class)->name('oAuth.')->prefix('oAuth/')->middleware((['auth', 'prevent-back-history']))->group(function () {
    Route::post('register/', 'updateOAuthUser')->name('register');
});
// ==========================================================================================================================================================


// ==========================================================================================================================================================
// CREDIT CARD AND PAYMENT
Route::get('/paiement', [StripeController::class, 'stripe']);
Route::post('/paiement', [StripeController::class, 'stripePost'])->name('stripe.post');


Route::post('/getAuthUserCreditCard', [CreditcardController::class, 'getCreditCardForLoggedUser'])->middleware('auth')->name('creditcard.user.auth');
// ==========================================================================================================================================================


Route::prefix('admin/')->name('admin.')->group(function () {

    Route::resource('client', GestionClientController::class)->middleware('admin3');
    Route::resource('admin', GestionAdminController::class)->middleware('admin3');


    Route::get('repas/afficher/tout/{type?}', [RepasAdminController::class, 'showAll'])->middleware('admin2')->name('repas.showAll');
    Route::post('repas/afficher', [RepasAdminController::class, 'show'])->middleware('admin2')->name('repas.show');
    Route::get('repas/afficher/{id}', [RepasAdminController::class, 'showGet'])->middleware('admin2')->name('repas.show.get');

    Route::resource('repas', RepasAdminController::class)->except('show')->middleware('admin2');

    Route::resource('faq', GestionFaqController::class)->middleware('admin2');

    Route::resource('ticket', GestionTicketController::class)->middleware('admin1');

    Route::get('order/search', [GestionOrderController::class, "showOrderForSpecificUser"])->middleware('admin1')->name('order.search');
    Route::get('order/client/{id}', [GestionOrderController::class, "showUserForSpecificOrder"])->middleware('admin1')->name('order.client.show');
    Route::get('order/all', [GestionOrderController::class, "showAllOrders"])->middleware('admin1')->name('order.show.all');
    Route::resource('order', GestionOrderController::class)->middleware('admin1');



    Route::controller(MenuAdminController::class)->middleware('admin2')->group(function () {
        Route::get('/menu/ajouter', 'create')->name('menu');
        Route::post('/menu/ajouter', 'store')->name('menu.store');
        Route::get('/menu/rechercher', 'research')->name('menu.research');
        Route::post('/menu/rechercher', 'search')->name('menu.search');
        Route::get('/menu/edit/{id}', 'edit')->name('menu.edit');
        Route::put('/menu/edit/{id}', 'update')->name('menu.update');
        Route::delete('/menu/supprimer/{id}', 'destroy')->name('menu.destroy');
    });
});

Route::get('ajout/image', function () {
    return view('admin.imageAjout');
});


Route::post('ajoutImage', [ImageController::class, 'store'])->middleware('admin3')->name('ajoutImage.store');
// ==========================================================================================================================================================
