@extends('layouts.app')

@section('title', 'Change Password')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      @include('layouts.profile-sidebar')
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">Change Password<i></i></div>

        <div class="card-body">
          @if($errors->any())
          <div class="row collapse">
            <ul class="alert-box warning radius">
              @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ Session::get('success') }}
            </div>
          @endif

          @if(Session::has('failed'))
            <div class="alert alert-danger alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ Session::get('failed') }}
            </div>
          @endif

          <form method="POST" action="{{ route('change_password') }}">
            @csrf

            <div class="form-group row">
              <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>
              <div class="col-md-6">
                <input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" placeholder="Current Password" required autofocus>

                @if ($errors->has('current_password'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('current_password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
              <div class="col-md-6">
                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" placeholder="New Password" required autofocus>

                @if ($errors->has('new_password'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('new_password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="confirm_new_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>
              <div class="col-md-6">
                <input id="confirm_new_password" type="password" class="form-control{{ $errors->has('confirm_new_password') ? ' is-invalid' : '' }}" name="confirm_new_password" placeholder="Confirm New Password" required autofocus>

                @if ($errors->has('confirm_new_password'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('confirm_new_password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Change Password') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
