@extends('layouts.app')

@section('page-css')
<style>
    @media screen and (max-width: 600px) {

        .responsive-padding {
            padding: 1.5rem !important;
        }
    }

    }

</style>
@endsection

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7 bg-default" style="height:100vh;">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="content-heading mb-4">
                <span class="text-white text-xl">Add User</span>
                <a class="btn btn-icon btn-primary float-right" href="{{ route('viewuser') }}">
                    <span class="btn-inner--icon"><i class="fa fa-eye"></i></span>
                    <span class="btn-inner--text">View Users</span>
                </a>
            </div>
            <div class="card bg-default responsive-padding p-6">
                <div class="col-md-12 bg-default mx-auto py-2 px-4 rounded">
                    <form method="post" action="{{route('createuser')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label text-white">Email Address</label>
                                    <input class="form-control text-default" required type="email" placeholder="juan@gmail.com" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-control-label text-white">First Name</label>
                                    <input class="form-control text-default" type="text" placeholder="Juan" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-control-label text-white">Last Name</label>
                                    <input class="form-control text-default" type="text" placeholder="Dela Cruz" id="last_name"
                                        name="last_name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation" class="text-white">Select Designation</label>
                                    <select class="form-control text-default" required id="designation" name="designation">
                                        <option value=""  hidden>Select Ledger</option>
                                        <option>Admin</option>
                                        <option>Manager</option>
                                    </select>
                                </div>
                            </div>
                            @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-control-label text-white">Password</label>
                                    <input class="form-control text-default" type="password" placeholder="Password" id="password"
                                        name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-control-label text-white">Confirm Password</label>
                                    <input class="form-control text-default" type="password" placeholder="Confirm Password" id="password_confirmation"
                                        name="password_confirmation">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="text-white">Add Profile Picture</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input text-default" id="image" name="image" lang="en">
                                        <label class="custom-file-label" for="image">Select file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>
@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
