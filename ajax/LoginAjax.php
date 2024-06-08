<?php

$peticion_Ajax = true;
require_once '../config/app.php';

if (true) {
   
}else {
    session_start(['name'=>'WLB']); 
    session_unset();
    session_destroy();
    header("Location: ".URL_BASE."login/");
    exit();
}
