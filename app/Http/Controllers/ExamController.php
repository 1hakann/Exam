<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Models\User;
use App\Models\Answer;
use DB;

class ExamController extends Controller
{
    public function create()
    {
        return view('admin.exam.create');
    }

    public function assignExam(Request $request)
    {
        $quiz = (new Quiz)->assignExam($request->all());
        return redirect()->back()->with('message','Sınav, Seçilen Kullanıcıya Başarıyla Eklendi.');
    }

    public function userExam(Request $request)
    {
        $quizzes = Quiz::get();
        return view('admin.exam.index',compact('quizzes'));
    }

    public function removeExam(Request $request)
    {
        $userId = $request->get('user_id');
        $quizId = $request->get('quiz_id');
        $quiz = Quiz::find($quizId);
        $result = Result::where('quiz_id',$quizId)->where('user_id',$userId)->exists();

        if($result)
        {
            return redirect()->back()->with('message','Quiz Öğrenci Tarafından ÇÖzüldü. Silinemez!');
        } else {
            $quiz->users()->detach($userId);
            return redirect()->back()->with('message','Sınav Artık Öğrenciye Atanmamış!');
        }
    }

    public function getQuizQuestions(Request $request, $quizId)
    {
        $authUser = auth()->user()->id;
        //check if user has been assigned a particular quiz
        $userId = DB::table('quiz_users')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
        if(!in_array($quizId,$userId)) 
        {
            return redirect()->to('/home')->with('error','Bu sınava atanmadınız!');
        }

        $quiz = Quiz::find($quizId);
        $time = Quiz::where('id',$quizId)->value('minutes');
        $quizQuestions = Question::where('quiz_id',$quizId)->with('answers')->get();
        $authUserHasPlayedQuiz = Result::where(['user_id' => $authUser, 'quiz_id'=> $quizId])->get();
        return view('quiz',compact('quiz','time','quizQuestions','authUserHasPlayedQuiz'));        
    }

    public function  postQuiz(Request $request)
    {
        $questionId = $request['questionId'];
        $answerId = $request['answerId'];
        $quizId = $request['quizId'];

        $authUser = auth()->user();

        return $userQuestionAnswer = Result::updateOrCreate(
            ['user_id' => $authUser->id, 'quiz_id' => $quizId, 'question_id'=>$questionId],
            ['answer_id' => $answerId]
        );
    }
}
    