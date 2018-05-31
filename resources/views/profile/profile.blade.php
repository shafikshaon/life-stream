@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
        @include('layouts.profile-sidebar')
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">Welcome! <i>{{ $user->full_name }}</i></div>

        <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <table class="table borderless text-left">
            @if ($profile->blood_group)
            <tr>
                <td><span style="color: red;"><i class="fas fa-tint"></i></span> Blood Group</td>
                <td>:</td>
                <td>{{ $profile->blood_group }}</td>
            </tr>
            @endif

            @if ($profile->date_of_birth)
            <tr>
                <td><span style="color: rgb(165, 182, 250);"><i class="fas fa-birthday-cake"></i></span> Date of Birth</td>
                <td>:</td>
                <td>{{ $profile->date_of_birth }}</td>
            </tr>
            @endif

            @if ($profile->phone_number)
            <tr>
                <td><span style="color: #2479db;"><i class="fas fa-phone"></i></span> Phone Number</td>
                <td>:</td>
                <td>
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
                </td>
            </tr>
            @endif

            @if ($profile->is_show_email)
            <tr>
                <td><span style="color: #2479db;"><i class="fas fa-envelope-open"></i></span> Email</td>
                <td>:</td>
                <td>
                    {{ $user->email }}
                    @if ($profile->is_show_email)
                        <span style="color: green;">
                            <i class="fas fa-check-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show in public profile"></i>
                        </span>
                    @else
                        <span style="color: red;">
                            <i class="fas fa-times-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Doesn't show in public profile"></i>
                        </span>
                    @endif
                </td>
            </tr>
            @endif

            <tr>
                <td><span style="color: #000;"><i class="fas fa-calendar-alt"></i></span> Date Joined</td>
                <td>:</td>
                <td>{{ $user->created_at->toFormattedDateString() }} ( {{ $user->created_at->diffForHumans() }} )</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
