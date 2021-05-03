@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$question->question}}

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
                        <table class="table table-message">
                            <tbody>
                                @foreach ($question -> answers as $key=>$answer)                    
                                <tr>
                                    <td>
                                        {{$key+1}}.
                                        {{$answer->answer}}
                                        @if ($answer->is_correct)
                                        <span class="badge badge-success"><b>Correct</b></span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach                            
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