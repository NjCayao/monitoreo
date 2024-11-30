<?php

if (count($_POST) > 0) {
    $user = UserData::getById($_POST["user_id"]);

    if (isset($_FILES["image"])) {
        $image = new Upload($_FILES["image"]);
        if ($image->uploaded) {
            $image->Process("storage/profiles/");
            if ($image->processed) {
                $user->image = $image->file_dst_name;
                echo "<script>alert('Foto actualizada');</script>"; // Agregar esta línea
            }
        }
    }
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["dni"];
		$user->dni = $_POST["dni"];
		$user->equipo = $_POST["equipo"];
		$user->cdgequipo = $_POST["cdgequipo"];
		$user->celular = $_POST["celular"];		
		$user->email = $_POST["email"];
		$user->status = isset($_POST["status"])?1:0;
		$user->update();

		if($_POST["password"]!=""){
			$user->password = sha1(md5($_POST["password"]));
			$user->update_passwd();
	print "<script>alert('Se ha actualizado el password');</script>";

		}

	print "<script>window.location='index.php?view=users';</script>";

	}

?>