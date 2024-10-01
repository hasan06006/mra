<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\operation\MraInfoController;
/*SET UP related Controllers bellow*/ 
use App\Http\Controllers\setup\ExpenselistController;
use App\Http\Controllers\setup\PaymentlistController;
use App\Http\Controllers\setup\ConcernpersonController;
use App\Http\Controllers\setup\PeoplelistController;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  ///START OF OF GROUP AUTHENTICATION
Route::middleware(['auth'])->group(function () {

      Route::get('/dashboard', [DashboardController::class, 'index']);


        // Operation folder related all routes 
      Route::get('/mraform', [MraInfoController::class, 'index']);
      Route::get('/addmraform', [MraInfoController::class, 'create']);
      Route::post('/addmraform', [MraInfoController::class, 'Store']);
      Route::get('/editmraform/{id}', [MraInfoController::class, 'show']);
      Route::post('/editmraform/{id}', [MraInfoController::class,'update']);
      Route::get('/deletmraform/{id}', [MraInfoController::class,'delete']);
      Route::get('/invoicepage/{id}', [MraInfoController::class, 'invoicepage']);

      




      // Setup related all routes 
      Route::get('/expenselist', [ExpenselistController::class, 'index']);
      Route::get('/addexpenselist', [ExpenselistController::class, 'create']);
      Route::post('/addexpenselist', [ExpenselistController::class, 'Store']);
      Route::get('/editexpenselist/{id}', [ExpenselistController::class, 'show']);
      Route::post('/editexpenselist/{id}', [ExpenselistController::class,'update']);
      Route::get('/deleteexpenselist/{id}', [ExpenselistController::class,'delete']);


      Route::get('/paymentlist', [PaymentlistController::class, 'index']);
      Route::get('/addpaymentlist', [PaymentlistController::class, 'create']);
      Route::post('/addpaymentlist', [PaymentlistController::class, 'Store']);
      Route::get('/editpaymentlist/{id}', [PaymentlistController::class, 'show']);
      Route::post('/editpaymentlist/{id}', [PaymentlistController::class,'update']);
      Route::get('/deletepaymentlist/{id}', [PaymentlistController::class,'delete']);

      

      Route::get('/concernperson', [ConcernpersonController::class, 'index']);
      Route::get('/addconcernperson', [ConcernpersonController::class, 'create']);
      Route::post('/addconcernperson', [ConcernpersonController::class, 'Store']);
      Route::get('/editconcernperson/{id}', [ConcernpersonController::class, 'show']);
      Route::post('/editconcernperson/{id}', [ConcernpersonController::class,'update']);
      Route::get('/deleteconcernperson/{id}', [ConcernpersonController::class,'delete']);


      Route::get('/peoplelist', [PeoplelistController::class, 'index']);
      Route::get('/addpeoplelist', [PeoplelistController::class, 'create']);
      Route::post('/addpeoplelist', [PeoplelistController::class, 'Store']);
      Route::get('/editpeoplelist/{id}', [PeoplelistController::class, 'show']);
      Route::post('/editpeoplelist/{id}', [PeoplelistController::class,'update']);
      Route::get('/deletepeoplelist/{id}', [PeoplelistController::class,'delete']);

    /* REPORT Related*/  
    
      Route::get('/areport', [ReportController::class, 'indexadvance']); 
      Route::get('/areportdata', [ReportController::class, 'showadvance']);   
      
    
    
    
      Route::get('/pdfdownload/{id}', [PdfController::class, 'generatePDF']);
      Route::get('/pngimage', [PdfController::class, 'generatePNG']);

      //     Route::get('/pdfview/{id}', [PdfController::class,'show']);




});

///END OF GROUP AUTHENTICATION