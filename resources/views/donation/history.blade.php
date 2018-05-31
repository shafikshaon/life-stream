@extends('layouts.app')

@section('title', 'My Donation History')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      @include('layouts.profile-sidebar')
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">My Donation History<i></i></div>

        <div class="card-body">

          @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ Session::get('success') }}
            </div>
          @endif

          @if(Session::has('deletemessage'))
            <div class="alert alert-danger alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ Session::get('deletemessage') }}
            </div>
          @endif

          @if (count($histories) > 0)
          <table class="table table-bordered text-left">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Donate At</th>
                <th scope="col">Details</th>
                <th scope="col">Added On</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach ($histories as $history)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ Carbon\Carbon::parse($history->donate_at)->toFormattedDateString() }} ( {{ Carbon\Carbon::parse($history->donate_at)->diffForHumans() }} )</td>
                <td>{{ $history->details }}</td>
                <td>{{ $history->created_at->toFormattedDateString() }} ( {{ $history->created_at->diffForHumans() }} )</td>
                <td>
                  <a href="{{ route('edit_donation', [$history->id]) }}"><span style="color: #12b886;"><i class="fas fa-edit"></i></span></a>
                  <a href="{{ route('delete_donation', [$history->id]) }}" data-toggle="confirmation" data-title="Delete donation information?"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
            <p class="text-danger">You haven't donate blood yet</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
