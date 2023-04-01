<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GlassController;
use App\Http\Controllers\PlushController;
use App\Http\Controllers\VinylController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RabbitgooController;
use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\GlassFittingsController;
use App\Http\Controllers\PolycarbonateController;
use App\Http\Controllers\AluminumProfileController;
use App\Http\Controllers\AluminumFittingsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    'verified'
])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware('auth:sanctum')->group(function () {
    //Products
    //Route::resource('products', ProductController::class);
    Route::resource('aluminum_profiles', AluminumProfileController::class); //listo
    Route::resource('glasses', GlassController::class); //listo
    Route::resource('rabbitgoos', RabbitgooController::class);//Peliculas //listo
    Route::resource('polycarbonates', PolycarbonateController::class); //listo
    Route::resource('glass_fittings', GlassFittingsController::class);
    Route::resource('aluminum_fittings', AluminumFittingsController::class);
    Route::resource('vinyls', VinylController::class);//listo
    Route::resource('plushes', PlushController::class);//listo
    //Faltan las pijas
    Route::resource('consumables', ConsumablesController::class);//listo

    //Categories
    Route::resource('categories', CategoryController::class); //listo
    //Brands
    Route::resource('brands', BrandController::class); //listo
    //Sizes
    Route::resource('sizes', SizeController::class); //listo
    //Clients
    Route::resource('clients', ClientController::class); //listo
    //Providers
    Route::resource('providers', ProviderController::class); //listo
});