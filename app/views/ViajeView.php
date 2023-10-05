<?php
class ViajeView{
    //hacerle el template 
        public function showDestino($viaje, $valor) {
            require 'templates/header.phtml';
            echo "<table>";
            echo "<thead><tr><th>Nombre del Destino</th><th>Ver Detalle</th></tr></thead>";
            echo "<tbody>";
            foreach ($viaje as $index => $viaj) {
                $id = $valor[$index]->ID_Viaje;
                echo '<tr>';
                echo '<td>' . $viaj->Destino . '</td>';
                echo '<td><a href="' . BASE_URL . 'viaje/' . $id. '" class="btn btn-primary btn-sm">Ver Detalle</a></td>';
                echo '</tr>';
            }
            echo "</tbody>";
            echo "</table>";
            require_once 'templates/footer.phtml';
        }
    
    
    

    
    public function showDetailsViaje($viajes, $cliente) {
        //esto como lo meto en el template ? tipo que hago con los parametros
        require 'templates/header.phtml';
        echo "<ul>";
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
        require 'templates/footer.phtml';
    }
    
    

    public function showError($error) {
        require_once 'templates/header.phtml';
        
        echo "
            <div class='alert alert-danger' role='alert'>
                $error
            </div> 
        ";
        require_once 'templates/footer.phtml';
    }
}