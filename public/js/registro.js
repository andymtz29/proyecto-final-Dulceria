const iniciar_registro = () => {
    const data = new FormData();
    data.append("nombre", $("#nombre").val());
    data.append("apellido", $("#apellido").val());
    data.append("usuario", $("#usuario").val());
    data.append("password", $("#password").val());
    data.append("rol", $("#rol").val());
    data.append("metodo", "iniciar_registro");

    fetch("./app/controller/Registro.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] === 1) {
            Swal.fire({
                icon: 'success',
                title: respuesta[1],
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location = "inicio";
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: respuesta[1],
                confirmButtonText: 'OK'
            });
        }
    });
};

$("#btn_registro").on("click", () => {
    iniciar_registro();
});
