<?php

use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
use App\Mail\GuiEmail;
use Illuminate\Support\Facades\Mail;


Route::get('/', [SiteController::class, 'index']);
Route::get('/sp/{id}', [SiteController::class, 'chitietsp']);
Route::get('/sp_theoloai/{idLoai}', [SiteController::class, 'sptheoloai']);
Route::get('/thongbao', function () {
    return view('thongbao');
});
Route::get('/shop', [SiteController::class, 'shop']);
Route::get("/lienhe", function () {
    return view('lienhe');
});

Route::get('/dangnhap', [UserController::class, 'dangnhap'])->name('login');
Route::post('/dangnhap', [UserController::class, 'dangnhap_']);
Route::get('/thoat', [UserController::class, 'thoat']);
Route::get('/dangky', [UserController::class, 'dangky']);
Route::post('/dangky', [UserController::class, 'dangky_']);
Route::get('/camon', [UserController::class, 'camon']);

Route::get('/hiengiohang', [SanPhamController::class, 'hiengiohang']);
Route::get('/themvaogio/{id}/{soluong}', [SanPhamController::class, 'themvaogio']);
Route::get('/xoasptronggio/{id}', [SanPhamController::class, 'xoasptronggio']);

use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/download', [SanPhamController::class, 'download'])->middleware('auth', 'verified');



Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Thư kích hoạt đã gửi!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

use App\Http\Controllers\AdminLoaiController;

Route::group(['prefix' => 'admin',], function () {
    Route::resource('loai', AdminLoaiController::class);
});

use App\Http\Controllers\AdminSPController;

Route::group(['prefix' => 'admin',], function () {
    Route::resource('sanpham', AdminSPController::class);
});

use App\Http\Controllers\AdminController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('dangnhap', [AdminController::class, 'dangnhap']);
    Route::post('dangnhap', [AdminController::class, 'dangnhap_']);
    Route::get('thoat', [AdminController::class, 'thoat']);
});



Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function () {
    Route::resource('loai', AdminLoaiController::class);
    Route::resource('sanpham', AdminSPController::class);
});



Route::post("/guilienhe", function (Illuminate\Http\Request $request) {
    $arr = request()->post();
    $ht = trim(strip_tags($arr['ht']));
    $em = trim(strip_tags($arr['em']));
    $nd = trim(strip_tags($arr['nd']));
    $dt = trim(strip_tags($arr['dt']));
    $adminEmail = 'tuanh703lap@gmail.com'; //Gửi thư đến ban quản trị
    Mail::mailer('smtp')->to($adminEmail)
        ->send(new GuiEmail($ht, $em, $nd,$dt));
    $request->session()->flash('thongbao', "Đã gửi mail");
    return redirect("/");
});




use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/timkiem", function(Request $request){ 
  $tukhoa = ($request->has('tukhoa'))? $request->query('tukhoa'):"";
  $tukhoa = trim(strip_tags($tukhoa));
  $listsp=[];
  if ($tukhoa!=""){
    $listsp = DB::table("san_pham")->where("ten_sp", "like", "%$tukhoa%")->get();
  }
  return view('timkiem', ['tukhoa'=> $tukhoa , 'listsp'=>$listsp]);
});

Route::post('/luubinhluan', [SiteController::class,'luubinhluan']);