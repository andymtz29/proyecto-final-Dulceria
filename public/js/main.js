const administrador = () => {
    return document.getElementById('adm').value;

}
const enviarDatos = async (data) => {
    try {
        const respuesta = await fetch("./app/controller/Productos.php", {
            method: "POST",
            body: data
        });
        return await respuesta.json();
    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

const consulta = async () => {
    let data = new FormData();
    data.append("metodo", "obtener_datos");

    const respuesta = await enviarDatos(data);
    console.log("Respuesta de consulta:", respuesta);  // Verifica la respuesta completa

    let contenido = '';
    if (respuesta && Array.isArray(respuesta)) {
        respuesta.forEach(producto => {
            contenido += `
                <div class="col-md-3 col-sm-7 mb-3">
                    <div class="card">
                        <img src="${producto['imagen']}" class="card-img-top" alt="${producto['descripcion']}" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">${producto['descripcion']}</h5>
                            <p class="card-text">
                                <strong>Precio:</strong> $${producto['precio']} <br>
                                <strong>Cantidad:</strong> ${producto['cantidad']}
                            </p>`;
            if(administrador() === 'Administrador'){
                contenido+= `
                
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-warning" onclick="precargar(${producto['id_producto']})">
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </button>
                    <button type="button" class="btn btn-danger" onclick="eliminar(${producto['id_producto']})">
                        <i class="fa-solid fa-trash-can"></i> Eliminar
                    </button>`;
                    contenido+= `
                </div>
            </div>
        </div>
    </div>;`
            }
        });
    } else {
        contenido = `<p class="text-center">No hay productos disponibles.</p>`;
    }
    $("#cards_container").html(contenido);
}

// Función para precargar los datos de un producto en el modal de edición
const precargar = async (id) => {
    let data = new FormData();
    data.append("id_producto", id);
    data.append("metodo", "precargar_datos");

    const respuesta = await enviarDatos(data);
    console.log("Respuesta de precargar datos:", respuesta);  // Verifica la respuesta completa

    $("#edit_descripcion").val(respuesta['descripcion']);
    $("#edit_precio").val(respuesta['precio']);
    $("#edit_cantidad").val(respuesta['cantidad']);
    $("#edit_imagen_url").val(respuesta['imagen']);
    $("#id_producto_act").val(respuesta['id_producto']);
    $("#editarModal").modal('show');
}

// Función para actualizar los datos del producto
const actualizar = async () => {
    let data = new FormData();
    data.append("id_producto", $("#id_producto_act").val());
    data.append("descripcion", $("#edit_descripcion").val());
    data.append("precio", $("#edit_precio").val());
    data.append("cantidad", $("#edit_cantidad").val());
    data.append("imagen_url", $("#edit_imagen_url").val());
    data.append("metodo", "actualizar_datos");

    try {
        const respuesta = await enviarDatos(data);
        console.log("Respuesta de actualización:", respuesta);  // Verifica la respuesta completa

        Swal.fire({
            icon: respuesta[0] == 1 ? 'success' : 'error',
            title: respuesta[1],
            showConfirmButton: false,
            timer: 1500
        });

        if (respuesta[0] == 1) {
            consulta(); // Actualiza la lista de productos
            $("#editarModal").modal('hide'); // Cierra el modal
        }
    } catch (error) {
        console.error("Error al actualizar el producto:", error);
        Swal.fire({
            icon: 'error',
            title: 'Error al actualizar el producto',
            text: 'Hubo un problema al actualizar el producto. Intenta nuevamente.',
        });
    }
}

// Función para eliminar un producto
const eliminar = (id) => {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Este producto será eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo'
    }).then(async (result) => {
        if (result.isConfirmed) {
            let data = new FormData();
            data.append("id_producto", id);
            data.append("metodo", "eliminar_datos");

            try {
                const respuesta = await enviarDatos(data);

                Swal.fire({
                    icon: respuesta[0] == 1 ? 'success' : 'error',
                    title: respuesta[1],
                    showConfirmButton: false,
                    timer: 1500
                });
                consulta(); // Actualiza la lista de productos
            } catch (error) {
                console.error("Error al eliminar el producto:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al eliminar el producto',
                    text: 'Hubo un problema al eliminar el producto. Intenta nuevamente.',
                });
            }
        }
    });
}

// Función para agregar un producto
const agregar = async () => {
    let descripcion = $("#descripcion").val();
    let precio = $("#precio").val();
    let cantidad = $("#cantidad").val();
    let imagen_url = $("#imagen_url").val();

    // Verifica si los campos están vacíos antes de enviarlos
    if (!descripcion || !precio || !cantidad || !imagen_url) {
        Swal.fire({
            icon: 'error',
            title: 'Campos Vacíos',
            text: 'Por favor completa todos los campos',
        });
        return;
    }

    let data = new FormData();
    data.append("descripcion", descripcion);
    data.append("precio", precio);
    data.append("cantidad", cantidad);
    data.append("imagen_url", imagen_url);
    data.append("metodo", "insertar_datos");

    try {
        const respuesta = await enviarDatos(data);
        console.log("Respuesta al agregar producto:", respuesta);  // Verifica la respuesta completa

        if (respuesta && respuesta[0] === 1) {
            Swal.fire({
                icon: 'success',
                title: respuesta[1],
                showConfirmButton: false,
                timer: 1500
            });
            consulta();  // Actualiza la lista de productos
            $("#agregarModal").modal('hide');  // Cierra el modal
            $(".modal-backdrop").removeClass("modal-backdrop");
        } else {
            Swal.fire({
                icon: 'error',
                title: respuesta[1] || 'Hubo un error al agregar el producto.',
                showConfirmButton: false,
                timer: 1500
            });
        }
    } catch (error) {
        console.error("Error al agregar el producto:", error);
        Swal.fire({
            icon: 'error',
            title: 'Error al agregar el producto',
            text: 'Hubo un problema al agregar el producto. Intenta nuevamente.',
        });
    }
}

$(document).ready(() => {
    consulta(); // Obtener los productos al cargar la página

    // Añadir producto al hacer clic en el botón
    $("#btn_agregar").click(agregar);

    // Actualizar producto al hacer clic en el botón de actualizar
    $("#btn_actualizar").click(actualizar);
});
