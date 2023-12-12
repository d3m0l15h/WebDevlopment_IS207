<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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

//searchController
Route::get('/search',[
    SearchController::class,
    'search'
])->name('search');

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

//profile
Route::get('/profile', [
    ProfileController::class,
    'index'
])->name('profile');

//profile update
Route::post('/profile/user', [
    ProfileController::class,
    'user'
])->name('profile.user');

Route::get('/profile/user', function () {
    abort(404);
});

Route::post('/profile/upload-avatar', [
    ProfileController::class,
    'upload_avatar'
])->name('profile.uploadavatar');

//profile update
Route::post('/profile/employer', [
    ProfileController::class,
    'employer'
])->name('profile.employer');
Route::get('/profile/employer', function () {
    abort(404);
});

//profile employer job-management
Route::get('/profile/job-management', [
    EmployerController::class,
    'manage_job_applies'
])->name('profile.job-management');

//profil user job
Route::get('/profile/jobs', [
    JobController::class,
    'manage_user_jobs'
])->name('profile.jobs');


Route::get('/profile/job-request', [
    JobController::class,
    'job_request'
])->name('profile.jobrequest');

Route::post('/profile/job-accept', [
    JobController::class,
    'job_accept'
])->name('profile.jobaccept');


Route::post('/profile/uploadcv', [
    JobController::class,
    'upload_cv'
])->name('profile.uploadcv');
Route::get('/profile/uploadcv', function () {
    abort(404);
});

//Job
Route::get('/job/create', [
    JobController::class,
    'index'
])->name('job.create');

Route::get('/job/{id}/edit', [
    JobController::class,
    'edit_job'
])->name('job.edit');

Route::get('/job/{slug}', [
    JobController::class,
    'detail'
])->name('job.detail');

Route::post('/job/create', [
    JobController::class,
    'store'
])->name('job.store');

// Admin
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