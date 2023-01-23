document.addEventListener('DOMContentLoaded', function() {
    eventListener();
})

//ocultar la información del estudiante

function eventListener() {  
    document.querySelectorAll('.eclic').forEach(occurence => {
    occurence.addEventListener('click', (e) => {
        const id = e.target.getAttribute('id');
        let allId = JSON.parse(document.getElementById('arregloEst').value); 
        for (const property in allId) {
            if (`${allId[property]}` === id) {
                mostrarInformacion(id);
                cambiarColor(id);
            }
            if  (`${allId[property]}` != id) {
                ocultarInformacion(`${allId[property]}`);
                quitarColor(`${allId[property]}`);
            }
        } 
        cambioPestañaCurso(id);
        cambioPestañaActualizar(id);
        mostrarcursos(id);
        agregarCursos();
    });
    });
      
}

function mostrarInformacion(id) {
    const estudianteOcultar = document.querySelector('.estudiante-actualizar' + id);
    const cursosOcultar     = document.querySelector('.pestaña-curso' + id);

    if(cursosOcultar.classList.contains('mostrar'));

    if (estudianteOcultar.classList.contains('mostrar')) {
        estudianteOcultar.classList.remove('mostrar');
    } else {
        estudianteOcultar.classList.add('mostrar');
    }

    

    const pestañaOcultar    = document.querySelector('.pestaña-actualizar' + id);
    const actualizarOcultar  = document.querySelector('.pestaña-actualizar' + id);
    if (pestañaOcultar.classList.contains('mostrar') || cursosOcultar.classList.contains('mostrar')){
        pestañaOcultar.classList.remove('mostrar');
        actualizarOcultar.classList.remove('mostrar');
        cursosOcultar.classList.remove('mostrar');
    } else {
        pestañaOcultar.classList.add('mostrar');
    }

    if (pestañaOcultar.classList.contains('contenedor-actualizar')) {
        pestañaOcultar.classList.remove('contenedor-actualizar');
    } else {
        pestañaOcultar.classList.add('contenedor-actualizar');
    }
}

function ocultarInformacion(id) {
    const estudianteActualizar = document.querySelector('.estudiante-actualizar' + id);

    if (estudianteActualizar.classList.contains('mostrar')) {
        estudianteActualizar.classList.remove('mostrar');
    }

    const pestañaActualizar = document.querySelector('.pestaña-actualizar' + id);

    if (pestañaActualizar.classList.contains('mostrar')) {
        pestañaActualizar.classList.remove('mostrar');
    }

    if (pestañaActualizar.classList.contains('contenedor-actualizar')) {
        pestañaActualizar.classList.remove('contenedor-actualizar');
    }

    var mostrarcursos   = document.getElementById('ListaCursos' + id);
    if (mostrarcursos.classList.contains('mostrar')) {
        mostrarcursos.classList.remove('mostrar');
    }
}
function quitarColor(id){
    const cambiarColor = document.querySelector('.estudianteClic' + id);

    if (cambiarColor.classList.contains('pintar')) {
        cambiarColor.classList.remove('pintar');
    }
}
function cambiarColor(id){
    const cambiarColor = document.querySelector('.estudianteClic' + id);

    if (cambiarColor.classList.contains('pintar')) {
        cambiarColor.classList.remove('pintar');
    } else {
        cambiarColor.classList.add('pintar');
    }
}

function cambioPestañaActualizar(id){

    const pestañaActualizar = document.querySelector('.pestañaActualizar' + id);
    
    if (pestañaActualizar.classList.contains('pestañaColor')) {
        
    } else {
        pestañaActualizar.classList.add('pestañaColor');
    }
    const pestañaCurso = document.querySelector('.pestañaCurso' + id);

    if (pestañaCurso.classList.contains('pestañaColor')) {
        pestañaCurso.classList.remove('pestañaColor');
    } 
    document.querySelectorAll('.actualizaClic').forEach(occurence => {
        occurence.addEventListener('click', (e) => {
            const aid           = e.target.getAttribute('id'); 
            const pCurso       = document.querySelector('.c' + aid);
            const pActualiza   = document.querySelector('.a' + aid);
            pCurso.classList.remove('pestañaColor');
            pActualiza.classList.add('pestañaColor');
            const pestañaOcultar = document.querySelector('.pestaña-curso' + aid);
            pestañaOcultar.classList.remove('mostrar');
            const pestañaMostrar = document.querySelector('.pestaña-actualizar' + aid);
            pestañaMostrar.classList.add('mostrar');
        });
    });

}
function cambioPestañaCurso(){
    document.querySelectorAll('.CursoClic').forEach(occurence => {
        occurence.addEventListener('click', (e) => {
            const pid           = e.target.getAttribute('id'); 
            const pCursos       = document.querySelector('.c' + pid);
            const pActualizar   = document.querySelector('.a' + pid);
            pCursos.classList.add('pestañaColor');
            pActualizar.classList.remove('pestañaColor');
            const pestañaOcultar = document.querySelector('.pestaña-actualizar' + pid);
            pestañaOcultar.classList.remove('mostrar');
            const agregarcursosMostrar  = document.querySelector('.pestaña-curso' + pid);
            agregarcursosMostrar.classList.add('mostrar');
        });
    });
}

