<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('register');
});
Route::get('locale/{locale}', 'App\Http\Controllers\LocalizationController@setLocale')->name('setLocale');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['parent'])->group(function () {
    // Parent routes
    Route::get('/parent/dashboard', 'App\Http\Controllers\ParentController@dashboard')->name('parent.dashboard');
    Route::get('/parent/profile', 'App\Http\Controllers\ParentController@profile')->name('parent.profile');
    Route::get('/exams', 'App\Http\Controllers\ExamController@index')->name('exams.index');
});

Route::middleware(['student'])->group(function () {
    //Student routes
    Route::get('/student/dashboard', 'App\Http\Controllers\StudentController@dashboard')->name('student.dashboard');
    Route::get('/student/profile', 'App\Http\Controllers\StudentController@profile')->name('student.profile');
    Route::get('/exams', 'App\Http\Controllers\ExamController@index')->name('exams.index');
    Route::get('/exams/{exam}', 'App\Http\Controllers\ExamController@showQuestions')->name('exam.questions');
    Route::post('/exams/{exam}/submit', [App\Http\Controllers\ExamController::class, 'submitExam'])->name('exam.submit');
    Route::get('/results', [App\Http\Controllers\ExamController::class, 'results'])->name('exams.results');
    Route::get('/exams/{exam}/questions-with-answers', [App\Http\Controllers\ExamController::class, 'showQuestionsWithAnswers'])
    ->name('exam.questions-with-answers');
});