<?php
//en caso que esxista un dominio se pone en ves de localhost
$servidor ='localhost'; //127.0.0.1
$BasedeDatos = 'walweb';
$user = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$BasedeDatos",$user,$password);
} catch (Exception $ex) {
    echo $ex->getMessage() ;
}
?>