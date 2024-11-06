<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PRODUCTO.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");

 $nombre = validaNombre($nombre);

 $precio = recuperaTexto("precio");

 $precio = validaNombre($precio);

 $descripcion = recuperaTexto("descripcion");

 $descripcion = validaNombre($descripcion);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: PRODUCTO, values: [
	PROD_NOMBRE => $nombre,
	PROD_PRECIO => $precio,
	PROD_DESCRIPCION => $descripcion
 ]);

 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/producto.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "precio" => ["value" => $precio],
  "descripcion" => ["value" => $descripcion],
 ]);
});
