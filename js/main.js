$(document).on("ready", inicio);

function inicio() {
    $("form").submit(function (event) {
        //previene que se ejecute la accion del boton del formulario
        event.preventDefault();

    });
}