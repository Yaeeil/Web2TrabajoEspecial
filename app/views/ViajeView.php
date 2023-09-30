<?php
class ViajeView{
        public function showDestino($viaje, $valor) {
            require 'templates/header.php';
            echo "<table>";
            echo "<thead><tr><th>Nombre del Destino</th><th>Ver Detalle</th></tr></thead>";
            echo "<tbody>";
            foreach ($viaje as $index => $viaj) {
                $id = $valor[$index]->ID_Viaje;
                echo '<tr>';
                echo '<td>' . $viaj->Destino . '</td>';
                echo '<td><a href="' . BASE_URL . 'detalle/' . $id. '" class="btn btn-primary btn-sm">Ver Detalle</a></td>';
                echo '</tr>';
            }
            echo "</tbody>";
            echo "</table>";
        }
    
    
    

    
    public function showDetailsViaje($viajes, $cliente) {
        require 'templates/header.php';
        echo "<ul>";
    
        echo "problema siempre queda en 1: " . "cliente id de cliente es: " . $cliente->ID_Cliente;
        echo "deberia ser: " . $viajes->id_Cliente;
        echo '<li class="list-group-item item-task">ID Viaje: ' . $viajes->ID_Viaje . '</li>';
        echo '<li class="list-group-item item-task">Destino: ' . $viajes->Destino . '</li>';
        echo '<li class="list-group-item item-task">Fecha de Salida: ' . $viajes->FechaSalida . '</li>';
        echo '<li class="list-group-item item-task">Fecha de Regreso: ' . $viajes->FechaRegreso . '</li>';
        echo '<li class="list-group-item item-task">Descripción: ' . $viajes->Descripcion . '</li>';
        echo '<li class="list-group-item item-task">Precio: ' . $viajes->Precio . '</li>';
        echo '<li class="list-group-item item-task">ID Cliente: ' . $viajes->id_Cliente . '</li>';
        echo '<li class="list-group-item item-task">Nombre Cliente: ' . $cliente->Nombre . '</li>';
        echo '<li class="list-group-item item-task">Apellido Cliente: ' . $cliente->Apellido . '</li>';
        echo "</ul>";
        require 'templates/footer.php';
    }
    
    

    public function showError($error) {
        require 'templates/header.php';
        
        echo "
            <div class='alert alert-danger' role='alert'>
                $error
            </div> 
        ";
        require 'templates/footer.php';
    }
}