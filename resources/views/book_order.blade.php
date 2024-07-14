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
            <div class="container ">
                <div class="container m-auto"  >    
               
                <form action="{{'book_order'}}" method="post" class="row g-3 fw-bolder p-5" style="border-radius:10px ; " enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="tableno" class="form-label">Table No. :</label>
                        <select name="gender" class="form-select">
                            <option selected >Choose..</option>
                            <option value="M" >1</option>
                            <option value="F" >2</option>
                            <option value="O" >3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <span class="text-danger" >
                            @error('tableno')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Customer Name :</label>
                        <input type="text" class="form-control" name="name" id="" value="{{old('name')}}" >
                        <span class="text-danger" >
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="item" class="form-label">Choose Item :</label>
                        <select name="item" class="form-select">
                            <option selected >Choose..</option>
                            <option value="Corn Pizza" >Corn Pizza</option>
                            <option value="Mergherita Pizza" >Mergherita Pizza</option>
                            <option value="Double Cheese Pizza" >Double Cheese Pizza</option>
                            <option value="Grilled Sandwich">Grilled Sandwich</option>
                            <option value="TIkki Sandwich">TIkki Sandwich</option>
                            <option value="Sprouts Salad">Sprouts Salad</option>
                            <option value="Tandoor Paneer Salad">Tandoor Paneer Salad</option>
                            <option value="Banana Shake">Banana Shake</option>
                            <option value="Milk Shake">Milk Shake</option>
                            <option value="Mango Shake">Mango Shake</option>
                        </select>
                        <span class="text-danger" >
                            @error('item')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Quantity :</label>
                        <input type="number" class="form-control" name="qty" id="" value="{{old('qty')}}">
                        <span class="text-danger" >
                            @error('qty')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Customization :</label>
                        <textarea type="text" class="form-control" name="customization" placeholder="Add Any Customization Recommended by Customer.." rows="3"  >{{old('address')}}</textarea>
                        <span class="text-danger" >
                            @error('customization')
                            {{$message}}
                            @enderror
                        </span>
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