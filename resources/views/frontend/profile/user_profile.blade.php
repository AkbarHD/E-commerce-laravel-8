{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hi..{{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        This is just home page
    </div>
</x-app-layout> --}}

@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="mb-3 " src="{{ !empty(Auth::user()->profile_photo_path) ? url('upload/admin_images/' . Auth::user()->profile_photo_path) : url('upload/no_images.jpg') }}"
                        alt="" width="130" height="130" style="border-radius: 50%;">

                    <li class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn-primary btn btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile.edit') }}" class="btn-primary btn btn-sm btn-block">Edit Profile</a>
                        <a href="" class="btn-primary btn btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn-danger btn btn-sm btn-block">Logout</a>
                    </li>
                </div>
                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi...</span> <strong>{{ Auth::user()->name }}</strong> Edit Profile</h3>


                        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" name="name" id="name"
                                    class="form-control unicase-form-control text-input" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" name="email"
                                    class="form-control unicase-form-control text-input" value="{{ old('name', $user->email) }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control unicase-form-control text-input" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">Phone Number <span>*</span></label>
                                <input type="file" id="profile_photo_path" name="profile_photo_path"
                                    class="form-control unicase-form-control text-input" >
                                    @error('profile_photo_path')
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
