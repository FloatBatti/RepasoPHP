<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Orden</h2>
               <form action="<?php echo FRONT_ROOT .  "Order/OrderAdd"?>" method="POST" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Código</label>
                                   <input type="text" value="" name="orderId" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Estado de Orden</label>
                                   <select class="form-control" name="orderStatusId">

                                        <?php foreach($statusList as $status){?>

                                        <option value="<?php echo $status->getOrderStatusId()?>"><?php echo $status->getDescription()?></option>

                                        <?php }?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Descripcion</label>
                                   <input type="text" value="" name="description" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Precio</label>
                                   <input type="number" value="" name ="price" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>