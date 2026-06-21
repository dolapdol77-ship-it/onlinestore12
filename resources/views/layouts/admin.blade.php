<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin - Online Store')</title>
</head>
<body>
  <div class="d-flex">
    <div class="fixed bg-secondary text-white p-3 min-vh-100">
      <span class="profile-font">Admin User</span>
      <hr/>
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- Admin - Home</a></li>
        <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- Admin - Products</a></li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Go back to the home page</a>
        </li>
      </ul>
    </div>
    <div class="content-grey flex-grow-1 p-4">
      @yield('content')
    </div>
  </div>

  <div class="copyright py-4 text-center text-white">
    <small>Copyright - Online Store</small>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>