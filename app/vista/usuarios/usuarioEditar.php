
<?php require ('../layouts/header.php'); ?>

<?php
require_once ('../../controlador/usuariosControlador.php');
        $controlador=new UsuariosControlador();
        
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $usuario=$controlador->editar($id);
            echo ('<h1>'.$usuario['nombre'].'</h1>');
        }else{
            echo("No tengo id del usuario");
        };   
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['actualizar'])) {
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $apellido1=$_POST['apellido1'];
            $apellido2=$_POST['apellido2'];
            $direccion=$_POST['direccion'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];                       
            //si no esta vacio el campo de seleccion
            if(isset($_POST['selection'])){$rol=$_POST['selection'];
            }else{$rol=3;} 
            //si el rol es de usuario no puede tener trastero por lo tanto un 0
            $rol==3?$trastero=0:$trastero=$_POST['trastero']; 
        
        
        $controlador->actualizar($id,$nombre,$apellido1,$apellido2,$direccion,$telefono,$email,$pass,$rol,$trastero);
        exit();
            };
        };

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['eliminar'])) {
                $id=$_POST['id'];
                $controlador->eliminar($id);
            exit();
            };
        };
    ?>
    
      
    <form method="POST" action="">
        <input type="text" id="id" name="id" value="<?php echo $usuario['id_user']?>"><br><br>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="nombre" value="<?php echo $usuario['nombre'] ?>"><br><br>
        <label for="apellido1">Apellido 1:</label>
        <input type="text" id="apellido1" name="apellido1" value="<?php echo $usuario['apellido_1']?>"><br><br>
        <label for="apellido2">Apellido 2:</label>
        <input type="text" id="apellido2" name="apellido2" value="<?php echo $usuario['apellido_2']?>"><br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $usuario['direccion']?>"><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $usuario['telefono']?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $usuario['email']?>"><br><br>
        <label for="pass">Password:</label>
        <input type="text" id="pass" name="pass" value="<?php echo $usuario['pass']?>"><br><br>
        <br><br> 
        <?php 
        if ($_SESSION['rol'] == 1) {  
            echo "<select name='selection'>";

            if (isset($usuario['rol_id'])) {
                echo "<option value='" . $usuario['rol_id'] . "'>";
                if ($usuario['rol_id'] == 1) {
                    echo "Administrador";
                } elseif ($usuario['rol_id'] == 2) {
                    echo "Cliente";
                } elseif ($usuario['rol_id'] == 3) {
                    echo "Usuario";
                } else {
                    echo "Rol no reconocido";
                }
                echo "</option>";
            } else {
                echo "<option value=''>Selecciona el Rol</option>";
            }

            echo "<option value='1'>Administrador</option>
                <option value='2'>Cliente</option>
                <option value='3'>Usuario</option>
                </select><br><br>";
            echo '<input type="text" id="trastero" name="trastero" value="' . $usuario['trastero_id'] . '"><br><br>';
                
                        }          
        ?>   

        <br><br>
        
        <input type="submit" name="actualizar" value="Actualizar">
        <input type="submit" name="eliminar" value="Eliminar">
        
    </form>

            
            
