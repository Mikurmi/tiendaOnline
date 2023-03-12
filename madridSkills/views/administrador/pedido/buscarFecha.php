<div style="text-align: center;"><h1>PEDIDOS FECHA</h1></div>
<div class="row">
    <div class="tablas">
        <a href="?controller=pedido&action=buscarFecha" class="button">Buscar por fecha</a>
        <a href="?controller=pedido&action=buscarIdus" class="button">Buscar por Id de usuario</a>
        <a href="?controller=pedido&action=cambiar" class="button">Cambiar estado</a>
    </div>
    <div>
        <form action="" method="post">
            <div class="formulario">
                <label for="fecha">Fecha a buscar:</label>
                <input type="date" name="fecha">
            </div>
            <input type="reset" name="reset" value="Resetear" style="margin-left:40%;">
            <input type="submit" name="submit" value="Enviar" style="margin-left:5%">
        </form>
        <?php
        if(isset($_POST['submit'])){
            require_once("../../models/pedido.php");
            $pedidos = Pedido::getByFecha($_POST['fecha']);
            echo "<table>
            <tr>
                <th>ID:</th>
                <th>ID US:</th>
                <th>Fecha:</th>
                <th>Precio:</th>
                <th>Estado:</th>
                <th>Productos:</th>
            </tr>";
            for($i = 0; $i < count($pedidos); $i++){
                echo "
                    <tr>
                        <td>".$pedidos[$i]->id."</td>
                        <td>".$pedidos[$i]->id_us."</td>
                        <td>".$pedidos[$i]->fecha."</td>
                        <td>".$pedidos[$i]->precio."</td>
                        <td>".$pedidos[$i]->estado."</td>
                        <td>".$pedidos[$i]->productos."</td>
                    </tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</div>