<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1495195134817-aeb325a55b65?q=80&w=1776&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
        }

        form:hover {
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
                <div class="container m-auto" style="width: 50%;">
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <u>
                        <h2 class="text-center fw-bolder mb-5"> Login Here</h2>
                    </u>
                    <form action="{{'login'}}" method="post" class="row g-3 fw-bolder p-5" style="border-radius:10px ; ">
                        @csrf
                        <div class="col-md-12">
                            <label for="" class="form-label">Email :</label>
                            <input type="email" class="form-control" name="email" id="" value="{{old('email')}}">
                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Password :</label>
                            <input type="password" class="form-control" name="password" id="" value="{{old('password')}}">
                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="/forgot_password">Forget Password</a>
                        </div>

                        <div>
                            If You are Not Registered Please <a href="{{'/signup'}}">Signup Here</a>
                        </div>
                    </form>

                </div>
            </div>


        </div>

    </div>
</body>

</html>