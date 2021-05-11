<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;

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
}
    