<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymnastController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ClubController;


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

Route::prefix('gymnast')->group(function () {
    // Get Views
    Route::get('/home', [GymnastController::class, 'GymnastHomePage'])->name('gymnast.dashboard');
    Route::get('/edit/{id}', [GymnastController::class, 'GymnastEditPage'])->name('gymnast.edit');
    Route::get('/create', [GymnastController::class, 'GymnastCreatePage'])->name('gymnast.create');
    Route::get('/view/{id}', [GymnastController::class, 'GymnastViewPage'])->name('gymnast.view');
    // Post Requests
    Route::post('/delete', [GymnastController::class, 'GymnastDelete'])->name('gymnast.delete');
    Route::post('/edit', [GymnastController::class, 'GymnastEdit'])->name('gymnast.form.edit');
    Route::post('/create', [GymnastController::class, 'GymnastCreate'])->name('gymnast.form.create');
});

Route::prefix('club')->group(function () {
    // Get Views
    Route::get('/home', [ClubController::class, 'ClubHomePage'])->name('club.dashboard');
    Route::get('/edit/{id}', [ClubController::class, 'ClubEditPage'])->name('club.edit');
    Route::get('/create', [ClubController::class, 'ClubCreatePage'])->name('club.create');
    Route::get('/view/{id}', [ClubController::class, 'ClubViewPage'])->name('club.view');
    // Post Requests
    Route::post('/delete', [ClubController::class, 'ClubDelete'])->name('club.delete');
    Route::post('/edit', [ClubController::class, 'ClubEdit'])->name('club.form.edit');
    Route::post('/create', [ClubController::class, 'ClubCreate'])->name('club.form.create');
});

Route::prefix('coach')->group(function () {
    // Get Views
    Route::get('/home', [CoachController::class, 'CoachHomePage'])->name('coach.dashboard');
    Route::get('/edit/{id}', [CoachController::class, 'CoachEditPage'])->name('coach.edit');
    Route::get('/create', [CoachController::class, 'CoachCreatePage'])->name('coach.create');
    Route::get('/view/{id}', [CoachController::class, 'CoachViewPage'])->name('coach.view');
    // Post Requests
    Route::post('/delete', [CoachController::class, 'CoachDelete'])->name('coach.delete');
    Route::post('/edit', [CoachController::class, 'CoachEdit'])->name('coach.form.edit');
    Route::post('/create', [CoachController::class, 'CoachCreate'])->name('coach.form.create');
});

Route::prefix('competition')->group(function () {
    // Get Views
    Route::get('/home', [CompetitionController::class, 'CompetitionHomePage'])->name('competition.dashboard');
    Route::get('/view/{id}', [CompetitionController::class, 'CompetitionViewPage'])->name('competition.view');
    // Get Requests
    Route::get('competition-data/{id}', [CompetitionController::class, 'GetCompetitionData'])->name('competition.data.edit');
    // Post Requests
    Route::post('/delete', [CompetitionController::class, 'CompetitionDelete'])->name('competition.delete');
    Route::post('/edit', [CompetitionController::class, 'CompetitionEdit'])->name('competition.form.edit');
    Route::post('/create', [CompetitionController::class, 'CompetitionCreate'])->name('competition.form.create');
});

Route::prefix('iam')->group(function () {
    Route::get('/access-management', function () {
        return view('iam.access-management');
    });

    Route::get('/permission-management', function () {
        return view('iam.permission-management');
    });

    Route::get('/role-management', function () {
        return view('iam.role-management');
    });
});

Route::get('/test', function () {
    $user = auth()->user()->hasPermissionTo('create iam');
    return view('test', ['user' => $user]);
});


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // Show the login page if the user is not signed in.
    } else {
        // return redirect()->route('login'); // Redirect to the dashboard if the user is signed in.
        return redirect()->route('dashboard'); // Show the login page if the user is not signed in.

    }
})->name('home');


Route::middleware(['guest'])->group(function () {
    Route::get('/reminder', function () {
        return view('auth.reminder');
    });

    Route::get('/recover-password', function () {
        return view('auth.recover');
    });
});

Route::get('/home', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
});
