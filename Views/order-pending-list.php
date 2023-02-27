<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Ordenes</h2>
               <table class="table bg-light-alpha">
                    <thead>                         
                         <th>Código</th>
                         <th>Estado</th>
                         <th>Descripcion</th>
                         <th>Precio</th>
                    </thead>
                    <tbody>
                         
                    <?php foreach($orderList as $order){?>
                         <tr>                             
                              <td><?php echo $order->getOrderId()?></td>

                              <?php foreach($statusList as $status){
                                   
                                   if($order->getOrderStatusId() == $status->getOrderStatusId()){
                                       
                                        echo "<td>" . $status->getDescription() . "</td>";
                                   }
                                   ?>

                              <?php }?>
                              
                              <td><?php echo $order->getDescription()?></td>
                              <td><?php echo $order->getPrice()?></td>
                         </tr>

                    <?php }?>
                    </tbody>
               </table>
          </div>
     </section> 
     <sectionclass="mb-5">
          <div class="container">
               <h3 class="mb-4">Eliminar Orden</h3>
               <form action="<?php echo FRONT_ROOT .  "Order/DeleteOrder"?>" method="POST" class="bg-light-alpha">
                    <div class="row">                         
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Código</label>
                                   <input type="text" name="orderId" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">&nbsp;</label>
                                   <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
                              </div>
                         </div>                         
                    </div>                    
               </form>
          </div>
     </section>    
</main>