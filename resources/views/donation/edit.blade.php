@extends('layouts.app')

@section('title', 'Edit Donation Information')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
        @include('layouts.profile-sidebar')
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">Add Last Donation<i></i></div>

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

          <form method="POST" action="{{ route('edit_donation', $donation_history->id) }}">
            @csrf

            <div class="form-group row">
              <label for="donate_at" class="col-md-4 col-form-label text-md-right"><i class="fa fa-calendar"></i> {{ __('Date of Donation') }}</label>

              <div class="col-md-6">
                <div class="form-group text-left" id="donatedatepicker">
                    <div class="input-group date">
                        <span class="input-group-addon"></span><input type="text" class="bfh-datepicker form-control{{ $errors->has('donate_at') ? ' is-invalid' : '' }}" id="donate_at" data-format="y-m-d" data-date="today" name="donate_at" required value="{{ $donation_history->donate_at }}" autocomplete="off">

                        @if ($errors->has('donate_at'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('donate_at') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>

              <div class="col-md-6">
                  <textarea id="details" type="text" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" value="" placeholder="Something that you want to write">{{ $donation_history->details }}</textarea>

                  @if ($errors->has('details'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('details') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Update Donation Date') }}
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
