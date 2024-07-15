@extends('layouts.master')

@section('add-menu-section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Menu Items</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form action="{{'add-item'}}" method="post" class="row g-3 fw-bolder p-5" style="border-radius:10px ; " enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label">Item Name :</label>
                        <input type="text" class="form-control" name="item_name" id="" value="{{old('item_name')}}" >
                        <span class="text-danger" >
                            @error('item-name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Full Item Price :</label>
                        <input type="number" class="form-control" name="full_item_price" id="" value="{{old('full_item_price')}}" >
                        <span class="text-danger" >
                            @error('full_item_price')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Half Item Price :</label>
                        <input type="number" class="form-control" name="half_item_price" id="" value="{{old('half_item_price')}}" >
                        <span class="text-danger" >
                            @error('half_item_price')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </div>
                    </form>
                
            <!-- Default box -->
             </div>
             </div>
                 </div>
    </section>
    <!-- /.content -->
  </div>
  

@endsection