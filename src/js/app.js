document.addEventListener('DOMContentLoaded', function() {
    eventListener();
})

//ocultar la información del estudiante

function eventListener() {
    const informacionEstudiante = document.querySelector('.estudianteClic');
    const pestañas              = document.querySelector('pestañaClic');
    informacionEstudiante.addEventListener('click', mostrarInformacion);
    informacionEstudiante.addEventListener('click', CambiarColor);
    pestañas.addEventListener('Click', ColorPestañas);
}

function mostrarInformacion() {
    const estudianteActualizar = document.querySelector('.estudiante-actualizar');

    if (estudianteActualizar.classList.contains('mostrar')) {
        estudianteActualizar.classList.remove('mostrar');
    } else {
        estudianteActualizar.classList.add('mostrar');
    }

    const pestañaActualizar = document.querySelector('.pestaña-actualizar');

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

function CambiarColor(){
    const cambiarColor = document.querySelector('.estudianteClic');

    if (cambiarColor.classList.contains('pintar')) {
        cambiarColor.classList.remove('pintar');
    } else {
        cambiarColor.classList.add('pintar');
    }
}

function ColorPestañas() {
    const pestañaColorCur = document.querySelector('.curso')

    if (pestañaColorCur.classList.contains('pestañaColor')) {
        pestañaColorCur.classList.remove('pestañaColor');
    } else {
        pestañaColorCur.classList.add('pestañaColor');
    }
}