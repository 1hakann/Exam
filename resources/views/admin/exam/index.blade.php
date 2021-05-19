@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kullanıcı Sınav Listesi
                    <a href="{{route('quiz.create')}}"><button style="float: right;" class="btn btn-primary">Quiz Ekle</button></a></h4>

                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                    @if (Session('message'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
                        </div>
                    @endif
                        
                    </div>
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Adı</th>
                                    <th>Sınav</th>
                                    <th>Görüntüle</th>
                                    <th>Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($quizzes)>0)
                                @foreach ($quizzes as $quiz) 
                                @foreach ($quiz->users as $key => $user)                  
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$quiz->name}}</td>
                                    <td><a href="{{route('quiz.question',[$quiz->id])}}"><button class="btn btn-success">Soruları Görüntüle</button></a></td>
                                    <td>
                                        <form action="{{route('exam.remove')}}" method="POST">
                                            @csrf
                                          
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                                            <button class="btn btn-danger" type="submit">Kaldır</button>
                                        </form>
                                    </td>
                                </tr> 
                                @endforeach 
                                @endforeach
                                @else
                                <div class="alert alert-info" role="alert">Kayıtlı Kullanıcı Bulunamadı</div>
                                @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection