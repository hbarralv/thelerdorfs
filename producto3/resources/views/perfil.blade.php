<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Perfil"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Modificación del perfil del estudiante</h2>
    <form action='/perfil' method='POST' style='display: flex; flex-direction: column;'>
        @csrf
        <span>Ingrese sus datos de estudiante</span>
        <div class="form-control">
            <label>Nombre de usuario</label>
            <input name='name' type='text' value="{{$estudiante->username}}" disabled="disabled" />
        </div>
        <div class="form-control">
            <label>Correo electrónic</label>
            <input name='email' type='email' value="{{$estudiante->email}}" placeholder='Ingrese su email' />
        </div>
        <div class="form-control">
            <label>Teléfono</label>
            <input name='telephone' type='tel' value="{{$estudiante->telephone}}" disabled="disabled"  />
        </div>
        <div class="form-control">
            <label>NIF</label>
            <input name='nif' type='text' value="{{$estudiante->nif}}" disabled="disabled" />
        </div>
        <div class="form-control">
            <label>Nombre</label>
            <input name='name' type='text' value="{{$estudiante->name}}" placeholder='Ingrese su nombre' />
        </div>
        <div class="form-control">
            <label>Apellido</label>
            <input name='surname' type='text' value="{{$estudiante->surname}}" placeholder='Ingrese su apellido' />
        </div>
        <div class="form-control">
            <input name='pass' type='password' placeholder='Ingrese su nueva password' />
        </div>
        <button type='submit'>Guardar nuevos datos</button>
    </form>
    @if ($done)
    <h2>Se han registrado correctamente los cambios.</h2>
    @endif
    @if ($duplicado)
    <h2>Este correo ya existe.</h2>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h2>{{ $error }}</h2>
        @endforeach
    @endif
</body>

</html>
