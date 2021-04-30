@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Quiz Listesi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        
                    </div>
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Quiz Adı</th>
                                    <th>Açıklama</th>
                                    <th>Süresi (dk)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($quizzes)>0)
                                @foreach ($quizzes as $key => $quiz)                    
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$quiz->name}}</td>
                                    <td>{{$quiz->description}}</td>
                                    <td>{{$quiz->minutes}}</td>
                                    <td><a href="{{route('quiz.edit',$quiz->id)}}"><i class="fas fa-pen-alt"></i>Düzenle</a>
                                        <a href="{{route('quiz.destroy',$quiz->id)}}"><i class="fas fa-trash-alt"></i>Sil</a></td>
                                </tr>
                                @endforeach
                                @else
                                <div class="alert alert-info" role="alert">Kayıtlı Quiz Bulunamadı</div>
                                @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection