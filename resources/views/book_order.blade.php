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
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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

                <div class="page-content page-container" id="page-content">
                  <div class="padding">
                    <div class="row container d-flex justify-content-center">
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title text-center fw-bold">Choose Item</h4>

                            <div class="table-responsive">
                              <table id="faqs" class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Item Name</th>
                                    <th>Full or Half</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <select name="menu_items[]" class="form-select">
                                        <option selected>Choose...</option>
                                        @foreach ($menu as $menus )
                                        <option value="{{$menus->id}}">{{$menus->item_name}}</option>
                                        @endforeach
                                      </select>
                                    </td>
                                    <td>
                                      <select name="full_or_half[]" class="form-select">
                                        <option selected >Choose...</option>
                                        <option value="1" >Full</option>
                                        <option value="2" >Half</option>
                                      </select>
                                    </td>
                                    <td>
                                    <input type="number" class="form-control" name="qty[]" placeholder="Quantity" value="{{ old('qty.' . $menus->id) }}">
                                    </td>
                                    <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="text-center"><button type="button" onclick="addfaqs();" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-12 p-2 card">
                  <label for="menu_items" class="form-label">Choose Items :</label>
                  @foreach ($items as $item)
                  <div class="form-check card-item">
                    <input class="form-check-input" type="checkbox" name="menu_items[]" value="{{ $item->id }}" id="menu_{{ $item->id }}">
                    <label class="form-check-label" for="menu_{{ $item->id }}">
                      {{ $item->item_name }}
                    </label>
                    <div class="fw-normal"> 
                    <input type="checkbox" name="">  
                    Full : {{$item->full_item_price}}/- ; Half : @if ($item->half_item_price===NULL) --
                      @else
                      {{$item->half_item_price}}/-
                      @endif
                    </div>
                    <input type="number" class="form-control mt-2" name="qty[{{ $item->id }}]" placeholder="Quantity" value="{{ old('qty.' . $item->id) }}">
                    <span class="text-danger">@error('qty.'. $item->id){{ $message }}@enderror</span>
                  </div>
                  @endforeach
                  <span class="text-danger">@error('menu_items'){{ $message }}@enderror</span>
                </div> -->
                <div class="col-12">
                  <label for="customization" class="form-label">Customization :</label>
                  <textarea type="text" class="form-control" name="customization" placeholder="Add Any Customization Recommended by Customer.." rows="3">{{ old('customization') }}</textarea>
                  <span class="text-danger">@error('customization'){{ $message }}@enderror
                  </span>
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

<script>
  var faqs_row = 0;

  function addfaqs() {
    var html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><select name="menu_items[]" class="form-select"><option selected>Choose...</option>@foreach ($items as $item)<option value="{{$item->id}}">{{$item->item_name}}</option>@endforeach</select></td>';
    html += '<td><select name="full_or_half[]" class="form-select"><option selected>Choose...</option><option value="1">Full</option><option value="2">Half</option></select></td>';
    html += '<td><input type="number" class="form-control" name="qty[]" placeholder="Quantity"></td>';
    html += '<td><button type="button" class="badge badge-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';
    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }
</script>


@endsection
