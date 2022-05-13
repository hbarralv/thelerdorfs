<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Registro de usuario"])

<body>
    <form action='/registro' method='POST' style='display: flex; flex-direction: column;'>
        @csrf
        <span>Ingrese sus datos de estudiante</span>
        <div class="form-control">
            <input name='username' type='text' placeholder='Ingrese su nombre de usuario' />
        </div>
        <div class="form-control">

            <input name='email' type='email' placeholder='Ingrese su email' />
        </div>
        <div class="form-control">

            <input name='telephone' type='tel' placeholder='Ingrese su teléfono' />

        </div>
        <div class="form-control">

            <input name='nif' type='text' placeholder='Ingrese su NIF' />
        </div>
        <div class="form-control">

            <input name='name' type='text' placeholder='Ingrese su nombre' />
        </div>
        <div class="form-control">

            <input name='surname' type='text' placeholder='Ingrese su apellido' />
        </div>
        <div class="form-control">

            <input name='pass' type='password' placeholder='Ingrese su password' />
        </div>
        <div class="form-control">

            <select name='type' placeholder='Escoja su rol en la aplicación'>
                <option selected disabed value=''>Escoja su rol en la aplicación</option>
                <option value='ESTUDIANTE'>Estudiante</option>
                <option value='PROFESOR'>Profesor</option>
            </select>
        </div>
        <button type='submit'>Enviar</button>
    </form>
    @if ($done)
    @if ($type == 'ESTUDIANTE')
    <h2>Se ha registrado correctamente como estudiante</h2>
    @endif
    @if ($type == 'PROFESOR')
    <h2>Se ha registrado correctamente como profesor</h2>
    @endif
    @endif
    @if ($duplicado)
    <h2>El email que ingresó está actualmente en uso</h2>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h2>{{ $error }}</h2>
        @endforeach
    @endif

    <div class="form-control">
        <a href='/ingresar'>Volver a ingresar</a>
    </div>
</body>

</html>
