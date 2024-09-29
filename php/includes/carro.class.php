<?php
    require_once('Database.class.php');
    header('Content-Type: application/json');

    class car{
        public static function create_car($precio, $modelo, $descripcion, $tipo, $estado, $kilometraje, $combustible, $color, $puertas, $asientos, $garantia, $imagen)
        {
            $database = new Database();
            $conn = $database->getConnection();
            

            $stmt = $conn->prepare('INSERT INTO listado_autos(precio, modelo, descripcion, tipo, estado, kilometraje, combustible, color, puertas, asientos, garantia, imagen)
                VALUES(:precio, :modelo, :descripcion, :tipo, :estado, :kilometraje, :combustible, :color, :puertas, :asientos, :garantia, :imagen)');

            // Asignar parámetros
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':kilometraje', $kilometraje);
            $stmt->bindParam(':combustible', $combustible);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':puertas', $puertas);
            $stmt->bindParam(':asientos', $asientos);
            $stmt->bindParam(':garantia', $garantia);
            $stmt->bindParam(':imagen', $imagen);
            $response = [];

            // Ejecutar y devolver respuesta JSON
            if($stmt->execute()){
                // Devolver respuesta afirmativa en formato JSON
                $response = ['status' => 'success', 'message' => 'Vehículo agregado exitosamente.'];
            } else {
                // Devolver respuesta negativa en formato JSON
                $response = ['status' => 'error', 'message' => 'Error al agregar el vehículo.'];
            }
            echo json_encode($response);
        }

        public static function delete_car_by_id($id){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('DELETE FROM listado_autos WHERE id=:id');
            $stmt->bindParam(':id',$id);
            if($stmt->execute()){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Coche eliminado correctamente'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'El coche no se ha eliminado correctamente'
                ]);
            }
        }

        public static function get_all_cars() {
            $database = new Database();
            $conn = $database->getConnection();
            $stmt = $conn->prepare('SELECT * FROM listado_autos');
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Solo índices asociativos
                echo json_encode([
                    'status' => 'success', 
                    'data' => $result
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error al traer la información de los carros'
                ]);
            }
        }

        public static function get_modelo_cars(){
            $database = new Database();
            $conn = $database->getConnection();
            $sql = "SELECT model.idModelo, model.nombre as modelo, model.año, marc.nombre as marca FROM modelo as model inner join marca as marc on model.marca = marc.idMarca ";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode([
                    'status' => 'success', 
                    'data' => $result
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error al traer la información de los carros'
                ]);
            }
        }

        public static function update_client($id, $email, $name, $city, $telephone){
            $database = new Database();
            $conn = $database->getConnection();
            

        }
    }

?>