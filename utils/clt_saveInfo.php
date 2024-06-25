<?php

/**
 * 
 * author: M. Sufyan Shaikh
 * description: process form and send info to cookie
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * @note: this send info to js->action->utils->ajaxSubmitForm
 * 
 */

function responseForm()
{
  $arr = array('Datos' => confirmAllIsReady());

  echo json_encode($arr);
  exit;
}

function confirmAllIsReady()
{
  setcookie('chocol_price', '', time() - 3600);
  $getData = array('action', 'price', 'chocofrase', 'name', 'email', 'tel', 'cp', 'city', 'address', 'province', 'message', 'date', 'express', 'uoi');
  $confirm_error = array();
  foreach ($getData as $key) {
    if (isset($_POST[$key])) {
      $confirm_error[$key] = $_POST[$key];
    } else {
      $confirm_error = true;
    }
  }

  return $confirm_error === true ? 'Todos los datos son necesarios!' : saveDataInDatabase($confirm_error);
}

function confirmViolationOfSequirity($incomingfrase)
{
  $confirmSequirity = preg_match('/[$^\*\(\)=\{\]\{\{\<\>\:\;]/',  $incomingfrase);
  if ($confirmSequirity > 0) {
    return 'No puedes continuar con el proceso';
  } else {
    return $incomingfrase;
  }
}

function saveDataInDatabase($datos)
{
  $sanitizeData = array();

  foreach ($datos as $info => $val) {
    switch ($info) {
      case 'chocofrase':
        $chocofraseArray = json_decode(stripslashes($datos[$info]), true);
        foreach ($chocofraseArray as $index => $frase) {
          $chocofraseArray[$index] = confirmViolationOfSequirity($frase);
        }
        $sanitizeData[$info] = json_encode($chocofraseArray);
        break;
      case 'name':
      case 'email':
      case 'tel':
      case 'cp':
      case 'price':
      case 'city':
      case 'address':
      case 'province':
      case 'message':
      case 'date':
      case 'express':
      case 'uoi':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      default:
        break;
    }
  }

  global $wpdb;
  try {
    $tablename = $wpdb->prefix . 'chocoletras_plugin';
    $result = $wpdb->query($wpdb->prepare(
      "INSERT INTO $tablename ( `frase`,`precio`,`nombre`,`email`,`telefono`,`cp`,`ciudad`,`province`,`message`,`direccion`,`nonce`,`fechaEntrega`,`express`,`uoi`) 
     VALUES ( 
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s,
              %s
               )",
      $sanitizeData['chocofrase'],
      $sanitizeData['price'],
      $sanitizeData['name'],
      $sanitizeData['email'],
      $sanitizeData['tel'],
      $sanitizeData['cp'],
      $sanitizeData['city'],
      $sanitizeData['province'],
      $sanitizeData['message'],
      $sanitizeData['address'],
      $_POST['nonce'],
      $sanitizeData['date'],
      $sanitizeData['express'],
      $sanitizeData['uoi']
    ));
  } catch (\Throwable $error) {
    $result = array("Status" => $error);
  }

  $confirmSaveCookie;
  $combinatedNameOption = $wpdb->insert_id . $_POST['nonce'];
  if ($result === 1) {
    // Saving data to cookie
    if (get_option($combinatedNameOption . '-chocol_price')) {
      $confirmSaveCookie = update_option(
        $combinatedNameOption . '-chocol_price',
        $sanitizeData['price'] . '_' . $sanitizeData['chocofrase'] . '_' . $sanitizeData['tel'] . '_' . $sanitizeData['uoi']
      );
    } else {
      $confirmSaveCookie = add_option(
        $combinatedNameOption . '-chocol_price',
        $sanitizeData['price'] . '_' . $sanitizeData['chocofrase'] . '_' . $sanitizeData['tel'] . '_' . $sanitizeData['email'] . '_' . $sanitizeData['name'] . '_' . $sanitizeData['city'] . '_' . $sanitizeData['address'] . '_' . $sanitizeData['uoi']
      );
    }
  }

  return $result === 1 ?
    array(
      "Status" => true,
      "nonce" => $combinatedNameOption . '-chocol_price',
      "amount" => $sanitizeData['price'],
      "frase"  => $sanitizeData['chocofrase'],
      "telef"  => $sanitizeData['tel'],
      "femail"  => $sanitizeData['email'],
      "fname"  => $sanitizeData['name'],
      "fcity"  => $sanitizeData['city'],
      "faddress"  => $sanitizeData['address'],
      "fuoi"  => $sanitizeData['uoi'],
      "cookie" => $confirmSaveCookie
    ) :
    array("Status" => 400);
}
