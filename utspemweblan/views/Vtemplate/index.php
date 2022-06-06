<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Signin Template · Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="#" aria-label="Product">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false">
          <title>Product</title>
          <circle cx="12" cy="12" r="10" />
          <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
        </svg>
      </a>
      <a class="py-2 d-none d-md-inline-block" href="index.php">Beranda</a>
      <a class="py-2 d-none d-md-inline-block" href="tiket.php">Tiket</a>
      <a class="py-2 d-none d-md-inline-block" href="jadwal.php">Jadwal</a>
      <a class="py-2 d-none d-md-inline-block" href="data_KA.php">Data KA</a>
      <a class="py-2 d-none d-md-inline-block" href="login.php">Login</a>
      <a class="py-2 d-none d-md-inline-block" href="#">Tentang</a>

    </div>
  </nav>
  <div class="container mt-5">
    <form class="form-signin" method="POST" action="">
      <img class=" mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="container col-sm-4">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="nama" class="form-control" placeholder="Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="tombol">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
      </div>
    </form>
  </div>
</body>

</html>