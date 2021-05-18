@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <center><h2>Sonucunuz</h2></center>
                @foreach ($results as $key => $result)
                    
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <p>
                            <h2>{{$result->question->question}}</h2>
                        </p>
                        @php
                            $i = 1;
                            $answers = DB::table('answers')->where('question_id',$result->question_id)->get();
                            foreach ($answers as $key => $answer) {
                                echo '<p>'.$i++.')' .$answer->answer .'</p>';
                            }
                        @endphp
                        <p><mark>Sizin Cevabınız: {{$result->answer->answer}}</mark></p>
                        @php
                            $correctAnswers = DB::table('answers')->where('question_id', $result->question_id)->where('is_correct',1)->get();
                            foreach ($correctAnswers as $correct) {
                                echo "Doğru Cevap: ".$correct->answer;
                            }
                        @endphp
                        @if($result->answer->is_correct)
                        <p><span class="badge badge-success">Sonuç: Doğru</span></p>
                        @else
                        <p><span class="badge badge-danger">Sonuç: Yanlış</span></p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection