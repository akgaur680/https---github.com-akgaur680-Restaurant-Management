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
                    <h1>List of All Items.. <a href="/add-item" class="btn btn-primary mr-5" style="float:right">Add Item</a></h1>
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
                                    <th>Item Name</th>
                                    <th>Full Item Price</th>
                                    <th>Half Item Price</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $val )
                                <tr>
                                    <td>{{++$key}}</td>
                                   
                                    <td>{{$val->item_name}}</td>
                                    <td>{{ $val->full_item_price }}</td>
                                    <td>{{ $val->half_item_price }}</td>
                                   </td>
                                    <td>
                                        <form action="{{'delete_item'}}" method="POST">
                                            @csrf
                                            <a href="{{url('/delete_item',['itemid'=>$val['id']])}}" class="btn btn-danger" onclick="return confirm('Do You Want to Delete Item!.')"> Delete</a>
                                            <a href="{{url('/edit_item',['itemid'=>$val['id']])}}" class="btn btn-primary"> Edit</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                    <div class="col-12 text-center">

                        {{$items->links('pagination::bootstrap-5')}}

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection