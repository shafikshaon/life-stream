@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="full_name">{{ __('Full Name') }}</label>
                            <input type="text" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" id="full_name" placeholder="Ex: Majharul Islam" name="full_name" value="{{ old('full_name') }}" required autofocus>

                            @if ($errors->has('full_name'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('full_name') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="username">{{ __('Username') }}</label>
                            <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Ex: majharul" name="username" value="{{ old('username') }}" required>

                            @if ($errors->has('username'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('username') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Ex: majharul@gmail.com" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="phone_number">{{ __('Phone Number') }}</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="phone_number">+880</span>
                              </div>
                              <input type="text" class="bfh-phone form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" id="phone_number" data-format="dd-dddddddd" placeholder="15-12345678" name="phone_number" value="{{ old('phone_number') }}" required>
                            </div>

                            @if ($errors->has('phone_number'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('phone_number') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="" name="password" value="{{ old('password') }}" required>

                            <small class="form-text text-muted">
                              Your password must be 8-100 characters long
                            </small>

                            @if ($errors->has('password'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" placeholder="" name="password_confirmation" value="{{ old('password_confirmation') }}" required>

                            @if ($errors->has('password_confirmation'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="blood_group">{{ __('Blood Group') }}</label>
                            <select class="form-control{{ $errors->has('blood_group') ? ' is-invalid' : '' }}" id="blood_group" name="blood_group" required>
                              <option value="A+">A+</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B-">B-</option>
                              <option value="O+">O+</option>
                              <option value="O-">O-</option>
                              <option value="AB+">AB+</option>
                              <option value="AB-">AB-</option>
                            </select>

                            @if ($errors->has('blood_group'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('blood_group') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="gender">{{ __('Gender') }}</label>
                            <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender" name="gender" required>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Unspecified">Unspecified</option>
                            </select>

                            @if ($errors->has('gender'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('gender') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="district">{{ __('District') }}</label>
                            <select class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" id="district" name="district" required>
                              <option>Select District</option>
                              @foreach ($districts as $district => $value)
                                <option value="{{ $district }}">{{ $value }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('district'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('district') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="upazila">{{ __('Upazila/ Thana') }}</label>
                            <select name="upazila" class="form-control{{ $errors->has('upazila') ? ' is-invalid' : '' }}" id="upazila" required>
                              <option>Select Upazila/ Thana</option>
                              </select>
                                <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                              </div>

                              @if ($errors->has('upazila'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('upazila') }}</strong>
                                </span>
                              @endif
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-md-10 mb-3">
                            <div class="form-check{{ $errors->has('signup_agreement') ? ' is-invalid' : '' }}">
                              <input class="form-check-input" type="checkbox" id="signup_agreement" name="signup_agreement" value="1">
                              <label class="form-check-label" for="signup_agreement">
                                By signing up, you agree to Lift Stream <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                              </label>
                            </div>
                            @if ($errors->has('signup_agreement'))
                              <span class="text-danger">
                                <strong>{{ $errors->first('signup_agreement') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                          <div class="col-md-5 offset-md-5">
                            <button type="submit" class="btn btn-primary">
                              {{ __('Register') }}
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
