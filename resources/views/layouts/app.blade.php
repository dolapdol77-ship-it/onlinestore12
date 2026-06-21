<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Online Store')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="#">Online Store</a>
      <div class="collapse navbar-collapse">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
          <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
          <a class="nav-link active" href="{{ route('home.about') }}">About</a>
          <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>

          @auth
          <a class="nav-link active" href="{{ route('order.index') }}">My orders</a>
            @if(Auth::user()->getRole() == 'admin')
              <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin</a>
            @endif
            <a class="nav-link active" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @else
            <a class="nav-link active" href="{{ route('login') }}">Login</a>
            <a class="nav-link active" href="{{ route('register') }}">Register</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container">
      <h2>@yield('subtitle', 'A Laravel Online Store')</h2>
    </div>
  </header>

  <div class="container my-4">
    @yield('content')
  </div>

  <div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright - Online Store</small></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>