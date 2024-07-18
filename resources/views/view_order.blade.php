<?php

use App\Models\Order_Status;

$order_status = Order_Status::all();
?>
@extends('layouts.master')
@section('View-Order-Section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
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
                                <div class="col-sm-8">
                                    <table class="table table-light">
                                        <tbody class="table-bordered" style="position: sticky ;">
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Item Name</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                            </tr>
                                            @foreach ($order->menu as $menu )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    {{$menu->item_name}}<br>
                                                </td>
                                                <td>
                                                @foreach ($order->order_menu as $order_menu )
                                                @if ($menu->id == $order_menu->menu_id)
                                                   @if($order_menu->full_or_half === 1)Full<br>
                                                   @elseif($order_menu->full_or_half === 2)Half<br>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($order->order_menu as $order_menu )
                                                    @if ($menu->id == $order_menu->menu_id)
                                                    {{($order_menu->qty)}}<br>
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-4">
                                    <table class="table table-light">
                                        <tbody class="" style="position: sticky ;">
                                            <tr>
                                                @if (Auth::user()['role']=='cook')
                                                <th>Customization</th>
                                                @else
                                                <th>Price</th>
                                                @endif
                                            </tr>
                                            @if(Auth::user()['role']=='cook')
                                            <tr>
                                                <td>
                                                    {{$order->customization}}
                                                </td>
                                            </tr>
                                            @endif
                                            @foreach ($order->menu as $menu )

                                            <tr>
                                                <td>
                                                    @foreach ($order->order_menu as $order_menu )
                                                    @if ($menu->id == $order_menu->menu_id)
                                                    @if ($order_menu->full_or_half === 1)
                                                    {{$menu->full_item_price * $order_menu->qty}}<br>
                                                    @elseif($order_menu->full_or_half === 2)
                                                    {{$menu->half_item_price * $order_menu->qty}}<br>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            @if(Auth::user()['role']!=='cook')
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <h6>Total Amount Payable</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6>{{$order->order_total_price}}/-</h6>
                                </div>
                            </div>
                            <hr>
                            @endif
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