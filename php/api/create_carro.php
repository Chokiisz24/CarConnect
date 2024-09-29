<?php
    require_once('../includes/carro.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['precio']) && isset($_GET['modelo']) && isset($_GET['descripcion']) && isset($_GET['tipo']) 
        && isset($_GET['estado']) && isset($_GET['kilometraje']) && isset($_GET['combustible']) 
        && isset($_GET['color']) && isset($_GET['puertas']) && isset($_GET['asientos']) 
        && isset($_GET['garantia']) && isset($_GET['imagen'])){
            // Imprimir las variables para depuración
            echo 'Precio: ' . $_GET['precio'] . '<br>';
            echo 'Modelo: ' . $_GET['modelo'] . '<br>';
            echo 'Descripción: ' . $_GET['descripcion'] . '<br>';
            echo 'Tipo: ' . $_GET['tipo'] . '<br>';
            echo 'Estado: ' . $_GET['estado'] . '<br>';
            echo 'Kilometraje: ' . $_GET['kilometraje'] . '<br>';
            echo 'Combustible: ' . $_GET['combustible'] . '<br>';
            echo 'Color: ' . $_GET['color'] . '<br>';
            echo 'Puertas: ' . $_GET['puertas'] . '<br>';
            echo 'Asientos: ' . $_GET['asientos'] . '<br>';
            echo 'Garantía: ' . $_GET['garantia'] . '<br>';
            echo 'Imagen: ' . $_GET['imagen'] . '<br>';
            die;
            Car::create_car($_GET['precio'], $_GET['modelo'], $_GET['descripcion'], $_GET['tipo'], 
                            $_GET['estado'], $_GET['kilometraje'], $_GET['combustible'], $_GET['color'], 
                            $_GET['puertas'], $_GET['asientos'], $_GET['garantia'], $_GET['imagen']);

        }
?>
