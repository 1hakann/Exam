@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Quiz Oluştur
            <a href="{{route('quiz.index')}}"><button style="float: right;" class="btn btn-primary">Quiz Listesine Dön</button></a></h4>
        </div>

        <div class="card-body">

            @if (Session('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
            </div>
        @endif


            <form action="{{route('quiz.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Quiz Adı</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="basicInput">
                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="helpInputTop">Kısa Açıklama</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" id="helpInputTop">
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="helperText">Quiz Kaç Dakika Sürecek?</label>
                        <input type="text" name="minutes" id="helperText" value="{{old('minutes')}}" class="form-control @error('minutes') is-invalid @enderror">
                        @error('minutes')
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