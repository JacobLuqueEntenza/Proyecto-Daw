<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="/tutrastero/tutrastero/public/css/estilos.css">
    <!-- Enlaza los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">      
</head>

<body>

    <header class="header" id="header">
        <p class="p-header"><a href="/tutrastero/tutrastero/public/index.php">Inicio</a> </p>
        <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/trasteros/trasterosLista.php">Trasteros</a> </p>
        <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/layouts/contacto.php">Contacto</a> </p>
    <?php  
        session_start();
        //si el rol es distinto de tres nos aparecera pagos y recibos
        if (isset($_SESSION['usuario']) && isset($_SESSION['rol']) && $_SESSION['rol'] != 3){ 
            if($_SESSION['rol'] ==1){?>
                <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/averias/averiasLista.php">Averias</a> </p>
            <?php 
            }else{?>
                <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/averias/averiaNuevo.php">Averias</a> </p>
            <?php } ?>        
        <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/recibos/recibosLista.php">Recibos</a> </p>
        <?php } 
        if (isset($_SESSION['usuario']) && isset($_SESSION['rol']) && $_SESSION['rol'] == 1){ ?>
        <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/usuarios/usuariosLista.php" onclick="borrarCliente();">Usuarios</a> </p>

    <?php } ?>    
    <?php 
        
        if(!isset($_SESSION['usuario'])){?>

            <p class="p-header"><img src="/tutrastero/tutrastero/public/img/Login.ico" alt="login"><a href="/tutrastero/tutrastero/app/vista/login/login.php">Login</a></p>  
            <p class="p-header"><a href="/tutrastero/tutrastero/app/vista/usuarios/usuarioNuevo.php">Registrate</a></p> 

    <?php
            }else{ ?>
                <p class="p-header"><a href="">Hola, <?php echo $_SESSION['usuario']; ?>  </a></p>
                <p class="p-header"><a href="/tutrastero/tutrastero/app/controlador/cerrarSesionControlador.php">Cerrar Sesión</a></p>
        
    <?php
    };
    ?>       

    </header>
        
