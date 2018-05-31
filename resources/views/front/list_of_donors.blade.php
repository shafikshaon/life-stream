@extends('layouts.app')
@section('title', 'Donors')

@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6">
          <h4>Total <span style="color: green;">{{$users->count()}}</span>  donor(s) found</h4>
          <br>
          @foreach($users as $user)
          <div class="media text-left p-2 user-grid mb-2 rounded-right">
              <?php
                  $profile = DB::table('profiles')->where('user_id', $user->id)->first();
                  $upazila = App\Upazila::where('id', $profile->upazila)->first();
                  $district = App\District::where('id', $profile->district)->first();
              ?>
              @if ($profile->img_path)
                <img class="align-self-center mr-3" src="{{asset('uploads/'.$profile->img_path)}}" alt="{{$user->full_name}}" style="width: 80px; height: 80px;">
              @else
                <img class="align-self-center mr-3" src="{{asset('img/avatar.png')}}" alt="{{$user->full_name}}" style="width: 80px; height: 80px;">
              @endif

              <div class="media-body">
                  <h5 class="pb-2 mt-1">{{ $user->full_name }}
                      {{-- @if ($days > 0 && $days <= 120)
                          <span class="badge badge-danger">Not Available</span>
                      @else
                          <span class="badge badge-success">Available</span>
                      @endif --}}
                  </h5>
                  <p class="mb-1">
                    <strong>Blood Group: </strong> <span style="color: red;"><i class="fas fa-tint"></i></span> {{ $profile->blood_group }}
                  </p>

                  <p class="mb-1">
                    @if ($profile->is_show_phone_number)
                      <strong>Phone Number: </strong>+880 {{ $profile->phone_number }}
                    @endif
                  </p>
                  <p class="mb-1">
                    @if ($profile->is_show_email)
                      <strong>Email: </strong>{{ $user->email }}
                    @endif
                  </p>

                  <p class="mb-1">
                      <strong>Present Address: </strong>{{ $upazila->upazila_name }}, {{ $district->district_name }}
                  </p>

                  {{-- <p class="mb-1">
                      <strong>Total Blood Donate: </strong>{{$donation }} Times
                  </p> --}}

                  {{-- @if ($donation > 0)
                  <p class="mb-1">
                      <strong>Last Donate: </strong>{{ Carbon\Carbon::parse($last_donation->donate_at)->toFormattedDateString() }} ({{ Carbon\Carbon::parse($last_donation->donate_at)->diffForHumans() }})
                  </p>
                  @endif --}}

              </div>
                <a href="#" class="btn btn-primary align-self-center mr-3">View Profile</a>
            </div>
            @endforeach
            <div class="pagination justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
