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

require_once plugin_dir_path(__FILE__) .'../savestripeoption/stripeSession.php'; 
include_once 'updatepaiment.php';
function paymentfinish($customer){
    // updatePaymentStatus($id);
    return deleteCookie($customer);
}


function deleteCookie($customer){
    
    if( updatePaymentStatus(getIdUser(), $customer) === 1){
          $deleteCookie =  delete_option($_COOKIE['chocol_cookie']) ; 
          return $deleteCookie;
    }
    
}


