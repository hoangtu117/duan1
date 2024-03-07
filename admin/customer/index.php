<?php
require('../../bootstrap.php');
require "../../dao_pdo/customer.php";
extract($_REQUEST);
$customers = customer_selectAll();
if(exist_param('btn-list')){
  $VIEW_NAME = 'list.php';
}
elseif(exist_param('btn-edit')){
 $id_customer  = $_REQUEST['id_customer'];
 $result = customer_selectone($id_customer);
 extract($result);
 $VIEW_NAME  = "edit.php";
}elseif(exist_param('btn-update')){
    $errors = [];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];
    $id_customer = $_POST['id_customer'];
    if($kich_hoat===false||$kich_hoat==""){
      $errors['kich_hoat']  = "Vui lòng nhập đầy đủ kích hoạt";
    }
    if($vai_tro===false||$vai_tro==""){
      $errors['vai_tro']  = "Vui lòng nhập đầy đủ vai trò";
    }
    if(count(array_filter($errors))>0){
      $_SESSION['errors_kh']  = array_filter( $errors);
      header("Location:".$ADM_URL."/customer/index.php?btn-edit&id_customer=$id_customer");
    }else
    {
      unset($_SESSION['errors_kh']);
      customer_admin_update($id_customer,$kich_hoat,$vai_tro);
      setcookie("update","Bạn đã update thành công!", time()+1);
      header("Location:".$ADM_URL."/customer/index.php?btn-list");
    }
}
else{
  $VIEW_NAME = 'list.php';
}
require('../layout-adm.php');
?>