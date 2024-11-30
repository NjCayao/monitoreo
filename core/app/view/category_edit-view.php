<section class="content">
<?php $cat = CategoryData::getById($_GET["id"]);?>
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-list-ol"></i> Editar Categoría</h2>
      <a href="index.php?view=categories" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br><br>
      <div class="box box-primary">
        <table class="table">
          <tr><td>
            <form class="form-horizontal" method="post" id="category_update" action="index.php?action=category_update" role="form">
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                <div class="col-md-2">
                  <input type="text" name="name" value="<?php echo $cat->name;?>" class="form-control" id="name" placeholder="Nombre">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label">Nombre*</label>
                <div class="col-md-5">
                  <textarea type="text" name="description" value="" class="form-control" id="description" placeholder="Descripción de la categoría"><?php echo $cat->description;?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="id" value="<?php echo $cat->id;?>">
                  <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
                </div>
              </div>
            </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</section>