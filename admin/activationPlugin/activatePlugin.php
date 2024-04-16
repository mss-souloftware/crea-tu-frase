<?php

/**
 * 
 * @package Chocoletras
 * @subpackage Ricardo Perez
 * 
 */



function createAllTables()
{
  global $wpdb;
  $errorClTables = "errorRegisterTables";
  if (get_option($errorClTables) != null) {
    return;
  } else {
    try {
      global $wpdb;
      $table_report = $wpdb->prefix . "reportes_errores";
      $table_plugin = $wpdb->prefix . "chocoletras_plugin";
      $charset_collate = $wpdb->get_charset_collate();


      $createTableReport = "CREATE TABLE $table_report (
              id int(50) NOT NULL AUTO_INCREMENT,
              nombre varchar(150) NOT NULL, 
              email varchar(150) NOT NULL,
              reporte varchar(500) NOT NULL,
              fecha timestamp NOT NULL DEFAULT current_timestamp(),
              PRIMARY KEY  (id)
            ) $charset_collate;";


      $createTablePlugin = "CREATE TABLE $table_plugin  (
    id int(50) NOT NULL AUTO_INCREMENT,
    nombre varchar(150) NOT NULL,
    frase varchar(150) NOT NULL,
    email varchar(150) NOT NULL,
    telefono int(150) NOT NULL,
    cp int(50) NOT NULL,
    ciudad varchar(150) NOT NULL,
    province varchar(150) NOT NULL,
    message varchar(550) NOT NULL,
    direccion varchar(150) NOT NULL,
    enProceso tinyint(1) NOT NULL DEFAULT 0,
    enviado tinyint(1) NOT NULL DEFAULT 0,
    pagoRealizado tinyint(1) NOT NULL DEFAULT 0,
    fechaEntrega date NOT NULL,
    id_venta varchar(150) NOT NULL DEFAULT 'null',
    nonce varchar(50) NOT NULL,
    fecha timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    precio float NOT NULL,
    express varchar(3) NOT NULL,
    uoi varchar(150) NOT NULL,
    PRIMARY KEY  (id)
  ) $charset_collate;";

      require_once ABSPATH . "wp-admin/includes/upgrade.php";
      dbDelta($createTablePlugin);
      dbDelta($createTableReport);
    } catch (\Throwable $erro) {
      return $error;
    }
    add_option($errorClTables, true);
  }
}



function removeAllTables()
{
  $optionsToDelette = [
    "precLetra",
    "precCoraz",
    "precEnvio",
    "expressShiping",
    "maxCaracteres",
    "gastoMinimo",
    "pluginPage",
    "termCond",
    "ouputCltHost",
    "ouputCltPort",
    "ouputCltSecure",
    "ouputCltemail",
    "ouputCltPass",
    "publishableKey",
    "secretKey",
    "errorRegisterTables"
  ];

  global $wpdb;
  $table_report = $wpdb->prefix . "reportes_errores";
  $table_plugin = $wpdb->prefix . "chocoletras_plugin";
  $charset_collate = $wpdb->get_charset_collate();

  try {

    $removal_report = "DROP TABLE IF EXISTS {$table_report}";
    $removal_pluginDatabase = "DROP TABLE IF EXISTS {$table_plugin}";
    $remResult = $wpdb->query($removal_report);
    $remResult2 = $wpdb->query($removal_pluginDatabase);


    foreach ($optionsToDelette as $options_value) {
      if (get_option($options_value)) {
        delete_option($options_value);
      }
    }

    return  $remResult . "::" . $remResult2;
  } catch (\Throwable $erro) {
    return $erro;
  }
}
