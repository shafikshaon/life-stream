@extends('layouts.app')

@section('title', 'Upload Profile Picture')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
          @include('layouts.profile-sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Upload Profile Picture<i></i></div>

                <div class="card-body wizard-card">
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

                    <form method="POST" action="{{ route('upload_profile_picture') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-4">
                                <div class="picture-container">
                                    <div class="picture">
                                        <div class="text-center">
                                            @if ($profile->img_path)
                                            <img src="{{asset('uploads/'.$profile->img_path)}}" class="picture-src" id="output_image"/>
                                            @else
                                            <img src="{{asset('img/avatar.png')}}" class="picture-src" id="output_image"/>
                                            @endif
                                            <input type="file" name='image' accept="image/*" onchange="preview_image(event)">
                                        </div>
                                    </div>
                                  </div>

                                @if ($errors->has('current_password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload Profile Picture') }}
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