function sendForm(id) {
    var datos = {
        'nombre'        : document.getElementById('nombre' + id).value,
        'apellido'      : document.getElementById('apellido' + id).value,
        'email'         : document.getElementById('email' + id).value,
        'telefono'      : document.getElementById('telefono' + id).value,
        'grado'         : document.getElementById('lv_id' + id).value,
        'grupo'         : document.getElementById('grupo' + id).value,
        'estado'        : document.getElementById('estado' + id).value,
        'verificador'   : document.getElementById('verificador').value,
        'id'            : document.getElementById('s_id' + id).value,
    };

    if (datos['nombre'] === '') {
        swal("Error!", "Debes incluir el nombre del estudiante", "error");
    } else if (datos['apellido'] === '') {
        swal("Error!", "Debes incluir el apellido del estudiante", "error");
    } else {
        $.ajax({
            type    : "POST",
            url     : "src/php/actualizar.php",
            async   : true,
            data    : datos,
            success : function(respuesta){},
            error   : function(error){},
        });
        swal("Perfecto!", "El estudiante se ha actualizado correctamente", "success");
    }   
}

function mostrarcursos(id){
    document.querySelectorAll('.CursoClic').forEach(occurence => {
        occurence.addEventListener('click', (e) => {
            const cid    = e.target.getAttribute('id');
                $.ajax ({
                    type    : "POST",
                    url     : "src/php/cursos.php",
                    async   : true,
                    data    : {id: cid},
                    success : function(respuesta){},
                    error   : function(error){},
                })
                .done(function(res) {
                    var cursos                      = JSON.parse(res);
                    var curso                       = document.getElementById('Lista' + cid);
                    curso.innerHTML                 = '';
                    cursos.forEach(function(cursos) {
                        var unCurso                 = JSON.parse(`${cursos}`);
                        var div1                    = document.createElement('div');
                        var div2                    = document.createElement('div');
                        curso.appendChild(div1);
                        curso.appendChild(div2);
                        var elementoHtml            = document.createElement("li");
                        var mostrarcursos           = document.getElementById('ListaCursos' + cid);
                        mostrarcursos.classList.add('mostrar');
                        elementoHtml.textContent    = unCurso.name;
                        elementoHtml.classList.add('lista' + cid)
                        div1.appendChild(elementoHtml);
                        var imagen                  = document.createElement('img');
                        imagen.src                  = 'src/img/eliminar.png';
                        imagen.id                   = unCurso.c_id;
                        imagen.classList.add('imagenEliminar', 'basurero');
                        div2.id                     = unCurso.c_id;
                        div2.appendChild(imagen);
                    })
                    eliminarCursos(cid);
                })
        });
    });
}

function agregarCursos(){
    document.querySelectorAll('.CursoClic').forEach(occurence => {
        occurence.addEventListener('click', (e) => {
            const aid                   = e.target.getAttribute('id');
            
            $.ajax ({
                type    : "POST",
                url     : "src/php/mostrarCursos.php",
                async   : true,
                data    : {id: aid},
                success : function(respuesta){},
                error   : function(error){},
            })
            .done(function(res) {
                var cursos                  = JSON.parse(res);
                var cursoNuevo              = document.getElementById('nuevoCurso' + aid);
                cursoNuevo.innerHTML        = '';
                cursos.forEach(function(cursos) {
                    var unCursoN                = JSON.parse(`${cursos}`);
                    var select                  = document.createElement("option");
                    var mostrarcursos           = document.getElementById('nuevoCurso' + aid);
                    var mostrarcursosbtn        = document.getElementById('nuevoCursobtn' + aid);
                    mostrarcursos.classList.add('mostrar');
                    mostrarcursosbtn.classList.add('mostrar');
                    select.setAttribute('value', unCursoN.c_id);
                    select.textContent          = unCursoN.name;
                    cursoNuevo.appendChild(select);
                })
            })
        });
    });
}

