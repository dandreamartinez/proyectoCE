document.addEventListener('DOMContentLoaded', function() {
    eventListener();
})

//ocultar la información del estudiante

function eventListener() {  
    document.querySelectorAll('.eclic').forEach(occurence => {
    occurence.addEventListener('click', (e) => {
        const id = e.target.getAttribute('id');
        var allId = JSON.parse(document.getElementById('arregloEst').value); 
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
        
    });
    });
    
}


function mostrarInformacion(id) {
    const estudianteOcultar = document.querySelector('.estudiante-actualizar' + id);

    if (estudianteOcultar.classList.contains('mostrar')) {
        estudianteOcultar.classList.remove('mostrar');
    } else {
        estudianteOcultar.classList.add('mostrar');
    }

    const pestañaOcultar = document.querySelector('.pestaña-actualizar' + id);

    if (pestañaOcultar.classList.contains('mostrar')) {
        pestañaOcultar.classList.remove('mostrar');
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