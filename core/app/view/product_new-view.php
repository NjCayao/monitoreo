<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-apple"></i> Nuevo Producto</h2>
      <a href="index.php?view=products" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br><br>
      <div class="box box-primary">
        <table class="table">
          <tr><td>
          <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=addproduct" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
              <div class="col-md-3">
                <input type="file" name="image" id="image" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Codigo*</label>
              <div class="col-md-3">
                <input type="text" name="barcode" id="product_code" class="form-control" id="barcode" placeholder="Dirige tu lector al código de barras y ¡CAPTÚRALO!">
              </div>
              <label for="inputEmail1" class="col-lg-1 control-label">Nombre*</label>
              <div class="col-md-3">
                <input type="text" name="name" required class="form-control" id="name" placeholder="Por ejemplo Aspirina, Visita médica, Reparación, etc.">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
              <div class="col-md-3">
                <textarea name="description" class="form-control" id="description" placeholder="Describe los detalles de tu producto como composición, peso, medidas, etc."></textarea>
              </div>
              <label for="inputEmail1" class="col-lg-1 control-label">Categoría</label>
              <div class="col-md-2">
              <select name="category_id" class="form-control">
                <option value="">-- NINGUNA --</option>
                <?php foreach(CategoryData::getAll() as $category):?>
                <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                <?php endforeach;?>
                </select>
              </div>
            <div class="col-md-2 form-group">
              <a href='#category_new' data-toggle='modal' class='btn btn-default'><i class='fa fa-list-ol'></i> Nueva Categoría</a>
            </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Compra*</label>
              <div class="col-md-3">
                <input type="text" name="price_in" required class="form-control" id="price_in" placeholder="Precio de compra.">
              </div>
              <label for="inputEmail1" class="col-lg-1 control-label">Venta*</label>
              <div class="col-md-3">
                <input type="text" name="price_out" required class="form-control" id="price_out" placeholder="Precio de venta.">
              </div>
            </div>
            <script type="text/javascript">
            $(document).ready(function(){
              $("#price_in").keyup(function(){
                $("#price_out").val( $("#price_in").val()*1.25 );
              });
            })
            </script>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Unidad*</label>
              <div class="col-md-3">
                <input type="text" name="unit" class="form-control" id="unit" placeholder="Unidades contenidas en un producto, ejemplo Sixpack(3), Blister(10), uno(1)">
              </div>
              <label for="inputEmail1" class="col-lg-1 control-label">Presentacion*</label>
              <div class="col-md-3">
                <input type="text" name="presentation" class="form-control" id="inputEmail1" placeholder="Caja, Botella, Bolsa, etc.">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Mínima*</label>
              <div class="col-md-3">
                <input type="text" name="inventary_min" class="form-control" id="inputEmail1" placeholder="Cantidad mínima de productos para alertar.">
              </div>
              <label for="inputEmail1" class="col-lg-1 control-label">Stock Actual*</label>
              <div class="col-md-3">
                <input type="text" name="q" class="form-control" id="inputEmail1" placeholder="Cantidad de productos que tienes en stock.">
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">Agregar Producto</button>
              </div>
            </div>
          </form>
          </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $("#product_code").keydown(function(e){
          if(e.which==17 || e.which==74 ){
              e.preventDefault();
          }else{
              console.log(e.which);
          }
      })
  });
  </script>
</section>

<div class="modal fade" id="category_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Agregar Nueva Categoría</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="index.php?action=category_add_product" role="form">
          <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-9">
              <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre de la categoría">
            </div>
          </div>
          <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripción</label>
            <div class="col-md-9">
              <textarea type="text" name="description" required class="form-control" id="description" placeholder="Descripción de la categoría"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-primary">Agregar Empresa</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>