function guardarCurso(id, c_id) {
    var datos = {
        'id'    : document.getElementById('s_id' + id).value,
        'c_id'  : document.getElementById('nuevoCurso' + id).value,
    }
    if (datos['c_id']=== '') {
        Swal.fire(
            'Error?',
            'No existen cursos para agregar',
            'error'
          )
    } else {
        $.ajax({
            type    : "POST",
            url     : "src/php/agregarCursos.php",
            async   : true,
            data    : datos,
            success : function(respuesta){},
            error   : function(error){},
        });
        Swal.fire(
            'Perfecto?',
            'El curso fue agregado correctamente',
            'success'
        )
        recargarCursos(id);
    }
}

function eliminarCursos(cid) {
    document.querySelectorAll('.basurero').forEach(occurence => {
        occurence.addEventListener('click', (e) => {
            var datos = {
                'c_id' : e.target.getAttribute('id'),
                'id'   : cid,
            };
            Swal.fire({
                title: '¿Estás seguro que deseas eliminar en curso seleccionado?',
                icon    : 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText:  'Cancelar'
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax ({
                        type    : "POST",
                        url     : "src/php/EliminarCursos.php",
                        async   : true,
                        data    : datos,
                        success : function(respuesta){},
                        error   : function(error){},
                    })
                    Swal.fire('Perfecto', 'El curso fue eliminado', 'success');
                    recargarCursos(cid);
                } else {
                    Swal.fire('', 'Se cancelo la eliminación del curso', 'info');
                }
              })
        });
    });
}

function recargarCursos(cid){
    $.ajax ({
        type    : "POST",
        url     : "src/php/cursos.php",
        async   : true,
        data    : {id: cid},
        success : function(respuesta){},
        error   : function(error){},
    })
    .done(function(res) {
        var cursos                      = JSON.parse(res);
        var curso                       = document.getElementById('Lista' + cid);
        curso.innerHTML                 = '';
        cursos.forEach(function(cursos) {
            var unCurso                 = JSON.parse(`${cursos}`);
            var div1                    = document.createElement('div');
            var div2                    = document.createElement('div');
            curso.appendChild(div1);
            curso.appendChild(div2);
            var elementoHtml            = document.createElement("li");
            var mostrarcursos           = document.getElementById('ListaCursos' + cid);
            mostrarcursos.classList.add('mostrar');
            elementoHtml.textContent    = unCurso.name;
            elementoHtml.classList.add('lista' + cid)
            div1.appendChild(elementoHtml);
            var imagen                  = document.createElement('img');
            imagen.src                  = 'src/img/eliminar.png';
            imagen.id                   = unCurso.c_id;
            imagen.classList.add('imagenEliminar', 'basurero');
            div2.id                     = unCurso.c_id;
            div2.appendChild(imagen);
        })
        eliminarCursos(cid);
    })  
    $.ajax ({
        type    : "POST",
        url     : "src/php/mostrarCursos.php",
        async   : true,
        data    : {id: cid},
        success : function(respuesta){},
        error   : function(error){},
    })
    .done(function(res) {
        var cursos                  = JSON.parse(res);
        var cursoNuevo              = document.getElementById('nuevoCurso' + cid);
        cursoNuevo.innerHTML        = '';
        cursos.forEach(function(cursos) {
            var unCursoN                = JSON.parse(`${cursos}`);
            var select                  = document.createElement("option");
            var mostrarcursos           = document.getElementById('nuevoCurso' + cid);
            var mostrarcursosbtn        = document.getElementById('nuevoCursobtn' + cid);
            mostrarcursos.classList.add('mostrar');
            mostrarcursosbtn.classList.add('mostrar');
            select.setAttribute('value', unCursoN.c_id);
            select.textContent          = unCursoN.name;
            cursoNuevo.appendChild(select);
        })
    })
}