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

// Route::get('/', function () { return view('welcome');});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('quiz/{quizId}','ExamController@getQuizQuestions')->middleware('auth');


Route::group(['middleware' => 'isAdmin'], function() {
    Route::get('/', function() {
        return view('admin.index');
    });
    Route::resource('/quiz','Admin\QuizController');
    Route::resource('/question','Admin\QuestionController');
    Route::resource('/user','Admin\UserController');
    Route::get('quiz/{id}/questions','Admin\QuizController@question')->name('quiz.question');
    Route::get('exam/assign','Admin\ExamController@create')->name('create.exam');
    Route::post('exam/assign','Admin\ExamController@assignExam')->name('assign.exam');
    Route::get('exam/user','Admin\ExamController@userExam')->name('view.exam');
    Route::post('exam/remove','Admin\ExamController@removeExam')->name('exam.remove');

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

return view('dashboard');
})->name('dashboard');




//Route::get('quiz/{quizId}','ExamController@getQuizQuestions');


Auth::routes();

