<?php

// Load WordPress environment
$path = $_SERVER['DOCUMENT_ROOT'];

include_once $path . '/wordpress/wp-load.php';
if (isset($_POST['imgBase64']) && isset($_POST['filename'])) {
    $imgBase64 = $_POST['imgBase64'];
    $filename = $_POST['filename'];

    $img = str_replace('data:image/png;base64,', '', $imgBase64);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);

    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['basedir'] . '/crea-tu-frase/order/';

    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    $file = $upload_path . $filename;
    file_put_contents($file, $data);

    echo json_encode(['status' => 'success', 'filename' => $filename]);
} else {
    echo json_encode(['status' => 'error']);
}
