<section class="content">
  <?php $product = ProductData::getById($_GET["id"]);
  if($product!=null): ?>
  <div class="row">
  	<div class="col-md-12">
  	<h2><i class="fa fa-apple"></i> <?php echo $product->name ?> <small>Editar Producto</small></h2>
    <?php if(isset($_COOKIE["prdupd"])):?>
      <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
    <?php setcookie("prdupd","",time()-18600); endif; ?>
    <a href="index.php?view=products" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
    <br><br>
    <div class="box box-primary">
        <table class="table">
          <tr><td>
        		<form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?action=product_update" role="form">
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Imagen*</label>
                <div class="col-md-8">
                  <input type="file" name="image" id="name" placeholder="">
                  <?php if($product->image!=""):?>
                  <br>
                    <img src="storage/products/<?php echo $product->image;?>" class="img-responsive" style="width:300px; height:300px;">
                  <?php endif;?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Codigo de barras*</label>
                <div class="col-md-2">
                  <input type="text" name="barcode" class="form-control" id="barcode" value="<?php echo $product->barcode; ?>" placeholder="Codigo de barras del Producto">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label">Nombre*</label>
                <div class="col-md-4">
                  <input type="text" name="name" class="form-control" id="name" value="<?php echo $product->name; ?>" placeholder="Nombre del Producto">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
                <div class="col-md-7">
                  <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"><?php echo $product->description;?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
                <div class="col-md-2">
                <select name="category_id" class="form-control">
                <option value="">-- NINGUNA --</option>
                <?php foreach(CategoryData::getAll() as $category):?>
                  <option value="<?php echo $category->id;?>" <?php if($product->category_id!=null&& $product->category_id==$category->id){ echo "selected";}?>><?php echo $category->name;?></option>
                <?php endforeach;?>
                  </select>
                </div>
                <div class="col-md-1 form-group">
                  <a href='#category_new' data-toggle='modal' class='btn btn-default'><i class='fa fa-building'></i> Nueva Categoría</a>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Precio de Entrada*</label>
                <div class="col-md-2">
                  <input type="text" name="price_in" class="form-control" value="<?php echo $product->price_in; ?>" id="price_in" placeholder="Precio de entrada">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label">Precio de Salida*</label>
                <div class="col-md-2">
                  <input type="text" name="price_out" class="form-control" id="price_out" value="<?php echo $product->price_out; ?>" placeholder="Precio de salida">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label">Unidad*</label>
                <div class="col-md-1">
                  <input type="text" name="unit" class="form-control" id="unit" value="<?php echo $product->unit; ?>" placeholder="Unidad del Producto">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Presentacion</label>
                <div class="col-md-2">
                  <input type="text" name="presentation" class="form-control" id="inputEmail1" value="<?php echo $product->presentation; ?>" placeholder="Presentacion del Producto">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label">Minima</label>
                <div class="col-md-2">
                  <input type="text" name="inventary_min" class="form-control" value="<?php echo $product->inventary_min;?>" id="inputEmail1" placeholder="Minima en Inventario (Default 10)">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label" >Esta activo</label>
                <div class="col-md-1">
                  <div class="checkbox">
                    <label>
                    <input type="checkbox" name="is_active" <?php if($product->is_active){ echo "checked";}?>>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-3 col-lg-8">
                <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                  <button type="submit" class="btn btn-success">Actualizar Producto</button>
                </div>
              </div>
            </form>
          </td></tr>
        </table>
      </div>
  	</div>
  </div>
  <?php endif; ?>
</section>

<div class="modal fade" id="category_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Agregar Nueva Categoría</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="index.php?action=category_add_product_edit" role="form">
          <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-9">
              <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre de la categoría">
            </div>
          </div>
          <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripción</label>
            <div class="col-md-9">
              <textarea type="text" name="description" required class="form-control" id="description" placeholder="Descripción de la cateoría"></textarea>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-primary">Agregar Categoría</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>