<?php
// Load WordPress environment
$path = $_SERVER['DOCUMENT_ROOT'];

include_once $path . '/wordpress/wp-load.php';


if (isset($_POST['imgBase64'])) {
    // Get the data URL
    $data = $_POST['imgBase64'];

    // Extract the base64 encoded data
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);

    // Decode the base64 data
    $data = base64_decode($data);

    // Specify the path where the image will be saved
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['basedir'] . '/crea-tu-frase/order/';
    $file_name = 'screenshot_' . time() . '.png';
    $file_path = $upload_path . $file_name;

    // Ensure the directory exists
    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    // Save the image file
    file_put_contents($file_path, $data);

    echo json_encode(['status' => 'success', 'file_path' => $upload_dir['baseurl'] . '/crea-tu-frase/order/' . $file_name]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No image data received']);
}
