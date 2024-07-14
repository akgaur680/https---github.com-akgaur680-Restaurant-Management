@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
@yield('index-section')

@yield('adduser-section')
@yield('profile-section')
@yield('list-section')
@yield('update_profile-section')
@yield('book-order-section')

@include('layouts.footer')