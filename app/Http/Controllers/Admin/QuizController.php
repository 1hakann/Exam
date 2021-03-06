<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;    

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = (new Quiz)->allQuiz();
        return view('admin.quiz.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateForm($request);
        $quiz = (new Quiz)->storeQuiz($data);
        return redirect()->back()->with('message','Quiz Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = (new Quiz)->getQuizById($id);
        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateForm($request);
        $quiz = (new Quiz)->updateQuiz($data,$id);
        return redirect(route('quiz.index'))->with('message','Quiz Güncellendi');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Quiz)->deleteQuiz($id);
        return redirect(route('quiz.index'))->with('message','Quiz Silindi');    
    }

    public function validateForm($request)
    {
        return $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|min:3|max:500',
            'minutes' => 'required|integer'
        ]);
    }

    public function question($id)
    {
        $quizzes = Quiz::with('questions')->where('id',$id)->get();
        return view('admin.quiz.question',compact('quizzes'));
    }

}
