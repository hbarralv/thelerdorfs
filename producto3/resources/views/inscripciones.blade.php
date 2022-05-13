<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Inscripciones"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Inscripciones</h2>
    <ul class="table">
        <!-- Se itera la table de $estudiantes y se imprime un <li> por cada estudiante que exista -->
        @foreach ($inscripciones as $inscripcion)
        <li>
            <div>
                <span style='font-weight: bold'>Clase</span>
                <br />
                {{ $inscripcion->class->name }}
                <br />
                <span style='font-weight: bold'>Profesor</span>
                <br />
                {{ $inscripcion->class->teacher->name }}
            </div>
            <div>
                <span style='font-weight: bold'>Curso</span>
                <br />
                {{ $inscripcion->class->course->name }}
                <div class="{{$inscripcion->class->color}} color"></div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class='form-control'>
        <a href='/panel'>Volver</a>
    </div>
</body>

</html>
