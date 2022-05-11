<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Horarios"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Horarios disponibles</h2>
    <ul class="table">
        <!-- Se itera la table de $cursos y se imprime un <li> por cada curso que exista en la -->
        @foreach ($horarios as $horario)
        <li>
            <div>
                <span style='font-weight: bold'>Hora inicio</span>
                <br />
                {{ $horario->time_start }}
                <br />
                <span style='font-weight: bold'>Hora fin</span>
                <br />
                {{ $horario->time_end }}
            </div>
            <div>
                <span style='font-weight: bold'>Día</span>
                <br />
                {{ $horario->day }}
            </div>
            <div>
                <!-- Formulario para eliminar el curso, incluye el identificador -->
                <form method='POST' action='/panel/horarios/eliminar'>
                    @csrf
                    <input type='hidden' value='{{ $horario->id_schedule }}' name='id_schedule' />
                    <button type='submit'>Eliminar horario</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

    <h2>Crear nuevo horario</h2>
    <form method='POST' action='/panel/horarios'>
        @csrf
        <div class='form-control'>

            <input placeholder='Fecha inicio' type='time' name='time_start' />
        </div>
        <div class='form-control'>
            <input placeholder='Fecha fin' type='time' name='time_end' />
        </div>
        <div class='form-control'>
            <input type='date' name='day' placeholder='Fecha del horario' />
        </div>
        <button type='submit'>Enviar</button>
    </form>
    <div class='form-control'>
        <a href='/panel'>Volver</a>
    </div>
</body>

</html>