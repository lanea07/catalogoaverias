<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/massive-upload', [ProductController::class, 'massiveUpload'])->name('massive-upload');
    Route::post('/products/process-massive-upload', [ProductController::class, 'processMassiveUpload']);
    Route::get('/products/delete-image', [ProductController::class, 'deleteImage']);

    Route::resources([
        'roles' => RoleController::class
    ]);
});

Route::get('search/{q}', [SearchController::class, 'search'])->name('search');
Route::get('categories', [SearchController::class, 'categories'])->name('categories');
Route::get('/set-locale/{lang}', [LangController::class, 'setLocale'])->name('set-locale');
Route::get('/contact/{product}', [ContactController::class, 'view']);
Route::post('/contact', [ContactController::class, 'store']);

/**
 * Products controller is not guarded by middleware here since it is applied in the controller's constructor
 */
Route::resources([
    'products' => ProductController::class
]);

// Route::get('/sendmail', function (Request $request) {
//     $ip = $request->ip();
//     Mail::raw('Hi user, a new login into your account from the IP Address: ' . $ip, function ($message) {
//         $message->from('lanea07@gmail.com', 'Juan Soto');
//         $message->to('juan.soto@flamingo.com', 'User Name');
//     });
//     Mail::to('juancamilo.soto@outlook.com')->send(new BenefitUserCreated(User::find(1)));
//     return response('{message: sent}');
// });