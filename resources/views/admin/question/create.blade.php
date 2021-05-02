@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Soru Oluştur
            <a href="{{route('quiz.index')}}"><button style="float: right;" class="btn btn-primary">Soru Listesine Dön</button></a></h4>
        </div>

        <div class="card-body">

            @if (Session('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
            </div>
        @endif


            <form action="{{route('question.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="helpInputTop">Quiz Seçin</label>
                        <div class="controls">
                            <select name="quiz" id="" class="col-md-12">
                                <option value="">Seçim Yapınız</option>
                                @foreach (App\Models\Quiz::all() as $quiz)
                                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Soru Ekle</label>
                        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{old('question')}}" id="basicInput">
                        @error('question')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                    </div>

                    <div class="control-group">
                        <label for="basicInput">Seçenekler</label>
                        <div class="controls col-md-6">
                            @for ($i=0; $i<4; $i++)
                            <input type="text" name="options[]" class="form-control @error('options') is-invalid @enderror" placeholder="Seçenek {{$i+1}}" value="{{old('options.[$i]')}}" required id="basicInput">
                            <input type="radio" name="correct_answer" value="{{$i}}"><span>Doğru Cevap mı?</span>
                            @endfor
                            
                        </div>
                        
                        @error('question')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                    </div>


                    <div class="form-group">
                        <input class="btn btn-success mt-3" type="submit" value="Quiz Oluştur" class="form-control">
                    </div>
                </div>
                
            </div>
        </form>
        </div>
    </div>
</section>
@endsection