<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
        <link rel="stylesheet" href="/proyecto-daw/public/css/estilos.css">
        <!-- Enlaza los estilos de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">    
    </head>
<body>   

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
    <div class="container">
        <div class="row">
            <div class="form-container">
                <form action="" method="POST" name="nuevo" class="row justify-content-center">
                    <legend class="text-center mt-5"><strong>Crea tu cuenta</strong> </legend>
                        <div class="form-group col-5 mt-5">
                            <label class="label-grande" for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="nombre">
                        </div>
                        <div class="form-group col-5 mt-5">
                            <label for="apellido1">Apellido 1:</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1">
                        </div>
                        <div class="form-group col-5">
                            <label for="apellido2">Apellido 2:</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2">
                        </div>
                        <div class="form-group col-5">
                            <label for="direccion">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                            </div>
                        <div class="form-group col-5">
                            <label for="telefono">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="form-group col-5">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-5">
                            <label for="pass">Contraseña:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-group col-5">
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
                            <div class="form-group col-5"> 
                                <label class="label-grande" for="trastero">Trastero Alquilado:</label>                           
                                <input type="text" class="form-control" id="trastero" name="trastero" >
                            </div>
                            <div class="form-group col-5"> 
                                <label class="label-grande" for="fecha">Fecha inicio Alquiler:</label>                           
                                <input type="date" class="form-control" id="fecha" name="fecha" >
                            </div>
                            
                            <div class="form-group col-5"> 
                                <label class="label-grande" for="pagado">Pagada:</label>                           
                                <input type="text" class="form-control" id="pagado" name="pagado" value="Si">
                            </div>
                        
                        <?php endif; ?>
                            <div class="row justify-content-center mt-5">
                                <button type="submit" class="btn btn-success col-5 p-5">Guardar</button>
                                <button class="btn btn-danger col-5 p-5" onclick="location.href='../../../public/index.php'">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div> 
    </div> 
</body> 

