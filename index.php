<?php
/**
* @author 
**/

define("ROOT", dirname(__FILE__));

$debug= false;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}

include "core/autoload.php";
ob_start();
session_start();

// si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
// Core::$debug_sql = true;

$lb = new Lb();
$lb->start();

?>


<script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('swe.js')
        .then(function(registration) {
          console.log('Service Worker registrado con éxito:', registration);
        })
        .catch(function(error) {
          console.log('Service Worker interceptando solicitud de red:', error);
        });
    }
</script>