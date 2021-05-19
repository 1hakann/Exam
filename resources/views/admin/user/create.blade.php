@extends('admin.layouts.master')



@section('content')
<div class="card-content">
    <div class="card-body">
        @if (Session('message'))
        <div class="mb-4 font-medium text-sm text-green-600">
            <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
        </div>
         @endif
        <form class="form form-vertical" action="{{route('user.store')}}" method="POST">
            @csrf
            @method('post')
            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">First Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control"
                                    placeholder="User Name" name="name" value="{{old('name')}}"
                                    id="first-name-icon" @error('name') is-invalid @enderror>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="form-group has-icon-left">
                            <label for="email-id-icon">Email</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                    placeholder="Email" id="email-id-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Mobile</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}"
                                    placeholder="Mobile" id="mobile-id-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password-id-icon">Password</label>
                            <div class="position-relative">
                                <input type="" class="form-control" name="password" value="{{old('password')}}"
                                    placeholder="Password" id="password-id-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Meslek</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}"
                                    placeholder="Input with icon left"
                                    id="first-name-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                @error('occupation')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Adres</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="address" value="{{old('address')}}"
                                    placeholder="Input with icon left"
                                    id="first-name-icon">
                                <div class="form-control-icon">
                                    <i class="bi bi-house"></i>
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="col-12">
                    <div class="col-12">
                        <div class='form-check'>
                            <div class="checkbox mt-2">
                                <input type="checkbox" id="remember-me-v"
                                    class='form-check-input' checked>
                                <label for="remember-me-v">Remember Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit"
                            class="btn btn-primary me-1 mb-1">Oluştur</button>
                        <button type="reset"
                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection