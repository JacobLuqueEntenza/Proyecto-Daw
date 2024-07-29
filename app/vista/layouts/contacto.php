<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
        <link rel="stylesheet" href="/proyecto-daw/public/css/estilos.css">
    </head>
    <body class="pg_contacto">    
            <div class="form-container_cont">
            <h2 class="form-title_cont">Contáctanos</h2>
            <form class="form_cont">
                <input type="text" class="form-name_cont" placeholder="Dinos tu nombre" required>
                <input type="email" class="form-email_cont" placeholder="necesitamos tu email" required>
                <textarea class="form-message_cont" cols="30" rows="10" placeholder="Estoy interesado en ..." required></textarea>
                <button class="form-cta_cont">Enviar</button>
                <button class="form-cta_cont" onclick="location.href='../../../public/index.php'">Cancelar</button>
            </form>
            </div>    
    </body>
</html>