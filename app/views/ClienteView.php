<?php
class ClienteView
{
    public function showClientes($clientes)
    {
        require_once "templates/Clientes.phtml";
    }

    public function showDetailsCliente($cliente, $viajes)
    {
        require_once "templates/ClienteDetalles.phtml";
    }
    public function formActualizarCliente($cliente, $id)
    {
        $clientes = $cliente;
        require_once "templates/ActualizarCliente.phtml";
    }
    public function formAgregarCliente($cliente)
    {
        $clientes = $cliente;

        require_once "templates/formAgregarCliente.phtml";
    }
    public function showError($error)
    {
        $errores = $error;
        require_once "templates/errores.phtml";
    }
}



    // public function showDetailsCliente($clientes)
//     {
//         require 'templates/header.phtml';
//         echo "<ul>";
//         echo '<li class="list-group-item item-task">ID Cliente: ' . $clientes->ID_Cliente . '</li>';
//         echo '<li class="list-group-item item-task">Nombre: ' . $clientes->Nombre . '</li>';
//         echo '<li class="list-group-item item-task">Apellido: ' . $clientes->Apellido . '</li>';
//         echo '<li class="list-group-item item-task">CorreoElectronico: ' . $clientes->CorreoElectronico . '</li>';
//         echo '<li class="list-group-item item-task">FechaNacimiento: ' . $clientes->FechaNacimiento . '</li>';
//         echo '<li class="list-group-item item-task">Dni: ' . $clientes->DNI . '</li>';
//         echo "</ul>";
//         require 'templates/footer.phtml';
//     }
// }


// require 'templates/header.phtml';
// echo "<table>";
// echo "<thead><tr><th>Nombre del cliente</th><th>Ver Detalle</th></tr></thead>";
// echo "<tbody>";
// foreach ($clientes as $index) {
//     echo '<tr>';
//     echo '<td>' . $index->Nombre . '</td>';
//     echo '<td><a href="' . BASE_URL . 'cliente/' . $index->ID_Cliente . '" class="btn btn-primary btn-sm">Ver Detalle</a></td>';
//     echo '</tr>';
// }
// echo "</tbody>";
// echo "</table>";
