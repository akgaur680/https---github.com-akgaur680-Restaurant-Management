@extends('layouts.master')

@section('adduser-section')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="col-sm-6">
                    <h1>Add New Employee</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <form action="{{'adduser'}}" method="post" class="row g-3 fw-bolder p-5" style="border-radius:10px ; " enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="" class="form-label">Name :</label>
                            <input type="text" class="form-control" name="name" id="" value="{{old('name')}}">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Email :</label>
                            <input type="email" class="form-control" name="email" id="" value="{{old('email')}}">
                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Contact :</label>
                            <input type="number" class="form-control" name="contact" id="" value="{{'contact'}}">
                            <span class="text-danger">
                                @error('contact')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Password :</label>
                            <input type="password" class="form-control" name="password" id="" value="{{old('password')}}">
                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Profile Pic :</label>
                            <input type="file" class="form-control" name="profile" id="" value="{{old('profile')}}">
                            <span class="text-danger">
                                @error('profile')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Select Role</label>
                            <select name="role" class="form-select">
                                <option selected>Choose..</option>
                                <option value="cook">Cook</option>
                                <option value="waiter">Waiter</option>
                            </select>
                            <span class="text-danger">
                                @error('role')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Add New User</button>
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection