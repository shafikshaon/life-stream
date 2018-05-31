@extends('layouts.app')

@section('title', 'Profile Details')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
          @include('layouts.profile-sidebar')
        </div>
        <div class="col-md-8">
            <div class="card text-center">
              <div class="card-header text-center">
                My Profile Details
              </div>
              <div class="text-center">
                @if ($profile->img_path)
                  <img class="card-img-top profileview-picture" src="{{asset('uploads/'.$profile->img_path)}}" alt="{{$user->full_name}}">
                @else
                  <img class="card-img-top profileview-picture" src="{{asset('img/avatar.png')}}" alt="{{$user->full_name}}">
                @endif
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$user->full_name}}</h5>
                <p>{{$user->email}}</p>
                <p>
                    <strong>Gender: </strong>{{ $profile->gender }}
                    <strong>Blood Group: </strong> <span style="color: red;"><i class="fas fa-tint"></i></span> {{ $profile->blood_group }}
                    @if ($profile->date_of_birth)
                        <strong>Date of Birth: </strong>{{ Carbon\Carbon::parse($profile->date_of_birth)->toFormattedDateString() }}
                    @endif
                </p>
                <p>
                    <strong>Upazila/ Thana: </strong>{{ $upazila->upazila_name }}
                    <strong>District: </strong>{{ $district->district_name }}
                    @if ($profile->country)
                        <strong>Country: </strong>{{ $profile->country }}
                    @endif
                </p>
                @if ($profile->phone_number)
                <p>
                    <strong>Phone Number: </strong>
                        +880 {{ $profile->phone_number }}
                        @if ($profile->is_show_phone_number)
                            <span style="color: green;">
                                <i class="fas fa-check-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show in public profile"></i>
                            </span>
                        @else
                            <span style="color: red;">
                                <i class="fas fa-times-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Doesn't show in public profile"></i>
                            </span>
                        @endif
                </p>
                @endif

                {{--@if ($donation)
                    <p class="card-text"><strong>Last Blood Donate: </strong>{{ Carbon\Carbon::parse($donation->donate_at)->toFormattedDateString() }}</p>
                @endif --}}

                <a href="#" class="btn btn-primary">Edit Profile</a>
                <a href="#" class="btn btn-danger">Add Donation</a>
                <a href="#" class="btn btn-success">Donation History</a>
              </div>
              <div class="card-footer text-muted">
                <strong>Joined:</strong> {{$profile->created_at->diffForHumans()}}
                <strong>Last Update:</strong> {{$profile->updated_at->diffForHumans()}}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
