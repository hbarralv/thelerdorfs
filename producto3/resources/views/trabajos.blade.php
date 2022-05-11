<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Trabajo"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Trabajos registrados</h2>
    <ul class="table">
        <!-- Se itera la table de $cursos y se imprime un <li> por cada curso que exista en la -->
        @foreach ($trabajos as $trabajo)
        <li>
            <div>
                <span style='font-weight: bold'>Nombre</span>
                <br />
                {{ $trabajo->name }}
                <br />
                <span style='font-weight: bold'>Fecha</span>
                <br />
                {{ $trabajo->date }}
            </div>
            <div>
                <span style='font-weight: bold'>Estudiante</span>
                <br />
                {{ $trabajo->student->name }} {{ $trabajo->student->surname }}
            </div>
            <div>
                <span style='font-weight: bold'>Clase</span>
                <br />
                {{ $trabajo->class->name }}
            </div>
            @if ($rol === 'PROFESOR' || $rol === 'ADMIN')
            <div>
                <span style='font-weight: bold'>Nota</span>
                <br />
                <form method='POST' action='/panel/trabajos/nota'>
                    @csrf
                    <input name='mark' value="{{ $trabajo->mark }}" style="margin-bottom: 2px" />
                    <input type='hidden' value='{{ $trabajo->id_work }}' name='id_work' placeholder="Ingrese una nota para el trabajo" />
                    <button type='submit'>Guardar nota</button>
                </form>
            </div>
            <div>
                <!-- Formulario para eliminar el curso, incluye el identificador -->
                <form method='POST' action='/panel/trabajos/eliminar'>
                    @csrf
                    <input type='hidden' value='{{ $trabajo->id_work }}' name='id_work' />
                    <button type='submit'>Eliminar trabajo</button>
                </form>
            </div>
            @endif
            @if ($rol === 'ESTUDIANTE' && $trabajo->mark)
            <div>
                <span style='font-weight: bold'>Nota</span>
                <br />
                {{ $trabajo->mark }}
                <br />
            </div>
            @endif
        </li>
        @endforeach
    </ul>

    @if ($rol === 'PROFESOR' || $rol === 'ADMIN')
    <h2>Crear nuevo trabajo</h2>
    <form method='POST' action='/panel/trabajos'>
        @csrf
        <div class='form-control'>
            <input placeholder='Nombre trabajo' type='text' name='name' />
        </div>
        <div class='form-control'>
            <input type='date' name='date' placeholder='Fecha de entrega' />
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