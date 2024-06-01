<?php

//conexion a la base de datos por PDO
const SERVER = 'localhost';
const BD = 'walweb';
const user = 'root';
const password = '';

const SGDB = "mysql:host=".SERVER.";dbname=".BD;

const Method = 'AES-256-CBC';
const secretKey = '$Walweb2@24';
const secret_iv = '717717';
