<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PRODUCTO.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: PRODUCTO,  orderBy: PROD_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[PROD_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[PROD_NOMBRE]);
  $precio = htmlentities($modelo[PROD_PRECIO]);
  $descripcion = htmlentities($modelo[PROD_DESCRIPCION]);
  $render .=
  "<li class='md-two-line'>
            <span class='headline'><a href='modifica.html?id=$id'><b>Nombre del producto: </b>$nombre</a></span>
            <span class='supporting'><b>Precio: </b>$ $precio, <b>Descripción: </b> $descripcion</a></span>
         </li>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
