// Función para mostrar mensajes
const mostrarMensaje = (titulo, mensaje, tipo) => {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: tipo,
        confirmButtonText: "Aceptar",
    });
};

// Función para actualizar usuario
const actualizarUsuario = () => {
    const datos = new FormData();
    datos.append("id_usuario", $("#id_usuario").val());
    datos.append("nombre", $("#newNombre").val());
    datos.append("apellido", $("#newApellido").val());
    datos.append("usuario", $("#newUsuario").val());
    datos.append("password", $("#newPassword").val());

    fetch("./app/controller/EditarUsuario.php", {
        method: "POST",
        body: datos,
    })
        .then((response) => response.json()) // Convertir a JSON directamente
        .then((respuesta) => {
            if (respuesta[0] === 1) {
                mostrarMensaje("¡Éxito!", respuesta[1], "success");
            } else {
                mostrarMensaje("¡Error!", respuesta[1], "error");
            }
        })
        .catch((error) => {
            console.error("Error en la solicitud:", error);
            mostrarMensaje("¡Error!", "Hubo un problema en la actualización", "error");
        });
};

// Asignar evento al botón
$("#actualizarDatos").on("click", () => {
    actualizarUsuario();
});
