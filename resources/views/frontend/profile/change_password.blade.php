@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="mb-3 " src="{{ !empty(Auth::user()->profile_photo_path) ? url('upload/user_images/' . Auth::user()->profile_photo_path) : url('upload/no_images.jpg') }}"
                        alt="" width="130" height="130" style="border-radius: 50%;">

                    <li class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn-primary btn btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile.edit') }}" class="btn-primary btn btn-sm btn-block">Edit Profile</a>
                        <a href="{{ route('change.password') }}" class="btn-primary btn btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn-danger btn btn-sm btn-block">Logout</a>
                    </li>
                </div>
                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Change Password</span></h3>


                        <form action="{{ route('user.password.update') }}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Current Password <span>*</span></label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control unicase-form-control text-input" >
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">New Password <span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control unicase-form-control text-input" >
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <button type="submit" class="btn btn-success ">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
