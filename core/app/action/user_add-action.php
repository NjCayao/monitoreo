<?php
// Verificar si el DNI ya existe en la base de datos
$existingUser = UserData::getByDNI($_POST["dni"]);
if ($existingUser != null) {
    // El DNI ya está registrado, muestra un mensaje de error o redirige a donde desees
    echo "<script>alert('El DNI ya se encuentra registrado.');</script>";
    echo "<script>window.location='index.php?view=users';</script>";
    exit();
}

// Si el DNI no existe, continúa con el proceso de agregar el usuario
if (count($_POST) > 0) {
    $is_admin = 0;
    if (isset($_POST["is_admin"])) {
        $is_admin = 1;
    }
    $user = new UserData();

    $user->kind = $_POST["kind"];
    $user->stock_id = isset($_POST["stock_id"]) ? $_POST["stock_id"] : "NULL";

    $user->image = "";
    if (isset($_FILES["image"])) {
        $image = new Upload($_FILES["image"]);
        if ($image->uploaded) {
            $image->Process("storage/profiles/");
            if ($image->processed) {
                $user->image = $image->file_dst_name;
            }
        }
    }

    $user->name = $_POST["name"];
    $user->lastname = $_POST["lastname"];
    $user->username = $_POST["dni"];
    $user->dni = $_POST["dni"];
    $user->equipo = $_POST["equipo"];
    $user->cdgequipo = $_POST["cdgequipo"];
    $user->frente_trabajo = $_POST["frente_trabajo"];
    $user->celular = $_POST["celular"];
    $user->email = $_POST["email"];
    $user->is_admin = $is_admin;
    $user->password = sha1(md5($_POST["password"]));
    $user->add();

    print "<script>window.location='index.php?view=users';</script>";
}
?>
