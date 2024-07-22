@extends('layouts.master')
@section('View-Order-Section')
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
                <div class="col-sm-6">
                    <h1>View Order Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <!-- Default box -->
                    <div class="text-center card" style="width:70%; margin:auto;">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="p-2"><u>Order Details</u></h3>
                                <br><br>
                                <div class="col-sm-6">
                                    <h6>Customer Name : <u> <span>{{$order->customer_name}}</span></u> </h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6>Status : <span class="badge badge-primary">{{$order->order_status->status}}</span> </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="container row">
                                <h5>Order Description</h5>
                                <hr>
                                <div class="col-sm-12">
                                    <table class="table table-light">
                                        <tbody class="table-bordered" style="position: sticky ;">
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Item Name</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                                <th>Per Item Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                            @foreach ($order['order_menu'] as $menu )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    {{$menu['menu']['item_name']}}<br>
                                                </td>
                                                <td>
                                                    {{$menu['full_or_half'] == 1 ? 'Full' : 'Half'}}
                                                </td>
                                                <td>
                                                    {{$menu['qty']}}
                                                </td>
                                                <td>
                                                    {{ $menu['full_or_half'] == 1 ? ($menu['menu']['full_item_price']) : ($menu['menu']['half_item_price'])}}
                                                </td>
                                                <td>
                                                    {{ $menu['full_or_half'] == 1 ? ($menu['menu']['full_item_price'] * $menu['qty']) : ($menu['menu']['half_item_price'] * $menu['qty'])}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr style="border-top:2px solid">
                                                @if(Auth::user()['role']!=='cook')
                                                <td colspan="5">
                                                    Total Amount Payable
                                                </td>
                                                <td>
                                                    {{$order['order_total_price']}}/-
                                                </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <hr>

                            <form action="{{'/update_order_status'}}/{{$order->id}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6 mt-2">
                                    <label for="status_id" class="form-label">Update The Order Status :</label>
                                    <select name="status_id" class="form-select">
                                        <option selected>Choose..</option>
                                        @foreach ($order_status as $orders )
                                        <option value="{{ $orders->id }}">{{ $orders->status }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('status_id'){{ $message }}@enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary m-3">Update Status</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
<!-- /.content -->
</div>
@endsection