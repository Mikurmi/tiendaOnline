<div style="text-align: center;"><h1>PEDIDOS CAMBIAR</h1></div>
<div class="row">
    <div class="tablas">
        <a href="?controller=pedido&action=buscarFecha" class="button">Buscar por fecha</a>
        <a href="?controller=pedido&action=buscarIdus" class="button">Buscar por Id de usuario</a>
        <a href="?controller=pedido&action=cambiar" class="button">Cambiar estado</a>
    </div>
    <div>
        <form action="../../controllers/pedido_controller.php" method="post">
            <input type='hidden' name='action' value='cambiar'>
            <div class="formulario">
                <label for="id">Id del pedido:</label>
                <input type="text" name="id">
                <select name="estado">
                    <option value="Solicitado">Solicitado</option>
                    <option value="Preparación">Preparación</option>
                    <option value="En transporte">En transporte</option>
                    <option value="Entregado">Entregado</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
            </div>
            <input type="reset" name="reset" value="Resetear" style="margin-left:40%;">
            <input type="submit" name="submit" value="Enviar" style="margin-left:5%">
        </form>
    </div>
</div>