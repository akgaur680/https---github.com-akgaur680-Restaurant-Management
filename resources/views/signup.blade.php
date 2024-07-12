<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1495195134817-aeb325a55b65?q=80&w=1776&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
            
        }
        form:hover{
            box-shadow: 0 0 20px white;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="container">
            <div>
                <img src="">
            </div>
            <div class="container ">
                <div class="container m-auto"  >    
                <u><h2 class="text-center fw-bolder mb-5" > Sign Up Here</h2></u>
                <form action="{{'signup'}}" method="post" class="row g-3 fw-bolder p-5" style="border-radius:10px ; " enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label">Name :</label>
                        <input type="text" class="form-control" name="name" id="" value="{{old('name')}}">
                        <span class="text-danger" >
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email :</label>
                        <input type="email" class="form-control" name="email" id="" value="{{old('email')}}" >
                        <span class="text-danger" >
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Contact :</label>
                        <input type="number" class="form-control" name="contact" id="" value="{{'contact'}}">
                        <span class="text-danger" >
                            @error('contact')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Date Of Birth :</label>
                        <input type="date" class="form-control" name="dob" id="" value="{{old('dob')}}">
                        <span class="text-danger" >
                            @error('dob')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address :</label>
                        <textarea type="text" class="form-control" name="address" placeholder="Address.." rows="3"  >{{old('address')}}</textarea>
                        <span class="text-danger" >
                            @error('address')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" id="" value="{{old('password')}}">
                        <span class="text-danger" >
                            @error('password')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Confirm Password :</label>
                        <input type="password" class="form-control" name="confirm_password" id="" value="{{old('confirm_password')}}" >
                        <span class="text-danger" >
                            @error('confirm_password')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Gender :</label>
                        <select name="gender" class="form-select">
                            <option selected >Choose..</option>
                            <option value="M" >Male</option>
                            <option value="F" >Female</option>
                            <option value="O" >Others</option>
                        </select>
                        <span class="text-danger" >
                            @error('gender')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Profile Image :</label>
                        <input type="file" name="profile_image" class="form-control" id="inputCity" value="{{old('profile_image')}}" >
                        <span class="text-danger" >
                            @error('profile_image')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                    <div>
                        If You are Already Registered Please <a href="{{'/login'}}">Login Here</a>
                    </div>
                </form>
                </div>
            </div>

        </div>

    </div>
</body>

</html>