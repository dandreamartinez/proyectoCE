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

function CambiarColor(id){
    const cambiarColor = document.querySelector('.estudianteClic' + id);

    if (cambiarColor.classList.contains('pintar')) {
        cambiarColor.classList.remove('pintar');
    } else {
        cambiarColor.classList.add('pintar');
    }
}