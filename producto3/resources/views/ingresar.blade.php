<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Ingresar"])

<body>
    <form action='/ingresar' method='POST' style='display: flex; flex-direction: column;'>
        @csrf
        <span>Ingrese sus datos de usuario</span>
        <div class="form-control">
            <input name='email' type="email" placeholder='Ingrese su email' required />
        </div>
        <div class="form-control">
            <input name='password' type='password' placeholder='Ingrese su password' required />
        </div>
        <div class="form-control">
            <a href='/registro'>No tengo cuenta, registrarme</a>
        </div>
        <button type='submit'>Enviar</button>
        @if ($invalid)
        <h2>Datos introducidos son incorrectos</h2>
        @endif
    </form>
</body>

</html>
