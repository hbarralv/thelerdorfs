<!DOCTYPE html>
<html lang="en">
@include('head', ['title' => "Panel - Cursos"])

<body>
    <h1>Bienvenido a su área de usuario</h1>
    <!-- Incluimos la navegación -->
    @include('nav')
    <h2>Cursos disponibles</h2>
    <ul class="table">
        <!-- Se itera la table de $cursos y se imprime un <li> por cada curso que exista en la -->
        @foreach ($cursos as $curso)
        <li>
            <div>
                <span style='font-weight: bold'>Curso</span>
                <br />
                {{ $curso->name }}
                <br />
                <span style='font-weight: bold'>Descripción</span>
                <br />
                {{ $curso->description }}
            </div>
            <div>
                <span style='font-weight: bold'>Fecha inicio</span>
                <br />
                {{ $curso->date_start }}
                <br />
                <span style='font-weight: bold'>Fecha fin</span>
                <br />
                {{ $curso->date_end }}
            </div>
            <div>
                <!-- Formulario para enviar cambio de estado al curso, incluye el identificador -->
                <form method='POST' action='/panel/cursos/cambiar-estado' style='margin-bottom: .5rem; display: flex; flex-direction: row; align-items: center'>
                    @csrf
                    <input type='hidden' value='{{ $curso->id_course }}' name='id_course' />
                    <input type='checkbox' {{ $curso->active ? 'checked' : '' }} name='active' />
                    <button type='submit'>Guardar estado del curso</button>
                </form>
                <!-- Formulario para eliminar el curso, incluye el identificador -->
                <form method='POST' action='/panel/cursos/eliminar'>
                    @csrf
                    <input type='hidden' value='{{ $curso->id_course }}' name='id_course' />
                    <button type='submit'>Eliminar curso</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

    <h2>Crear nuevo curso</h2>
    <form method='POST' action='/panel/cursos'>
        @csrf
        <div class='form-control'>

            <input placeholder='Nombre del curso' name='name' />
        </div>
        <div class='form-control'>

            <input placeholder='Descripción del curso' name='description' />
        </div>
        <div class='form-control'>

            <input placeholder='Fecha de inicio' type='date' name='date_start' />
        </div>
        <div class='form-control'>

            <input placeholder='Fecha de fin' type='date' name='date_end' />
        </div>
        <div class='form-control'>
            <select name='active'>
                <option value='1'>Activo</option>
                <option value='0'>Inactivo</option>
            </select>
        </div>
        <button type='submit'>Enviar</button>
    </form>
    <div class='form-control'>
        <a href='/panel'>Volver</a>
    </div>
</body>

</html>