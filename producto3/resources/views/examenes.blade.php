<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Trabajo"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Exámenes registrados</h2>
    <ul class="table">
        <!-- Se itera la table de $cursos y se imprime un <li> por cada curso que exista en la -->
        @foreach ($examenes as $examen)
        <li>
            <div>
                <span style='font-weight: bold'>Nombre</span>
                <br />
                {{ $examen->name }}
                <br />
                <span style='font-weight: bold'>Fecha</span>
                <br />
                {{ $examen->date }}
            </div>
            <div>
                <span style='font-weight: bold'>Estudiante</span>
                <br />
                {{ $examen->student->name }}
                {{ $examen->student->surname }}
            </div>
            <div>
                <span style='font-weight: bold'>Clase</span>
                <br />
                {{ $examen->class->name }}
                <br />
            </div>
            @if ($rol === 'PROFESOR' || $rol === 'ADMIN')

            <div>
                <span style='font-weight: bold'>Nota</span>
                <br />
                <form method='POST' action='/panel/examenes/nota'>
                    @csrf
                    <input name='mark' value="{{ $examen->mark }}" style="margin-bottom: 2px" />
                    <input type='hidden' value='{{ $examen->id_exam }}' name='id_exam' placeholder="Ingrese una nota para el examen" />
                    <button type='submit'>Guardar nota</button>
                </form>
                <div>
                    <!-- Formulario para eliminar el curso, incluye el identificador -->
                    <form method='POST' action='/panel/examenes/eliminar'>
                        @csrf
                        <input type='hidden' value='{{ $examen->id_exam }}' name='id_exam' />
                        <button type='submit'>Eliminar examen</button>
                    </form>
                </div>
            </div>
            @endif

            @if ($rol === 'ESTUDIANTE' && $examen->mark)
            <div>
                <span style='font-weight: bold'>Nota</span>
                <br />
                {{ $examen->mark }}
                <br />
            </div>
            @endif
        </li>
        @endforeach
    </ul>

    @if ($rol === 'PROFESOR' || $rol === 'ADMIN')
    <h2>Crear nuevo exámen</h2>
    <form method='POST' action='/panel/examenes'>
        @csrf
        <div class='form-control'>
            <input placeholder='Nombre examen' type='text' name='name' />
        </div>
        <div class='form-control'>
            <input type='date' name='date' placeholder='Fecha de presentación' />
        </div>
        <div class="form-control">
            <select name='id_student'>
                <option selected disabled>Seleccione estudiante</option>
                @foreach ($estudiantes as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <select name='id_class'>
                <option selected disabled>Seleccione clase</option>
                @foreach ($clases as $clase)
                <option value="{{ $clase->id_class }}">{{ $clase->name }}</option>
                @endforeach
            </select>
        </div>
        <button type='submit'>Enviar</button>
    </form>
    @endif
    <div class='form-control'>
        <a href='/panel'>Volver</a>
    </div>
</body>

</html>