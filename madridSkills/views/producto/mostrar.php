<div class="tablas">
    <?php
        require_once('models/producto.php');
        $productos = Producto::getAll();
        for($i = 0; $i < count($productos); $i++){
            echo "<div>
                <a><h1>" . $productos[$i]['nombre'] . "</h1></a>
                <h1>" . $productos[$i]['precio'] . "</h1>
                <p>" . $productos[$i]['categoria'] . "</p>
            </div>";
        }
    
    ?>
</div>