@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sınav') }}</div>
                
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('error') }}
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
                            <a href="user/quiz/{{$quiz->id}}">
                                <button class="btn btn-success">Sınava Başla</button>
                            </a>
                        @else
                        <a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}"><button class="">Sonuçları Göster</button></a>
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
       
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Kullanıcı Profili
                    
                </div>
                <div class="card-body">
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Meslek: {{auth()->user()->occupation}}</p>
                    <p>Adres: {{auth()->user()->address}}</p>
                    <p>Telefon: {{auth()->user()->phone}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
