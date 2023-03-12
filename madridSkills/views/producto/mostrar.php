<div class="tablas">
    <?php
        require_once('models/producto.php');
        $productos = Producto::getAll();
        for($i = 0; $i < count($productos); $i++){
            if($i%3 == 0){
                echo "<div class='producto1'>";
            }else if($i%3 == 1){
                echo "<div class='producto2'>";
            }else{
                echo "<div class='producto3'>";
            }
            echo "
                <h1>" . $productos[$i]->nombre . "</h1>
                <h3>" . $productos[$i]->precio . "€</h3>
                <p>" . $productos[$i]->categoria . "</p>
            </div>";
        }
    
    ?>
</div>