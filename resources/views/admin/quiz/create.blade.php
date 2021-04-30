@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Quiz Oluştur</h4>
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
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="basicInput">
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="helpInputTop">Kısa Açıklama</label>
                        <input type="text" name="description" class="form-control" id="helpInputTop">
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="helperText">Quiz Kaç Dakika Sürecek?</label>
                        <input type="text" name="minutes" id="helperText" class="form-control">
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