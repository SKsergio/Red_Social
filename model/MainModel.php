<?php

    if ($peticion_Ajax) {
        require_once '../config/server.php';
    }else {
        require_once './config/server.php';
    }


class MainModel{

    //Modelo para conectar a la Base de Datos
    protected static function Conectar(){
        $conexion = new PDO(SGDB, user, password);//utilizamos los parametro del archivo server.php para realizar la conexion
        $conexion->exec('SET CHARACTER SET utf8');//hacemos esto para que permita ingresar caracteres en espalol
        return $conexion;
    }

    //consultas simples a la base de datos
    protected static function ejecutar_Consulta_Simple($consulta){
        $sql = self::Conectar()->prepare($consulta);
        $sql->execute();
        return $sql;
    }

    //Posibles funciones para los mensajes

    // esta es para encriptar id de los mensajes, es publica porque la ocuparemos en algunas vistas
    public function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }

    //es para desencriptar 
    protected static function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
    
    //generar codigos aleatorios para los mensajes
    protected static function Generar_Codigo_Aleatorio($letra, $longitud, $numero){
        for ($i=1; $i <= $longitud ; $i++) { 
            $aleatorio = rand(0,9);
            $letra.=$aleatorio;
        }
        return $letra .'-'.$numero;
    }
    // nota( me suena hacer algo asi con las imagenes tambien)

    // funcion para limpiar cadenas y prevenir posibles inyecciones sql
    protected static function Limpiar_Cadena($cadena){
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("<script>","",$cadena);
        $cadena = str_ireplace("</script>","",$cadena);
        $cadena = str_ireplace("<script src>","",$cadena);
        $cadena = str_ireplace("<script type=>","",$cadena);
        $cadena = str_ireplace("SELECT * FROM","",$cadena);
        $cadena = str_ireplace("INSERT INTO","",$cadena);
        $cadena = str_ireplace("DELETE FROM","",$cadena);
        $cadena = str_ireplace("DROP TABLE","",$cadena);
        $cadena = str_ireplace("DROP DATABASE","",$cadena);
        $cadena = str_ireplace("TRUNCATE TABLE","",$cadena);
        $cadena = str_ireplace("SHOW TABLES","",$cadena);
        $cadena = str_ireplace("SHOW DATABASES","",$cadena);
        $cadena = str_ireplace("<?php","",$cadena);
        $cadena = str_ireplace("?>","",$cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
        
        return $cadena;
    }
    // faltan validaciones de la creacion de usuarios

}