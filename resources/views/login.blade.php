<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Iniciar sesión</title>

  <!-- Enlace a tu CSS -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <main class="page-wrapper">
    <div class="card">
      <!-- Panel izquierdo -->
      <section class="left">
        <h1 class="title">SISTEMA DE SERVICIO TECNICO</h1>
        <p class="subtitle">Inicia sesión en tu cuenta</p>

        <form action="{{ route('sendlogin') }}" method="POST">
          @csrf

          <div class="field">
            <label class="sr-only" for="email">Usuario</label>
            <input id="email" type="text" name="name" placeholder="Usuario" required>
          </div>

          <div class="field">
            <label class="sr-only" for="password">Contraseña</label>
            <input id="password" type="password" name="password" placeholder="Contraseña" required>
          </div>

          @if (session('errorUser'))
            <p class="error">{{ session('errorUser') }}</p>
          @endif

          <button class="btn" type="submit">Iniciar sesión</button>

          <p class="muted">
            ¿No tienes cuenta?
            <a href="#" onclick="alert('Comunícate con el administrador del sistema para que te cree un acceso a la aplicación.')">
              Haz clic aquí
            </a>
          </p>
        </form>
      </section>

      <!-- Panel derecho con imagen -->
      <aside class="right">
        <div class="overlay"></div>
        <div class="welcome">
          <h2>¡Bienvenido de nuevo!</h2>
          <p>
            Accede para continuar con tu aplicación. Si no tienes cuenta puedes registrarte y
            empezar a usar todas las funcionalidades.
          </p>
        </div>
      </aside>
    </div>
  </main>
</body>
</html>
