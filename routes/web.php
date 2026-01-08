<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManageUsersController;
use App\Http\Controllers\AdminManageMenuController;
use App\Http\Controllers\AdminManageBookingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;



/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::resource('categories', CategoryController::class);
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

 Route::get('/menu/{categoryId?}', [MenuController::class, 'index'])->name('menu.index');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Protected User Routes
|--------------------------------------------------------------------------
*/
// users show list

Route::prefix('admin')->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/check-email', [App\Http\Controllers\Admin\UserController::class, 'checkEmail'])->name('users.checkEmail');

});





Route::middleware(['auth'])->group(function () {



    
    // Book a table
     Route::get('/book-table', [BookingController::class, 'create'])->name('book.create');

      Route::post('/book-table', [BookingController::class, 'store'])->name('book.store');

   

    // My Bookings
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');



    
    
// form view
Route::get('/contact/form', [ContactController::class, 'showForm'])->name('contact.form');

// user message store
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// admin contact view
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contact.index');

});

/*
|--------------------------------------------------------------------------
| Admin Routes 
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->prefix('admin')->group(function () {
    

    // Admin Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
       // Users
    Route::get('/admin/users', [AdminManageUsersController::class, 'viewUsers']) ->name('admin.users.index');

  
   

     Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');



 // Bookings
   
     Route::resource('bookings', App\Http\Controllers\AdminManageBookingsController::class);

    // Bookings Management

    Route::get('/bookings', [AdminManageBookingsController::class, 'viewBookings'])->name('admin.bookings.index');
    Route::post('/bookings/{id}/accept', [AdminManageBookingsController::class, 'approveBooking'])->name('admin.bookings.accept');
    Route::post('/bookings/{id}/reject', [AdminManageBookingsController::class, 'rejectBooking'])->name('admin.bookings.reject');
  
    Route::put('/admin/bookings/{id}/update', [App\Http\Controllers\AdminManageBookingsController::class, 'update'])
    ->name('admin.bookings.update');

 
    Route::get('/menu', [AdminManageMenuController::class, 'index'])->name('admin.menu.index');
    Route::post('/menu', [AdminManageMenuController::class, 'store'])->name('menu.store');
    Route::put('/menu/{id}', [AdminManageMenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [AdminManageMenuController::class, 'destroy'])->name('menu.destroy');
});










