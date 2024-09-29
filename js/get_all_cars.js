 // Inicialización de DataTables
 $(document).ready(function() {
    $('#carTable').DataTable({
        "ajax": {
            "url": "./php/api/create_carro.php", // Cambia a la ruta de tu PHP que devuelve los autos
            "type": "GET", // Método para obtener los datos
            "dataSrc": function(response) {
                if (response.status === 'success') {
                    return response.data; // Asignamos los datos a DataTables
                } else {
                    alert('Error al cargar los datos: ' + response.message);
                    return [];
                }
            }
        },
        "columns": [
            { "data": "idcarro" },        // ID del carro
            { "data": "precio" },         // Precio
            { "data": "modelo" },         // Modelo
            { "data": "descripcion" },    // Descripción
            { "data": "tipo" },           // Tipo (Sedán, SUV, etc.)
            { "data": "estado" },         // Estado
            { "data": "kilometraje" },    // Kilometraje
            { "data": "combustible" },    // Combustible
            { "data": "color" },          // Color
            { "data": "puertas" },        // Puertas
            { "data": "asientos" },       // Asientos
            { "data": "garantia" },       // Garantía
            { "data": "imagen" },         // Imagen (URL de la imagen o nombre del archivo)
        ]
    });
});