<?php
session_start();
$ROOT_URL = "http://localhost/project_du_an1";
$SOURCE_URL = "$ROOT_URL/source";
$ADM_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";
$VIEW_NAME = "";
 function exist_param($fieldname){
    return array_key_exists($fieldname,$_REQUEST);
 }
 function saveFile($fieldname,$target_dir="../../upload/"){
   $fileLoad = $_FILES[$fieldname];
   $target_file = $target_dir.basename($fileLoad['name']);
   move_uploaded_file($fileLoad['tmp_name'],$target_file);
   return $fileLoad['name'];

 }
?>