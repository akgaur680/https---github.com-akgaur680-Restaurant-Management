@extends('layouts.master')

@section('list-section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="col-12">
                    <h1>List of All Users.. <a href="/adduser" class="btn btn-primary mr-5" style="float:right">Add User</a></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Default box -->
                    <div class="m-auto table-responsive-sm" style="width: 90%;">
                        <table class="table table-hover align-middle table-sm">
                            <thead class="table-dark" style="position: sticky ;">
                                <tr>
                                    <th>#</th>
                                    <th>Profile Image</th>
                                    <th>Designation</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $val )
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        @if($val->profile_image == null)
                                        <img width="100px" height="70px" style="border-radius: 50%;" src="{{url(asset('storage/uploads/default.png'))}}" alt="Profile Image">
                                        @else
                                        <img width="100px" height="70px" style="border-radius: 50%;" src="{{ asset('storage/uploads/'.$val->profile_image) }}" alt="Profile Image">
                                        @endif
                                    </td>
                                    <td>{{$val->role}}</td>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ $val->contact }}</td>
                                    <td>{{ $val->dob }}</td>
                                    <td>
                                        @if ($val->gender == 'M')
                                        Male
                                        @elseif($val->gender == 'F')
                                        Female
                                        @elseif($val->gender == 'O')
                                        Others
                                        @endif
                                    </td>
                                    <td>{{ $val->address }}</td>
                                    <td>
                                        <form action="{{'delete_user'}}" method="POST">
                                            @csrf
                                            <a href="{{url('/delete_user',['userid'=>$val['id']])}}" class="btn btn-danger" onclick="return confirm('Do You Want to Delete User!.')"> Delete</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                    <div class="col-12 text-center">

                        {{$users->links('pagination::bootstrap-5')}}

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection