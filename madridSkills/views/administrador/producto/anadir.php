<div style="text-align: center;"><h1>PRODUCTOS AÑADIR</h1></div>
<div class="row">
    <div class="tablas">
        <a href="?controller=producto&action=registrar" class="button">Añadir</a>
        <a href="?controller=producto&action=actualizar" class="button">Actualizar</a>
        <a href="?controller=producto&action=borrar" class="button">Borrar</a>
    </div>
    <div>
        <form action="../../controllers/producto_controller.php" method="post">
            <input type='hidden' name='action' value='registrar'>
            <div class="formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre">
                <br>
                <label for="precio">Precio:</label>
                <input type="number" step="any" name="precio">
                <br>
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" >
                <br>
                <label for="unidades">Unidades:</label>
                <input type="number" name="unidades">
                <p>Separar las categorias con comas y sin espacios</p>
                <p>Ej: jazz,rock</p>
            </div>
            <input type="reset" name="reset" value="Resetear" style="margin-left:40%;">
            <input type="submit" name="submit" value="Enviar" style="margin-left:5%">
        </form>
    </div>
</div>