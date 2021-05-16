@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($isExamAssigned)
                    @foreach ($quizzes as $quiz)
                        
                    <div class="card-body">
                        <p><h3>{{$quiz->name}}</h3></p>
                        <p>Sınav Hakkında: {{$quiz->description}}</p>
                        <p>Sınav Süresi: {{$quiz->minutes}}</p>
                        <p>Soru Sayısı: {{$quiz->questions->count()}}</p>
    
                        @if (!in_array($quiz->id, $wasQuizCompleted))
                            <a href="/quiz/{{$quiz->id}}">
                                <button class="btn btn-success">Sınava Başla</button>
                            </a>
                        @else
                        <span class="float-right">Tamamlandı</span>
                        @endif
    
                    </div>
                    @endforeach
                    @else
                    <p>Herhangi Bir Sınava Atanmadınız.</p>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
