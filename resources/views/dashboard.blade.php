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
                        <h3 class="text-center"><span class="text-danger">Hi...</span> <strong>{{ Auth::user()->name }}</strong> Welcome To AkbarStore</h3>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
