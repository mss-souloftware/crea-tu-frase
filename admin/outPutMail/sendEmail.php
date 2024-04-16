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
require_once plugin_dir_path(__FILE__) . '../emailModels/modelemail.php';

use PHPMailer\PHPMailer2\Exception;
use PHPMailer\PHPMailer2\PHPMailer;
use PHPMailer\PHPMailer2\SMTP;

require_once plugin_dir_path(__FILE__) . '../PHPMailer-master/src/Exception.php';
require_once plugin_dir_path(__FILE__) . '../PHPMailer-master/src/PHPMailer.php';
require_once plugin_dir_path(__FILE__) . '../PHPMailer-master/src/SMTP.php';

function sendEmail($upcomingData)
{
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug  = 0;
  $mail->Host       = get_option("ouputCltHost"); //'smtp.ionos.es'; 
  $mail->Port       = get_option("ouputCltPort"); // 587; 
  $mail->SMTPSecure = get_option("ouputCltSecure"); //'tls'; 
  $mail->SMTPAuth   = true;
  $mail->Username   = get_option("ouputCltemail"); //"ricardo@lavour.es"
  $mail->Password   = get_option("ouputCltPass"); // "Brembo3030"; 
  $mail->SetFrom(get_option("ouputCltemail"), 'Chocoletra'); // $mail->SetFrom('ricardo@lavour.es', 'Chocoletras'); 
  $result ;

  switch ($upcomingData['status']) {
    case 'proceso':

      $mail->AddAddress($upcomingData['email'], 'User');
      $mail->Subject = 'En proceso';
      $mail->MsgHTML(modelemail('proceso'));
      $mail->AltBody = 'Your product is in production!';
      if (!$mail->Send()) {
        $result =  "Error: " . $mail->ErrorInfo;
      } else {
        $result = 'sucessfull';
      }
      break;
    case 'envio':

      $mail->AddAddress($upcomingData['email'], 'User');
      $mail->Subject = 'Chocoletra';
      $mail->MsgHTML(modelemail('envio'));
      $mail->AltBody = 'Your product was send!';
      if (!$mail->Send()) {
        $result =  "Error: " . $mail->ErrorInfo;
      } else {
        $result = 'sucessfull';
      }
      break;
    case 'eliminar':

      $result = 'sucessfull';

      break;
  }
  return $result;
}
