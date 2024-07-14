@extends('layouts.master')


@section('profile-section')


<!-- Content Wrapper. Contains page content -->
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
                <section class="container bg-light" style="border-radius: 10px;">
                    <div>
                        <h2>My Profile</h2>

                        <div class="container row">
                            <div class="col-sm-3 m-2 text-center">
                                <div>
                                    @if(Auth::user()['profile_image']==null)
                                    <img src="{{url(asset('storage/uploads/default.png'))}}" width="200px" height="200px">
                                    @else
                                    <img src="{{url(asset('storage/uploads/'.Auth::user()['profile_image']))}}" id="profileimage" width="200px" height="200px">
                                    @endif
                                </div>

                            </div>
                            <div class="col-sm-8 m-2">
                                <div class="container p-1" style="background-color:#3b5998; border-radius:10px; color:white; height:50px;">
                                    <h3>My Profile <a href="{{url('/edit_profile',['userid'=>Auth::user()['id']])}}" style="text-decoration:none; color:black; float:right;"><i class="fa-solid fa-pen-to-square"></i></a> </h3>
                                  
                                </div>
                                <div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <table class="profile table table-bordered text-center" style="table-layout:fixed;">
                                                <thead>
                                                    <tr>
                                                        <th> Name:</th>
                                                        <td>{{Auth::user()['name']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Email:</th>
                                                        <td style="overflow: hidden;">{{Auth::user()['email']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Contact No. :</th>
                                                        <td>{{Auth::user()['contact']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Gender:</th>
                                                        <td>
                                                            @if (Auth::user()['gender']=='M')Male
                                                            @elseif (Auth::user()['gender']=='F')Female
                                                            @elseif (Auth::user()['gender']=='O')Others
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table table-bordered profile ">
                                                <thead>
                                                    <tr>
                                                        <th> Date Of Birth:</th>
                                                        <td>{{Auth::user()['dob']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> Address:</th>
                                                        <td>{{Auth::user()['address']}}</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin: 0% 5%;  width:90%;" class="p-1">

                            @if(Auth::user()['role']=='admin')
                            <a href="/admin/index">
                                @elseif(Auth::user()['role']=='user')
                                <a href="/index">
                                    @endif
                                <input name="reset" value="Close" class="btn btn-danger"></a>
                            <p>If You have any issue, Please <a href="contact.php" style="text-decoration: none;">
                                    Contact Us..</a></p>
                        </div>
                    </div>
                </section>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

</div>
<!-- /.content-wrapper -->


@endsection