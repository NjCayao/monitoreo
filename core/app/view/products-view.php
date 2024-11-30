<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h2 id="products"><i class="fa fa-apple"></i> Lista de Productos</h2>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Productos</li>
      </ol>
      <a href='#product_new' data-toggle='modal' class='btn btn-primary'><i class='fa fa-apple'></i> Nuevo Producto</a>
      <br><br>
      <?php $products = ProductData::getAll();
      if(count($products)>0){ ?>
      <div class="box box-primary">
        <div class="box-body no-padding">
          <div class="box-body">
            <div class="box-body table-responsive">
              <table class="table table-bordered datatable table-hover">
                <thead>
                  <th style="text-align: center; width:30px;">N°</th>
                  <th style="text-align: center; width: 50px;">Codigo</th>
                  <th style="text-align: center;">Imagen</th>
                  <th style="text-align: center;">Nombre</th>
                  <th style="text-align: center;">Compra</th>
                  <th style="text-align: center;">Venta</th>
                  <th style="text-align: center;">Categoría</th>
                  <th style="text-align: center;">Mínima</th>
                  <th style="text-align: center;">Activo</th>
                  <th style="text-align: center; width:150px;">Acción</th>
                </thead>
                <?php for ($number=0; $number<1; $number++);
                foreach($products as $product):?>
                <tr>
                  <td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
                  <td style="text-align: right;"><?php echo $product->barcode; ?></td>
                  <td style="text-align: center; width: 100px;"><?php if($product->image!=""):?>
                      <img src="storage/products/<?php echo $product->image;?>" class="img-responsive" style="width:100px; height: 100px; border-radius: 10px;">
                    <?php endif;?>
                  </td>
                  <td><?php echo $product->name; ?></td>
                  <td style="text-align: right;"><?php echo "S/ ".number_format($product->price_in,2,'.',','); ?></td>
                  <td style="text-align: right;"><?php echo "S/ ".number_format($product->price_out,2,'.',','); ?></td>
                  <td><?php if($product->category_id!=null){echo $product->getCategory()->name;}else{ echo "<center>----</center>"; }  ?></td>
                  <td style="text-align: right;"><?php echo $product->inventary_min; ?></td>
                  <td style="text-align: center;"><?php if($product->is_active): ?><i class="fa fa-check"></i><?php endif;?></td>
                  <td style="text-align: center;">
                    <a href="index.php?view=product_edit&id=<?php echo $product->id; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Editar</a>&nbsp;&nbsp;
                    <a href="index.php?action=product_del&id=<?php echo $product->id; ?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                  </td>
                </tr>
                <?php endforeach;?>
              </table>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      <?php }else{ ?>
      <div class="alert alert-info">
        <h2>No hay productos</h2>
        <p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
      </div>
      <?php } ?>
    </div>
  </div><!--Fin row-->
</section><!-- /.content -->

<div class="modal fade" id="product_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Ingrese el Nuevo Producto</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="product_add" action="index.php?action=product_add" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
              <div class="col-md-9">
                <input type="file" name="image" id="image" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Codigo</label>
              <div class="col-md-9">
                <input type="text" name="barcode" id="product_code" class="form-control" id="barcode" placeholder="Dirige tu lector al código de barras y ¡CAPTÚRALO!">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
              <div class="col-md-9">
                <input type="text" name="name" required class="form-control" id="name" placeholder="Por ejemplo Aspirina, Visita médica, Reparación, etc.">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
              <div class="col-md-9">
                <textarea name="description" class="form-control" id="description" placeholder="Describe los detalles de tu producto como composición, peso, medidas, etc."></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
              <div class="col-md-9">
              <select name="category_id" class="form-control">
              <option value="">-- NINGUNA --</option>
              <?php foreach(CategoryData::getAll() as $category):?>
                <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
              <?php endforeach;?>
                </select>    </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Compra*</label>
              <div class="col-md-9">
                <input type="text" name="price_in" required class="form-control" id="price_in" placeholder="Monto que pagas por la compra de tu producto al proveedor.">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Venta*</label>
              <div class="col-md-9">
                <input type="text" name="price_out" required class="form-control" id="price_out" placeholder="Monto que recibes al vender tu producto a tus clientes.">
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
              <div class="col-md-9">
                <input type="text" name="unit" class="form-control" id="unit" placeholder="Unidades contenidas en un producto, ejemplo Sixpack(6), Blister(10), uno(1)">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Presentacion*</label>
              <div class="col-md-9">
                <input type="text" name="presentation" class="form-control" id="inputEmail1" placeholder="Caja, Botella, Bolsa, etc.">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Minima*</label>
              <div class="col-md-9">
                <input type="text" name="inventary_min" class="form-control" id="inputEmail1" placeholder="Cantidad mínima de productos para alertar.">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Stock*</label>
              <div class="col-md-9">
                <input type="text" name="q" class="form-control" id="inputEmail1" placeholder="Cantidad de productos que tienes en stock.">
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">Agregar Producto</button>
              </div>
            </div>
          </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->

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

<script type="text/javascript">
  function thePDF() {
var doc = new jsPDF('p', 'pt');
        doc.setFontSize(26);
        doc.text("<?php echo ConfigurationData::getByPreffix("company_name")->val;?>", 40, 65);
        doc.setFontSize(18);
        doc.text("LISTADO DE PRODUCTOS", 40, 80);
        doc.setFontSize(12);
        doc.text("Usuario: <?php echo Core::$user->name." ".Core::$user->lastname; ?>  -  Fecha: <?php echo date("d-m-Y h:i:s");?> ", 40, 90);
var columns = [
    {title: "Id", dataKey: "id"},
    {title: "Codigo", dataKey: "code"},
    {title: "Nombre del Producto", dataKey: "name"},
    {title: "Precio de entrada", dataKey: "price_in"},
    {title: "Precio de Salida", dataKey: "price_in"},
];
var rows = [
  <?php foreach($products as $product):
  ?>
    {
      "id": "<?php echo $product->id; ?>",
      "code": "<?php echo $product->barcode; ?>",
      "name": "<?php echo $product->name; ?>",
      "price_in": "$ <?php echo number_format($product->price_in,2,'.',',');?>",
      "price_out": "$ <?php echo number_format($product->price_out,2,'.',',');?>",
      },
 <?php endforeach; ?>
];
doc.autoTable(columns, rows, {
    theme: 'grid',
    overflow:'linebreak',
    styles: {
        fillColor: <?php echo Core::$pdf_table_fillcolor;?>
    },
    columnStyles: {
        id: {fillColor: <?php echo Core::$pdf_table_column_fillcolor;?>}
    },
    margin: {top: 100},
    afterPageContent: function(data) {
    }
});
doc.setFontSize(12);
doc.text("<?php echo Core::$pdf_footer;?>", 40, doc.autoTableEndPosY()+25);
<?php
$con = ConfigurationData::getByPreffix("report_image");
if($con!=null && $con->val!=""):
?>
var img = new Image();
img.src= "storage/configuration/<?php echo $con->val;?>";
img.onload = function(){
doc.addImage(img, 'PNG', 495, 20, 60, 60,'mon');
doc.save('products-<?php echo date("d-m-Y h:i:s",time()); ?>.pdf');
}
<?php else:?>
doc.save('products-<?php echo date("d-m-Y h:i:s",time()); ?>.pdf');
<?php endif; ?>
}
</script>