document.addEventListener('DOMContentLoaded', function() {
    fetch('./php/api/get_all_modelos.php', {
        method: 'GET' // Método GET
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log('Datos recibidos:', data); // Imprime la respuesta completa para depurar
            const modeloSelect = document.getElementById('modelo');
            modeloSelect.innerHTML = ''; // Limpia opciones previas
            
            // Accede a los elementos dentro de data.data
            data.data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.idModelo;
                option.textContent = `${item.modelo} (${item.año}) ${item.marca}`;
                modeloSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching modelos:', error));
});