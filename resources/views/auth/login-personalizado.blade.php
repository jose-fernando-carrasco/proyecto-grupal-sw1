<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="chk" aria-hidden="true">Registrar Cuenta</label>
                <input type="text" id="name" name="name" placeholder="nombre" required="" autofocus>
                <input type="email" id="email" name="email" placeholder="correo" required="">
                <input type="password" id="password" name="password" placeholder="contraseña" required="">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="confirmar contraseña" required="">
                <button type="submit">registrarse</button>
            </form>
        </div>

        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="chk" aria-hidden="true">Iniciar Sesion</label>
                <input type="email" id="email1" name="email" placeholder="correo" required="">
                <input type="password" id="password1" name="password" placeholder="contraseña" required="">
                <button type="submit">registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>