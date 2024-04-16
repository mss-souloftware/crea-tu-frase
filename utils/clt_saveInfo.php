<?php

/**
 * 
 * author: ricardo perez
 * description: process form and send info to cookie
 * @package Chocoletras
 * @subpackage Ricardo Perez
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
      // var_dump($_POST);
      // return 'Todos los datos son necesarios!';
      $confirm_error = true;
    }
  }

  // return saveDataInDatabase($confirm_error);
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
        $sanitizeData[$info] = confirmViolationOfSequirity($datos[$info]);
        break;
      case 'name':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'email':
        $sanitizeData[$info] = sanitize_email($datos[$info]);
        break;
      case 'tel':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'cp':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'price':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'city':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'address':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'province':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'message':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'date':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'express':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      case 'uoi':
        $sanitizeData[$info] = sanitize_file_name($datos[$info]);
        break;
      default:
        # code...
        break;
    }
  }

  global $wpdb;
  try {
    $tablename = $wpdb->prefix . 'chocoletras_plugin';
    $result = $wpdb->query($wpdb->prepare(
      "INSERT INTO $tablename ( `frase`,`precio`,`nombre`,`email`,`telefono`,`cp`,`ciudad`,`province`,`message`,`direccion`,`nonce`,`fechaEntrega`,`express`,`uoi`) 
     VALUES ( 
              '" . $sanitizeData['chocofrase'] . "',
              '" . $sanitizeData['price'] . "',
              '" . $sanitizeData['name'] . "',
              '" . $sanitizeData['email'] . "',
              '" . $sanitizeData['tel'] . "',
              '" . $sanitizeData['cp'] . "',
              '" . $sanitizeData['city'] . "',
              '" . $sanitizeData['province'] . "',
              '" . $sanitizeData['message'] . "',
              '" . $sanitizeData['address'] . "',
              '" . $_POST['nonce'] . "',
              '" . $sanitizeData['date'] . "',
              '" . $sanitizeData['express'] . "',
              '" . $sanitizeData['uoi'] . "'
               )"
    ));
  } catch (\Throwable $erro) {
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
