<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:5500');


$tmp = $_FILES['file']['tmp_name'];
$extension = $_POST['extension'];

$acceptedExtensions = ['jpg', 'png', 'jpeg'];


if (!in_array($extension, $acceptedExtensions)) {
  http_response_code(415);
  echo json_encode('extension_error');
  return;
}

if (move_uploaded_file($tmp, './uploads/' . uniqid() . '.' . $extension)) {
  http_response_code(200);
  echo json_encode('uploaded');
  return;
}

http_response_code(404);
echo json_encode('not_uploaded');
