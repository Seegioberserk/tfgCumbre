<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('titulo')</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/rol.css') }}">
</head>
<body>

  <!-- Logo superior -->
  <header class="top-header">
    <img src="{{asset('storage/general/panel.png')}}" alt="Take a Hike" class="logo">
  </header>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="cart-icon">
        <img src="{{asset('storage/general/logo.png')}}" alt="Take a Hike" class="logoCarrito">
    </div>

    <ul class="nav-ini">     
      <li><a href="{{ route('index.rol') }}">Rol</a></li>
      <li><a href="{{ route('index.usuario') }}">Usuario</a></li>
      <li><a href="{{ route('index.permiso') }}">Permisos</a></li>
      <li><a href="#">Equipos</a></li>
      <li><a href="#">Categoria</a></li>
    </ul>


    <ul class="nav-fin">    
      {{-- <li><a href="{{ route('welcome') }}">Logout</a></li> --}}
    </ul>
  </nav>


  <section class="hero">
    <div class="hero-content">
        @yield('contenido')
    </div>
  </section>

  <style>

  </style>
</body>
</html>
