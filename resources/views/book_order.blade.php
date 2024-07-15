<?php

use App\Models\Menu;
use App\Models\User;

$items = Menu::all();
$cook = User::all()->where('role', 'cook');

?>

@extends('layouts.master')

@section('book-order-section')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Book Order</h1>
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
          <div class="container">
            <div class="container m-auto">
              <form action="{{ route('res.save_order') }}" method="post" class="row g-3 fw-bolder p-5" style="border-radius:10px;" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="customer_name" class="form-label">Customer Name :</label>
                  <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ old('customer_name') }}">
                  <span class="text-danger">@error('customer_name'){{ $message }} @enderror </span>
                </div>
                <div class="col-md-6">
                  <label for="price" class="form-label">Total Price :</label>
                  <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
                  <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                </div>
                <div class="col-md-12 p-2 card">
                  <label for="menu_items" class="form-label">Choose Items :</label>
                  @foreach ($items as $item)
                  <div class="form-check card-item">
                    <input class="form-check-input" type="checkbox" name="menu_items[]" value="{{ $item->id }}" id="menu_{{ $item->id }}">
                    <label class="form-check-label" for="menu_{{ $item->id }}">
                      {{ $item->item_name }}
                    </label>
                    <input type="number" class="form-control mt-2" name="qty[{{ $item->id }}]" placeholder="Quantity" value="{{ old('qty.' . $item->id) }}">
                    <span class="text-danger">@error('qty.'. $item->id){{ $message }}@enderror</span>
                  
                  </div>
                  
                  @endforeach
                  <span class="text-danger">@error('menu_items'){{ $message }}@enderror</span>
                  
                </div>
                
                <div class="col-12">
                  <label for="customization" class="form-label">Customization :</label>
                  <textarea type="text" class="form-control" name="customization" placeholder="Add Any Customization Recommended by Customer.." rows="3">{{ old('customization') }}</textarea>
                  <span class="text-danger">@error('customization'){{ $message }}@enderror</span>
                </div>
                <div class="col-md-6">
                  <label for="cook_id" class="form-label">Assign to Cook :</label>
                  <select name="cook_id" class="form-select">
                    <option selected>Choose..</option>
                    @foreach ($cook as $cooks)
                    <option value="{{ $cooks->id }}">{{ $cooks->name }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">@error('cook_id'){{ $message }}@enderror</span>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary">Book Order</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

@endsection