<?php 
    // Incluir el header 
    include '../layouts/header.php';    
?>

   
   <?php  
   /*require_once ('../../controlador/trasterosControlador.php');
   //$trasteros= new TrasterosControlador();
   
   if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
       $fila=$trasteros->listaTrasteros();         
   }else{
       $fila=$trasteros->listaTrasterosAdmin();
   };*/
   ?>
   

       
<div class="galeriaTrasteros">
   <div style="background-image: url('/proyecto-daw/public/img/orden1.jpg');"></div>
   <div style="background-image: url('/proyecto-daw/public/img/orden5.jpg');"></div>
   <div style="background-image: url('/proyecto-daw/public/img/orden2.jpg');"></div>
   <div style="background-image: url('/proyecto-daw/public/img/orden3.jpg');"></div>
   <div style="background-image: url('/proyecto-daw/public/img/orden4.jpg');"></div>
</div>

<section class="contenedorTrasteros" id="contenedor1">
    <h2>Consejos Inteligentes</h2>
    <h3>Manten tu Trastero Siempre en Orden</h3>
    <div class="divTrasteros">
       <div class="tarjeta">            
           <p>Imagina un espacio donde cada objeto tiene su lugar designado, donde encontrar lo que necesitas es tan fácil como abrir una puerta. Esa es la magia de tener un trastero ordenado.</p>
       </div>
       <div class="tarjeta">
           <p>Con un trastero organizado, puedes maximizar el espacio, proteger tus pertenencias y acceder a ellas de manera rápida y eficiente.</p>
       </div>
       <div class="tarjeta">
           <p>Es el santuario perfecto para tus cosas, donde cada elemento tiene su propósito y contribuye a crear un ambiente armonioso en tu vida diaria.</p>
       </div>
    </div>   
</section>


       <section class="plano" id="situacionTrasteros">
           <h2>Plano de situación Trasteros</h2>            
       </section>

<?php /*if (!isset( $_SESSION['rol']) || $_SESSION['rol'] != 1){ */?>
   <section class="grid-contenedor-btn"> 
       <a href="#tablaTrasteros" onclick="mostrarTrasterosDisponibles()">     
           <div class="tarjeta">
               <h2>Trasteros Disponibles Ahora</h2>
               <p>Pulsa y verás solo los trasteros disponibles en este momento.</p>
           </div>
       </a> 
       <a href="#tablaTrasteros" onclick="refrescarPagina()"> 
           <div class="tarjeta">
               <h2>Todos Nuestros Trasteros</h2>
               <p>Lista completa y detallada de nuestros trasteros.</p>
           </div>
       </a>
</section>

   
<?php /* } */?>
       
       <div class="container mt-3 ">
           
           <div class="row justify-content-center">
               <div class="col-md-12">
                   <div class="card">
                       <div class="card-header h1 text-center">
                           Lista de Trasteros
                       </div>
                       <div class="p-0">
                           <table class="table text-center" id="tablaTrasteros">
                               <thead>
                                   <tr>
                                       <th scope="col">Trastero</th>
                                       <th scope="col">Tamaño</th>
                                       <th scope="col">Precio</th>
                                       <?php  if (isset( $_SESSION['rol']) && $_SESSION['rol'] == 1){
                                           echo "<th scope='col'>Alquilado por:</th>";
                                       } else { 
                                           echo "<th scope='col'>Descripción</th>";
                                           echo "<th scope='col'>Disponible</th>";
                                       }?>                                    
                                   </tr>
                               </thead>
                               <tbody>
                               <?php foreach($fila as $trastero){ ?>
                                   <tr>
                                       <td><?php echo $trastero['id_trastero']?></td>
                                       <td><?php echo $trastero['tamaño']?></td>
                                       <td><?php echo $trastero['precio']  ?></td>
                                       <?php  if (isset( $_SESSION['rol']) && $_SESSION['rol'] == 1) {
                                           echo "<td>".$trastero['nombre'].' '.$trastero['apellido_1'].' '.$trastero['apellido_2']."</td>";
                                       }else{
                                           echo "<td>".$trastero['descripcion']."</td>";
                                           echo "<td>".($trastero['disponible']==1 ? 'Si' : 'No')."</td>";
                                       }; ?>                      
                                       
                                                                            
                                   </tr>
                                   <?php } ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
                              
       
     
       

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

       
       
       
       <?php require ('../layouts/footer.php');//incluimos el footer comun?>  

</body>
</html>
