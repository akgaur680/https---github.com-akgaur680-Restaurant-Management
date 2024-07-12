<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item m-auto">
          <div class="image">

            @if(Auth::user()['profile_image']=="")
            <img width="70px" height="50px" style="border-radius: 50%;" src="{{asset('storage/uploads/default.png')}}" alt="Profile Image">
           
            @else
            <img width="70px" height="50px" style="border-radius: 50%;" src="{{asset('storage/uploads/'.Auth::user()['profile_image'])}}" alt="Profile Image">
            @endif
          </div>
        </li>
        <li class="nav-item m-auto ">
        <div class="info m-2">
        <a href="#" class="d-block fw-bolder" style="text-decoration:none; color:black;" >{{Auth::user()['name']}}</a>
      </div>
        </li>
        <li class="nav-item m-auto">
          <form action="{{'/logout'}}" class=" mr-5" method="post">
            @csrf
            <button type="submit" class="" style="background: none; border:none;">
              <i class="fa-solid fa-right-from-bracket fa-lg"></i></button>
          </form>
        </li>


      </ul>  </nav>