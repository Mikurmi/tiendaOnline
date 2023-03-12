<div style="text-align: center;"><h1>CATEGORIA AÑADIR</h1></div>
<div class="row">
<div class="tablas">
        <a href="?controller=categoria&action=registrar" class="button">Añadir</a>
        <a href="?controller=categoria&action=borrar" class="button">Borrar</a>
    </div>
    <div>
        <form action="../../controllers/categoria_controller.php" method="post">
            <input type='hidden' name='action' value='registrar'>
            <div class="formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre">
            </div>
            <input type="reset" name="reset" value="Resetear" style="margin-left:40%;">
            <input type="submit" name="submit" value="Enviar" style="margin-left:5%">
        </form>
    </div>
</div>