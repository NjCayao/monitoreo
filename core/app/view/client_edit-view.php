<section class="content">
<?php $user = PersonData::getById($_GET["id"]); ?>
  <div class="row">
  	<div class="col-md-12">
    	<h2><i class="fa fa-male"></i> Editar Cliente</h2>
      <a href="index.php?view=clients" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
    	<br><br>
  		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=client_update" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
          <div class="col-md-6">
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
          <div class="col-md-6">
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">RUC/DNI*</label>
          <div class="col-md-6">
            <input type="text" name="dni" value="<?php echo $user->dni;?>" class="form-control" id="dni" placeholder="RFC/RUT">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
          <div class="col-md-6">
            <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" id="username" placeholder="Direccion">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
          <div class="col-md-6">
            <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
          <div class="col-md-6">
            <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
          </div>
        </div>
        <p class="alert alert-info">* Campos obligatorios</p>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
            <button type="submit" class="btn btn-primary">Actualizar </button>
          </div>
        </div>
      </form>
  	</div>
  </div>
</section>