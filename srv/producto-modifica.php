<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PRODUCTO.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");

 $nombre = validaNombre($nombre);

 $precio = recuperaTexto("precio");

 $precio = validaNombre($precio);

 $descripcion = recuperaTexto("descripcion");

 $descripcion = validaNombre($descripcion);

 update(
  pdo: Bd::pdo(),
  table: PRODUCTO,
  set: [PROD_NOMBRE => $nombre, PROD_PRECIO => $precio, PROD_DESCRIPCION => $descripcion],
  where: [PROD_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "precio" => ["value" => $precio],
  "descripcion" => ["value" => $descripcion],
 ]);
});
