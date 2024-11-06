<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS PRODUCTO (
      PROD_ID INTEGER,
      PROD_NOMBRE TEXT NOT NULL,
      PROD_PRECIO TEXT NOT NULL,
      PROD_DESCRIPCION TEXT NOT NULL,
      CONSTRAINT PROD_PK
       PRIMARY KEY(PROD_ID),
      CONSTRAINT PROD_NOM_UNQ
       UNIQUE(PROD_NOMBRE),
      CONSTRAINT PROD_NOM_NV
       CHECK(LENGTH(PROD_NOMBRE) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
