<?php
    require_once('../includes/carro.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        car::get_modelo_cars();
        }

?>