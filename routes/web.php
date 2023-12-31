<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//HomeController
Route::get('/', [
    HomeController::class,
    'index'
])->name('home');

//////////////////ACCOUNT
//Account Register
Route::post('/account/register', [
    AccountController::class,
    'store'
])->name('register');
Route::get('/account/register', function () {
    abort(404);
});

//Account employer
Route::post('/account/employer', [
    AccountController::class,
    'employer'
])->name('employer');
Route::get('/account/employer', function () {
    abort(404);
});

//Account Login
Route::post('/account/login', [
    AccountController::class,
    'login'
])->name('login');
Route::get('/account/login', function () {
    abort(404);
});

//Account reset password
Route::post('/account/change-pwd', [
    AccountController::class,
    'change_pwd'
])->name('change_pwd');
Route::get('/account/reset', function () {
    abort(404);
});

//Account Logout
Route::get('/account/logout', [
    AccountController::class,
    'logout'
])->name('logout');

////////////////////////////PROFILE
Route::get('/profile', [
    ProfileController::class,
    'index'
])->name('profile');

//profile update
//POST
Route::post('/profile/user', [
    ProfileController::class,
    'user'
])->name('profile.user');
Route::get('/profile/user', function () {
    abort(404);
});

//profile update
//POST
Route::post('/profile/employer', [
    ProfileController::class,
    'employer'
])->name('profile.employer');
Route::get('/profile/employer', function () {
    abort(404);
});

Route::get('/employer/{slug}', [
    ProfileController::class,
    'company'
])->name('profile.company');


//POST
Route::post('/profile/uploadcv', [
    JobController::class,
    'upload_cv'
])->name('profile.uploadcv');
Route::get('/profile/uploadcv', function () {
    abort(404);
});

Route::post('/contact', [
    HomeController::class,
    'contact'
])->name('contact');


////////////////////////////EMPLOYER
Route::group(['middleware' => ['employer']], function () {
    //GET job create form
    Route::get('/job/create', [
        JobController::class,
        'create'
    ])->name('job.create');
    //POST job create
    Route::post('/job/create', [
        JobController::class,
        'store'
    ])->name('job.store');
    //GET job edit
    Route::get('/job/{id}/edit', [
        JobController::class,
        'edit'
    ])->name('job.edit');
    //POST job edit
    Route::post('/job/{id}/edit', [
        JobController::class,
        'update'
    ])->name('job.update');
    //GET job list
    Route::get('/job/list', [
        EmployerController::class,
        'manage_jobs'
    ])->name('employer.manage_jobs');
    Route::get('/job/{id}/status_toggle', [
        EmployerController::class,
        'manage_status_toggle'
    ])->name('employer.manage_status_toggle');

    Route::get('/job/apply', [
        EmployerController::class,
        'manage_applies'
    ])->name('employer.manage_applies');
    //POST
    Route::post('/job/apply/', [
        EmployerController::class,
        'job_accept'
    ])->name('profile.jobaccept');
});

//////////////////////////JOB
Route::get('/jobs', [
    JobController::class,
    'index'
])->name('jobs');
//GET job detail
Route::get('/job/{slug}', [
    JobController::class,
    'show'
])->name('job.detail');


/////////////////////////////USER
Route::group(['middleware' => ['user']], function () {
    //profil user job
//GET user job apply
    Route::get('/applied', [
        UserController::class,
        'applied'
    ])->name('user.applied');
});

/////////////////////////ADMIN
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/employer', [
        AdminController::class,
        'manage_employer'
    ])->name('admin.employer');
    Route::get('/admin/employer/{id}/status_toggle', [
        AdminController::class,
        'employer_status'
    ])->name('admin.employer_status');

    Route::get('/admin/user', [
        AdminController::class,
        'manage_user'
    ])->name('admin.user');
    Route::get('/admin/user/{id}/status_toggle', [
        AdminController::class,
        'user_status'
    ])->name('admin.user_status');

    Route::get('/admin/dashboard', [
        AdminController::class,
        'dashboard'
    ])->name('admin.dashboard');

    Route::get('/admin/request', [
        AdminController::class,
        'manage_request'
    ])->name('admin.request');
    Route::post('/admin/request', [
        AdminController::class,
        'request_become_employer'
    ])->name('admin.request_become_employer');
});

Route::get('/user/{id}', [
    AdminController::class,
    'user_show'
])->name('admin.user_show')->middleware('user_show');
