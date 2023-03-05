
<div class="row">
    <form action="controllers/usuario_controller.php" method="post">
    <input type='hidden' name='action' value='inicio'>
        <div class="column">
            <div class="card">
                <h2>Datos de usuario</h2>
                <input type="text" name="nombre" placeholder="Nombre usuario">
                <br>			
                <input type="password" name="contra" placeholder="Contraseña">
                <br>
                <br>
                <input id='submit' type="submit" name="submit" value="Enviar"  style="margin-left:40%; visibility: hidden">
                <input type="reset" name="reset" value="Restablecer" style="margin-left:5%">
            </div>
        </div>
    </form>
</div>

<script>
let campos;
function myFuntion(){
    campos = document.getElementsByTagName('input');
    if(campos[1].value != '' && campos[2].value != ''){
        document.getElementById('submit').style.visibility = "visible";
    }else{
        document.getElementById('submit').style.visibility = "hidden";
    }
    
};

setInterval(myFuntion, 100);
</script>