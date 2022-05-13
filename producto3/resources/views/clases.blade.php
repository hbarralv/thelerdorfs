<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Cursos"])
<!-- id_class id_teacher id_course id_schedule name color updated_at created_at -->

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Clases registradas</h2>
    <ul class="table">
        <!-- Se itera la table de $cursos y se imprime un <li> por cada curso que exista en la -->
        @foreach ($clases as $clase)
        <li>
            <div>
                <span style='font-weight: bold'>Clase</span>
                <br />
                {{ $clase->name }}
                <br />
                <span style='font-weight: bold'>Profesor</span>
                <br />
                {{ $clase->teacher->name }}
            </div>
            <div>
                <span style='font-weight: bold'>Curso</span>
                <br />
                {{ $clase->course->name }}
                <div class="{{$clase->color}} color"></div>
            </div>
            <div>
                <!-- Formulario para eliminar la clase, incluye el identificador -->
                <form method='POST' action='/panel/clases/eliminar'>
                    @csrf
                    <input type='hidden' name='id_class' value="{{ $clase->id_class }}" />
                    <button type='submit'>Eliminar clase</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

    <h2>Crear nueva clase</h2>
    <form method='POST' action='/panel/clases'>
        @csrf
        <div class='form-control'>
            <span>Escoja el profesor</span>
            <select placeholder='Nombre del profesor' name='id_teacher'>
                @foreach ($profesores as $profesor)
                <option disabled selected>Seleccione</option>

                <option value="{{ $profesor->id_teacher }}">{{ $profesor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='form-control'>
            <span>Escoja el curso</span>
            <select placeholder='Nombre del curso' name='id_course'>
                @foreach ($cursos as $curso)
                <option disabled selected>Seleccione</option>

                <option value="{{ $curso->id_course }}">{{ $curso->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='form-control'>
            <span>Nombre de la clase</span>
            <input placeholder='Nombre de la clase' name='name' />
        </div>
        <div class='form-control'>
            <span>Color de la clase</span>
            <select placeholder='Color de la clase' type='date' name='color'>
                <option disabled selected>Seleccione</option>
                <option value='red'>Rojo</option>
                <option value='green'>Verde</option>
                <option value='blue'>Azul</option>
                <option value='cyan'>Cyan</option>
                <option value='aquamarine'>Aquamarina</option>
            </select>
        </div>
        <div class='form-control'>
            <span>Horario de la clase</span>
            <select placeholder='Horario para la clase' name='id_schedule'>
                <option disabled selected>Seleccione</option>

                @foreach ($horarios as $horario)
                <option value='{{ $horario->id_schedule }}'>Fecha: {{ $horario->day }} | Hora Inicio: {{ $horario->time_start }} | Hora fin: {{ $horario->time_end}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <button type='submit'>Enviar</button>
    </form>
    <div class='form-control'>
        <a href='/panel'>Volver</a>
    </div>
</body>

</html>