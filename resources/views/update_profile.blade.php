@extends('layouts.master')

@section('update_profile-section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Update Profile</h1>
                </div>
                <div class="container">
                        <form action="{{'/update_profile'}}/{{Auth::user()['id']}}" method="POST" class="row g-3 fw-bolder p-5" style="border-radius:10px ; " enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="col-md-6">
                                <label for="" class="form-label">Name :</label>
                                <input type="text" class="form-control" name="name" id="" value="{{Auth::user()['name']}}">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email" id="" value="{{Auth::user()['email']}}">
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Contact :</label>
                                <input type="number" class="form-control" name="contact" id="" value="{{Auth::user()['contact']}}">
                                <span class="text-danger">
                                    @error('contact')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Date Of Birth :</label>
                                <input type="date" class="form-control" name="dob" id="" value="{{Auth::user()['dob']}}">
                                <span class="text-danger">
                                    @error('dob')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address :</label>
                                <textarea type="text" class="form-control" name="address" placeholder="Address.." rows="3">{{Auth::user()['address']}}</textarea>
                                <span class="text-danger">
                                    @error('address')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Gender :</label>
                                <select name="gender" class="form-select">
                                    <option selected>Choose..</option>
                                    <option value="M" {{Auth::user()['gender']=='M' ? 'selected' : ''}}>Male</option>
                                    <option value="F" {{Auth::user()['gender']=='F' ? 'selected' : ''}}>Female</option>
                                    <option value="O" {{Auth::user()['gender']=='O' ? 'selected' : ''}}>Others</option>
                                </select>
                                <span class="text-danger">
                                    @error('gender')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 row mt-2">
                                <div class="col-md-5 text-center"  >
                                    <img src="{{url(asset('storage/uploads/'.Auth::user()['profile_image']))}}" id="profileimage" width="150px" height="100px">


                                </div>
                                <div class="col-md-7">
                                    <label for="" class="form-label">Profile Image :</label>
                                    <input type="file" name="profile" class="form-control" id="inputCity" value="{{old('profile_image')}}">
                                    <span class="text-danger">
                                        @error('profile_image')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    @endsection