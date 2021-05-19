@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Quiz Düzenle</h4>
        </div>

        <div class="card-body">

            @if (Session('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
            </div>
        @endif


            <form action="{{route('quiz.update', $quiz->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Quiz Adı</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$quiz->name}}" id="basicInput">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert"><strong>{{$errors->first('name')}}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="helpInputTop">Kısa Açıklama</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$quiz->description}}" id="helpInputTop">
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="helperText">Quiz Kaç Dakika Sürecek?</label>
                        <input type="text" name="minutes" id="helperText" value="{{$quiz->minutes}}" class="form-control @error('minutes') is-invalid @enderror">
                        @error('minutes')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success mt-3" type="submit" value="Quiz Güncelle" class="form-control">
                    </div>
                </div>
                
            </div>
        </form>
        </div>
    </div>
</section>
@endsection