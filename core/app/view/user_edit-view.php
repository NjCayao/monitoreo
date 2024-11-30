<section class="content">
  <?php $user = UserData::getById($_GET["id"]);?>
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-user"></i> Editar Usuario</h2>
      <a href="index.php?view=users" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br>
      <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?action=user_update" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Imagen (160x160)</label>
          <div class="col-md-6">
          <?php if($user->image!=""){
            $url = "storage/profiles/".$user->image;
            if(file_exists($url)){
              echo "<img src='$url' style='width:80px;'>";
            } } ?>
            <br><br>
            <input type="file" name="image" id="image" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <!-- <label for="inputEmail1" class="col-lg-2 control-label">DNI*</label> -->
          <div class="col-md-3">
            <input type="hidden" name="dni" value="<?php echo $user->dni;?>" class="form-control" required id="dni" placeholder="Nombre de usuario">
          </div>
          <!-- <label for="inputEmail1" class="col-lg-1 control-label">Correo*</label> -->
          <div class="col-md-3">
            <input type="hidden" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="codigo de equipo">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-3">
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre" >
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Apellido*</label>
          <div class="col-md-3">
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido" >
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">DNI*</label>
          <div class="col-md-3">
            <input type="text" name="dni" value="<?php echo $user->dni;?>" class="form-control" required id="dni" placeholder="Nombre de usuario" >
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Equipo*</label>
          <div class="col-md-3">
            <input type="text" name="equipo" value="<?php echo $user->equipo;?>" class="form-control" id="equipo" placeholder="codigo de equipo">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Celular*</label>
          <div class="col-md-3">
            <input type="text" name="celular" value="<?php echo $user->celular;?>" class="form-control" required id="celular" placeholder="celular">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Codigo Equipo*</label>
          <div class="col-md-3">
            <input type="text" name="cdgequipo" value="<?php echo $user->cdgequipo;?>" class="form-control" id="cdgequipo" placeholder="codigo de equipo">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Contraseña</label>
          <div class="col-md-3">
            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contraseña">
            <p class="help-block">La contraseña solo se modificara si escribes algo, en caso contrario no se modifica.</p>
          </div>
        </div>
        



        <div class="form-group">
          <label type="hidden" for="inputEmail1" class="col-lg-3 control-label" >¿Se encuentra Activo?</label>
          <div class="col-md-3">
            <div class="check">
              <label>
                <input  name="status" type="checkbox" <?php if($user->status){ echo "checked";}?>>
            <div class="checkmark"></div>          
          </div>
          </label>
        </div>



        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-7">
            <p class="alert alert-info">* Campos obligatorios</p>
          </div>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-7">
            <button type="submit" class="btn btn-success">Actualizar Usuario</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#equipo, #cdgequipo').on('input', function() {
        // Filtrar caracteres especiales y convertir a mayúsculas
        var inputValue = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '').toUpperCase();
        $(this).val(inputValue);
    });
});






</script>