@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
      <form method="POST" action="{{ route('register') }}">
      @csrf
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">First name</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter name" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
                  </span>
               @endif
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hak Akses</label>
            <select id="hak_akses" class="form-control{{ $errors->has('hak_akses') ? ' is-invalid' : '' }}" name="hak_akses" required>
									<option>=PILIH HAK AKSES=</option>
									<option value="1">Dosen</option>
									<option value="2">Mahasiswa</option>
						</select>
            @if ($errors->has('hak_akses'))
              <span class="invalid-feedback">
              <strong>{{ $errors->first('hak_akses') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                 @if ($errors->has('password'))
                  <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
          Register
          </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
          <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  @endsection