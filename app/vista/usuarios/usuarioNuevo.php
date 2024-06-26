    <?php require ('../layouts/header.php'); ?>

    <?php
    require_once ('../../controlador/usuariosControlador.php');
    $controlador=new UsuariosControlador();

    //si tenemos el post asignamos variables
    if(isset($_POST) && !empty($_POST)){
    $nombre=$_POST['nombre'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $comfirma_pass=$_POST['comfirma_pass'];
    $rol=$_POST['rol'];
    $trastero=$_POST['trastero'];
    $fecha=$_POST['fecha'];
    $pagada=$_POST['pagado'];

    // Verificar si las contraseñas coinciden
    if ($pass !== $comfirma_pass) {
        echo "Las contraseñas no coinciden.";
        exit();
    };

    //si no esta vacio el campo de seleccion
    if(isset($_POST['selection'])){$rol=$_POST['selection'];}else{$rol=3;};

    $controlador->guardaUsuarioRecibos($nombre, $apellido1, $apellido2, $direccion, $telefono, $email, $pass, $rol,$trastero,$fecha,$pagada);

    }
    ?>
    
        <?php  ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="" method="POST" class="mt-5" name="nuevo">
                        <legend class="text-center mb-5">Nuevo Usuario</legend>
                        <div class="form-group">
                            <label class="label-grande" for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido1">Apellido 1:</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">Apellido 2:</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="comfirma_pass">Confirmar Contraseña:</label>
                            <input type="password" class="form-control" id="comfirma_pass" name="comfirma_pass">
                        </div>
                        <?php if(isset($_SESSION['usuario']) && $_SESSION['rol'] == 1): ?>      
                        <div class="form-group">
                            <label for="rol">Rol:</label>
                            <select class="form-control" id="rol" name="rol">
                                <?php if(is_array($usuario) && isset($usuario['rol_id'])): ?>
                                <option value="<?php echo $usuario['rol_id']; ?>"><?php echo $usuario['rol_id']; ?></option>
                                <?php else: ?>
                                <option value="">Selecciona el Rol</option>
                                <?php endif; ?>
                                <option value="1">Administrador</option>
                                <option value="2">Cliente</option>
                                <option value="3">Usuario</option>
                            </select>
                        </div>
                        <div class="form-group"> 
                            <label class="label-grande" for="trastero">Trastero Alquilado:</label>                           
                            <input type="text" class="form-control" id="trastero" name="trastero" >
                        </div>
                        <div class="form-group"> 
                            <label class="label-grande" for="fecha">Fecha inicio Alquiler:</label>                           
                            <input type="date" class="form-control" id="fecha" name="fecha" >
                        </div>
                        
                        <div class="form-group"> 
                            <label class="label-grande" for="pagado">Pagada:</label>                           
                            <input type="text" class="form-control" id="pagado" name="pagado" value="Si">
                        </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-success mt-3">Guardar</button>
                    </form>
                </div>
            </div> 
        </div> 
    </div> 
<?php require ('../layouts/footer.php');?>  

