    <nav>
        <ul>
            @if (str_contains($rol, 'PROFESOR') || str_contains($rol, 'ADMIN'))
            <!--si entro como Admin te muestra las clases y estudiantes y todos pueden entrar en trabajos y exámenes-->
            <li>
                <a href='/panel/clases'>Clases</a>
            </li>
            <li>
                <a href='/panel/estudiantes'>Estudiantes</a>
            </li>
            @endif
            <li>
                <a href='/panel/trabajos'>Trabajos</a>
            </li>
            <li>
                <a href='/panel/examenes'>Examenes</a>
            </li>
            @if (str_contains($rol, 'ADMIN'))
            <!--Solo el administrador puede ir a cursos y horarios-->
            <li>
                <a href='/panel/cursos'>Cursos</a>
            </li>
            <li>
                <a href='/panel/horarios'>Horarios</a>
            </li>
            @endif

            @if (str_contains($rol, 'ESTUDIANTE'))
            <!--Solo el estudiante puede ir a las inscripciones-->
            <li>
                <a href='/panel/inscripciones'>Mis inscripciones</a>
            </li>
            <li>
                <a href='/perfil'>Perfil</a>
            </li>
            @endif
        </ul>
    </nav>
