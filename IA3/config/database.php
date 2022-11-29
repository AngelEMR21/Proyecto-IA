<?php

//NOTA :
//PONER SU RESPECTIVO USUARIO Y CONTRASEÑA

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root','', 'autosia');

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}