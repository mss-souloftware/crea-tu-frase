<?php 
/**
 * 
 * author: ricardo perez
 * description: process form and send info to cookie
 * @package Chocoletras
 * @subpackage Ricardo Perez
 * 
 * 
*/  
$path = $_SERVER['DOCUMENT_ROOT'];

include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';


function updatePaymentStatus($id, $customer){ 
      $result ; 
        try {
            global $wpdb;  
            $tablename = $wpdb->prefix.'chocoletras_plugin';
            $result = $wpdb->update( $tablename , array('pagoRealizado'=>1, 'id_venta' => $customer), array('id'=>$id)); 
            
            } catch (\Throwable $th) {

            $result =  $th;
        }
        // ! debo revisar el ERROR en caso de que no pueda guardarlo
      return $result;
}