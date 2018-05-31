@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10" style="margin-top: 8%;">
      <p class="text-center">
        <img src="{{ asset('img/logo.png') }}" alt="logo" width="40%" padding="10px 0 15px;">
      </p>
      <form method="get" action="#">
          @csrf
        <div class="form-row">
          <div class="form-group col-md-3">
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
          <div class="form-group col-md-4">
            <select class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" id="district" name="district">
              <option>Search in all District</option>
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
          <div class="form-group col-md-4">
            <select name="upazila" class="form-control{{ $errors->has('upazila') ? ' is-invalid' : '' }}" id="upazila">
              <option>Search in all Upazila/ Thana </option>
            </select>

            @if ($errors->has('upazila'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('upazila') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group col-md-1">
            <span id="loader"><i class="fa fa-spinner fa-spin"></i></span>
          </div>

          <div class="form-group col-md-2 offset-5">
            <button type="submit" class="btn btn-primary">Find A Donor</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
