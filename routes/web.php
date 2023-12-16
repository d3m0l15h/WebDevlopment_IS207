<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
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

//Account Logout
Route::get('/account/logout', [
    AccountController::class,
    'logout'
])->name('logout');

////////////////////////PROFILE
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

////////////////////////////EMPLOYER
//GET job list
Route::get('/job/list', [
    EmployerController::class,
    'manage_jobs'
])->name('employer.manage_jobs');

//////////////////USER
//profil user job
//GET user job apply
Route::get('/applied', [
    UserController::class,
    'applied'
])->name('user.applied');

//POST
Route::post('/profile/job-accept', [
    JobController::class,
    'job_accept'
])->name('profile.jobaccept');

//POST
Route::post('/profile/uploadcv', [
    JobController::class,
    'upload_cv'
])->name('profile.uploadcv');
Route::get('/profile/uploadcv', function () {
    abort(404);
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

//Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/employer', [
        AdminController::class,
        'manage_employer'
    ])->name('admin.employer');

    Route::get('/admin/user', [
        AdminController::class,
        'manage_user'
    ])->name('admin.user');

    Route::get('/admin/dashboard', [
        AdminController::class,
        'dashboard'
    ])->name('admin.dashboard');

    Route::get('/admin/request', [
        AdminController::class,
        'manage_request'
    ])->name('admin.request');
});
