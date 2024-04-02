<?php

use App\Http\Controllers\AcheivementController;
use App\Http\Controllers\BasicInformationController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestScoreController;
use App\Models\Education;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),

    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('basic-information/edit', [BasicInformationController::class, 'edit'])->name('basic.edit');
    Route::post('basic-information/update', [BasicInformationController::class, 'update'])->name('basic.update');
    Route::resource('education', EducationController::class);
    Route::resource('experience', ExperienceController::class);
    Route::get('project/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('project/update', [ProjectController::class, 'update'])->name('project.update');
    Route::resource('research', ResearchController::class);
    Route::resource('tests', TestScoreController::class);
    Route::resource('project', ProjectController::class);
    Route::get('skill/edit', [SkillController::class, 'edit'])->name('skill.edit');
    Route::post('skill/update', [SkillController::class, 'update'])->name('skill.update');
    Route::resource('acheivement', AcheivementController::class)->except('show');
    Route::resource('certification', CertificationController::class)->except('show');
});

require __DIR__ . '/auth.php';
