@extends('layouts.master')
@section('All-Order-Section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 " style="margin: auto;">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                </div>
                <div class="col-sm-6">
                    <h1>View Orders</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card m-auto mb-4" style="width: 90%;">
                        <div class="card-body row">
                            <div class="col-md-3">
                                <form action="" method="get">
                                    <label>Filter By Date</label>
                                    <input type="date" name="date" value="{{ request('date', '') }}"  class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Filter By Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose....</option>
                                    @foreach ($order_status as $order_stat )
                                    <option value="{{ $order_stat->id }}" {{ request('status') == $order_stat->id ? 'selected' : '' }}>
                                        {{ $order_stat->status }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6 m-auto">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="/all-orders" class="btn btn-danger" >Remove Filter </a>
                            </div>
                            </form>

                        </div>

                    </div>

                    <!-- Default box -->
                    <div class="m-auto table-responsive-sm text-center" style="width: 90%;">
                        <table class="table table-hover align-middle table-sm">
                            <thead class="table-dark" style="position: sticky ;">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    @if(Auth::user()['role']=='admin')
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>

                                    @endif
                                    @if (Auth::user()['role']!=='cook')
                                    <th>Cook Name</th>
                                    @endif
                                    @if (Auth::user()['role']!=='waiter')
                                    <th>Waiter Name</th>
                                    @endif
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $orders )
                                <tr>
                                    <td> <a href="{{url('/view-order',['orderid'=>$orders->id])}}"><span class="badge badge-info p-2">{{$orders->id}}</span> </a> </td>
                                    <td>{{$orders->customer_name}}</td>
                                    @if(Auth::user()['role']=='admin')
                                    <td>
                                        @foreach ($orders->menu as $menu )
                                        {{$menu->item_name}},<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($orders->order_menu as $ordermenu )
                                        {{$ordermenu->qty}}, <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($orders->order_total_price === NULL)
                                        0
                                        @else
                                        {{ $orders->order_total_price }}/-
                                        @endif
                                    </td>
                                    @endif
                                    @if (Auth::user()['role']!=='cook')
                                    <td>
                                        {{$orders->cook->name ?? 'N/A'}}
                                    </td>
                                    @endif
                                    @if (Auth::user()['role']!=='waiter')
                                    <td>{{$orders->waiter->name ?? 'N/A'}}</td>
                                    @endif
                                    <td>
                                        @if (Auth::user()['role']=='admin')
                                        <span class="badge badge-primary">{{$orders->order_status->status}}</span>
                                        @else
                                        <span class="badge badge-success">{{$orders->order_status->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{'delete_item'}}" method="POST">
                                            @csrf
                                            @if (Auth::user()['role']=='admin')
                                            <a href="{{url('/delete_order',$orders->id)}}" class="btn btn-danger" onclick="return confirm('Do You Want to Delete Order!.')"> Delete</a>
                                            @endif
                                            <a href="{{url('/view-order',$orders->id)}}" class="btn btn-primary"> Update Status</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection