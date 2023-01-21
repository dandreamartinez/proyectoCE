document.addEventListener('DOMContentLoaded', function() {
    eventListener();
})

//ocultar la información del estudiante

function eventListener() {
      document.querySelectorAll('.eclic').forEach(occurence => {
        occurence.addEventListener('click', (e) => {
            const id = e.target.getAttribute('id');
            mostrarInformacion(id);
            cambiarColor(id);
        });
      });
}


function mostrarInformacion(id) {
    const estudianteActualizar = document.querySelector('.estudiante-actualizar' + id);

    if (estudianteActualizar.classList.contains('mostrar')) {
        estudianteActualizar.classList.remove('mostrar');
    } else {
        estudianteActualizar.classList.add('mostrar');
    }

    const pestañaActualizar = document.querySelector('.pestaña-actualizar' + id);

    if (pestañaActualizar.classList.contains('mostrar')) {
        pestañaActualizar.classList.remove('mostrar');
    } else {
        pestañaActualizar.classList.add('mostrar');
    }

    if (pestañaActualizar.classList.contains('contenedor-actualizar')) {
        pestañaActualizar.classList.remove('contenedor-actualizar');
    } else {
        pestañaActualizar.classList.add('contenedor-actualizar');
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

function sendForm(id) {
    var datos = {
        'nombre'  : document.getElementById('nombre' + id).value,
        'apellido': document.getElementById('apellido' + id).value,
        'email'   : document.getElementById('email' + id).value,
        'telefono': document.getElementById('telefono' + id).value,
        'grado'   : document.getElementById('lv_id' + id).value,
        'grupo'   : document.getElementById('grupo' + id).value,
        'estado'  : document.getElementById('estado' + id).value,
        'verificador' : document.getElementById('verificador').value,
        'id'          : document.getElementById('s_id' + id).value,
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