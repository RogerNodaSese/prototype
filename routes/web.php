<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThesesController;
use App\Models\Thesis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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
    // $theses = Thesis::with(['authors','keywords'])->get();
    $theses = Thesis::with(['authors' => function($query){
        $query->select('last_name','first_name');
    }])->latest()->paginate(5,['id','title','abstract']);
    return view('welcome')->with('theses',$theses);
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('create', function () {
    return view('form.thesis');
});

Route::get('thesis/{id}',[ThesesController::class,'show']);

Route::post('create', [ThesesController::class, 'store'])->name('store');



Route::get('/dashboard', function(){
    return view('admin.dashboard');
});

Route::get('/register', function(){
    return view('auth.register');
})->middleware('verified')->name('auth.register');

Route::get('/email' , function(){
    return view('auth.register-email');
});

Route::post('/email', function(Request $request){
  
    $request->validate([
        'email' => 'required|email|regex:/^[A-Za-z0-9\.]*@(neu)[.](edu)[.](ph)$/',
    ]);
    
    $user = User::firstOrCreate([
        'email' => $request->email
    ]);

    if(!$user->hasVerifiedEmail()){
        
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }

    return redirect()->route('login');
   
})->name('auth.email');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return view('auth.register');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');