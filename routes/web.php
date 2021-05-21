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
Route::get('user/quiz/{quizId}','ExamController@getQuizQuestions')->middleware('auth');
Route::post('quiz/create','ExamController@postQuiz')->middleware('auth');
Route::get('result/user/{userId}/quiz/{quizId}','ExamController@viewResult')->middleware('auth');


Route::group(['middleware' => 'isAdmin'], function() {
    Route::get('/', function() {
        return view('admin.index');
    });

    Route::resource('/quiz','Admin\QuizController');
    Route::resource('/question','Admin\QuestionController');
    Route::resource('/user','Admin\UserController');
    Route::get('quiz/{id}/questions','Admin\QuizController@question')->name('quiz.question');
    Route::get('exam/assign','ExamController@create')->name('create.exam');
    Route::post('exam/assign','ExamController@assignExam')->name('assign.exam');
    Route::get('exam/user','ExamController@userExam')->name('view.exam');
    Route::post('exam/remove','ExamController@removeExam')->name('exam.remove');
    Route::get('result','ExamController@result')->name('result');
    Route::get('result
    /{userId}/{quizId}','ExamController@userQuizResult');


});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

return view('dashboard');
})->name('dashboard');


//Route::get('quiz/{quizId}','ExamController@getQuizQuestions');


Auth::routes();

