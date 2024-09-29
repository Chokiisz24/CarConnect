/*
document.getElementById('carForm').addEventListener('submit', function(e) {
    e.preventDefault();  // Evita el envío tradicional del formulario
    
    // Crear un objeto FormData a partir del formulario
    let formData = new FormData(this);
    console.log(formData)
    // Usar Fetch API para enviar la información al servidor
    fetch('./php/api/create_carro.php', {  // ruta donde está el archivo PHP
        method: 'POST',           // Usamos el método POST
        body: formData            // Enviamos los datos del formulario
    })
    .then(response => response.json())  // Parseamos la respuesta a JSON
    .then(data => {
        if (data.status === 'success') {
            // Si el servidor responde con éxito, mostramos el mensaje
            document.getElementById('result').innerHTML = `<p>${data.message}</p>`;
        } else {
            // Si hay un error, mostramos el mensaje de error
            document.getElementById('result').innerHTML = `<p>${data.message}</p>`;
        }
    })
    .catch(error => {
        console.log('Respuesta cruda:', error); 
        // Si ocurre algún error en la solicitud, lo mostramos
        document.getElementById('result').innerHTML = `<p>Ha ocurrido un error: ${error.message}</p>`;

    });
});*/

$(document).ready(function() {
    $('#carForm').on('submit', function(e) {
        e.preventDefault();  // Evita el envío tradicional del formulario
        
        // Crear un objeto FormData a partir del formulario
        let formData = new FormData(this);
        const imagenInput = document.getElementById('imagen');
        const imagenNombre = imagenInput.files.length > 0 ? imagenInput.files[0].name : '';

        // Agregar solo el nombre del archivo al FormData
        formData.set('imagen', imagenNombre);
        console.log(formData)
        // Usar jQuery AJAX para enviar la información al servidor
        $.ajax({
            url: './php/api/create_carro.php',  // ruta donde está el archivo PHP
            type: 'POST',                       // Usamos el método POST
            data: formData,                     // Enviamos los datos del formulario
            contentType: false,                 // Necesario para FormData
            processData: false,                 // Necesario para FormData
            success: function(data) {
                if (data.status === 'success') {
                    // Si el servidor responde con éxito, mostramos el mensaje
                    $('#result').html(`<p>${data.message}</p>`);
                } else {
                    // Si hay un error, mostramos el mensaje de error
                    $('#result').html(`<p>${data.message}</p>`);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Respuesta cruda:', textStatus);
                // Si ocurre algún error en la solicitud, lo mostramos
                $('#result').html(`<p>Ha ocurrido un error: ${errorThrown}</p>`);
            }
        });
    });
});
