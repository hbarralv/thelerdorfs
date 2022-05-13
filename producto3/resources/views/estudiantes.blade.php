<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Estudiantes"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Estudiantes registrados</h2>
    <ul class="table">
        <!-- Se itera la table de $estudiantes y se imprime un <li> por cada estudiante que exista -->
        @foreach ($estudiantes as $estudiante)
        <li>
            <div>
                <span style='font-weight: bold'>Nombre</span>
                <br />
                {{ $estudiante->name }}
                <br />
                <span style='font-weight: bold'>Apellido</span>
                <br />
                {{ $estudiante->surname }}
                <br />
                <span style='font-weight: bold'>Email</span>
                <br />
                {{ $estudiante->email }}
                <br />
                <span style='font-weight: bold'>Teléfono</span>
                <br />
                {{ $estudiante->telephone }}
                <br />
            </div>
        </li>
        @endforeach
    </ul>
    <div class='form-control'>
        <a href='/panel'>Volver</a>
    </div>
</body>

</html>
