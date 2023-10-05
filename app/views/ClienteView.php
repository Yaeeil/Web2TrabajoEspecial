<?php
class ClienteView{
    //esto creo iria contenido en un template que ya tenga los include_once
    //del header y el footer 
    //y aca luego llamar a un include_once que contenga esto digamos
        public function showAllClientes($clientes) {
            require 'templates/header.phtml';
            echo "<table>";
            echo "<thead><tr><th>Nombre del cliente</th><th>Ver Detalle</th></tr></thead>";
            echo "<tbody>";
            foreach ($clientes as $index) {
                echo '<tr>';
                echo '<td><a href="' . BASE_URL . 'cliente/' . $index->ID_Cliente. '" class="btn btn-primary btn-sm">Ver Detalle</a></td>';
                echo '</tr>';
            }
            echo "</tbody>";
            echo "</table>";
        }
    
    
    

    
    public function showDetailsCliente($clientes) {
        require 'templates/header.phtml';
        echo "<ul>";
        echo '<li class="list-group-item item-task">ID Cliente: ' . $clientes->ID_Cliente . '</li>';
        echo '<li class="list-group-item item-task">Nombre: ' . $clientes->Nombre . '</li>';
        echo '<li class="list-group-item item-task">Apellido: ' . $clientes->Apellido . '</li>';
        echo '<li class="list-group-item item-task">CorreoElectronico: ' . $clientes->CorreoElectronico . '</li>';
        echo '<li class="list-group-item item-task">FechaNacimiento: ' . $clientes->FechaNacimiento . '</li>';
        echo '<li class="list-group-item item-task">Dni: ' . $clientes->DNI . '</li>';
        echo "</ul>";
        require 'templates/footer.phtml';
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