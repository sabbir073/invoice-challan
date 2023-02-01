<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $id  = end(explode('/',trim($url,'/')));

  $sql = "DELETE FROM `challan` WHERE `challan_no` = ?";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('i', $id);
  if ($stmt->execute()) {
    http_response_code(204);
  } else {
    http_response_code(422);
  }
}


?>
