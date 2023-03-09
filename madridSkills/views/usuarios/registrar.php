<div class="row">
    <form action="controllers/usuario_controller.php" method="post">
    <input type='hidden' name='action' value='registro'>
        <div class="column-left">
            <div class="card" >
                <h2>Datos personales</h2>
                <input type="text" name="nombre" placeholder="Nombre">
                <br>
                <input type="password" name="contra" placeholder="Contraseña">
                <br>
                <input type="radio" id="cliente" name="tipo" value="cliente" onclick="mostrarCliente()">
                <label for="cliente">Cliente</label>
                <br>
                <input type="radio" id="administrador" name="tipo" value="administrador" onclick="mostrarAdmin()">
                <label for="administrador">Administrador</label>
                <br>
            </div>
            <div class="card">
            <input type="reset" name="reset" value="Restablecer">
            <input  id='submit' type="submit" name="submit" value="Enviar" style="visibility :hidden">
        </div>
        </div>
        <div class="column-right">
            <div class="card" id="tipo_C" style="visibility :hidden;position: absolute;">
                <h2>Datos de cliente</h2>
                <input type="text" name="apellidos" placeholder="Apellidos">
                <select name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
                <label for="fecha_na">Fecha de nacimiento</label>
                <input type="date" id="fecha_nac" name="fecha_nac">
                <input type="text" id="telefono" name="telefono" placeholder="Telefono" maxlength="9" minlenght="9">
                <input type="email" id="email" name="email" placeholder="Correo electronico">
                <input type="text" id="direccion" name="direccion" placeholder="Dirección">
                <select name="tipo_ident">
                    <option value="DNI">DNI</option>
                    <option value="NIF">NIF</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="nº SS">nº SS</option>
                </select>
                <input type="text" id="identificador" name="identificador" placeholder="Identificador">
            </div>
            <div class="card" id="tipo_A" style="visibility :hidden; position: absolute;">
                <h2>Datos de Administrador</h2>
                <input type="text" name="cod_admin" placeholder="Código administrador">
            </div>
        </div>
        
    </form>
</div>
<script>
let campos = document.getElementsByTagName('input');
let cliente = document.getElementById('tipo_C').getElementsByTagName('input');
let admin = document.getElementById('tipo_A').getElementsByTagName('input');
function datosRellenos(){
    let comprobar = true;
    if(campos[3].checked){
        for(let i = 0; i < cliente.length; i++){
            if(cliente[i].value == ''){
                comprobar = false;
            }
        }
        return comprobar;
    }else if(campos[4].checked){
        if(admin[0].value == ''){
            return false;
        }else{
            return true;
        }
    }
}

function myFuntion(){
    campos = document.getElementsByTagName('input');
    if(campos[1].value != '' && campos[2].value != '' && datosRellenos()){
        document.getElementById('submit').style.visibility = "visible";
    }else{
        document.getElementById('submit').style.visibility = "hidden";
    }
    
};

setInterval(myFuntion, 100);

//Pusla del radio buton
function mostrarCliente() {
    document.getElementById('tipo_C').style.visibility = "visible";
    document.getElementById('tipo_A').style.visibility = "collapse";
};
function mostrarAdmin() { 
    document.getElementById('tipo_A').style.top = document.getElementById('tipo_C').style.height;
    document.getElementById('tipo_A').style.visibility = "visible";
    document.getElementById('tipo_C').style.visibility = "collapse";
    document.getElementById('tipo_A').style.top = document.getElementById('tipo_C').style.height;

};



</script>