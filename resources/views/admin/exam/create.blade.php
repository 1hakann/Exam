@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sınav Ata
            <a href="{{route('question.index')}}"><button style="float: right;" class="btn btn-primary">Soru Listesine Dön</button></a></h4>
        </div>

        <div class="card-body">

            @if (Session('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
            </div>
        @endif


            <form action="{{route('assign.exam')}}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="helpInputTop">Quiz Seçin</label>
                        <div class="controls">
                            <select name="quiz_id" id="" class="col-md-12">
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
                        <label for="helpInputTop">Kullanıcı Seçin</label>
                        <div class="controls">
                            <select name="user_id" id="" class="col-md-12">
                                <option value="">Seçim Yapınız</option>
                                @foreach (App\Models\User::where('is_admin','0')->get() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input class="btn btn-success mt-3" type="submit" value="Sınavı Ata" class="form-control">
                    </div>
                </div>
                
            </div>
        </form>
        </div>
    </div>
</section>
@endsection