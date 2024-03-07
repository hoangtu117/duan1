<?php
require "../../bootstrap.php";
require "../../dao_pdo/order.php";
require "../../dao_pdo/order_detail.php";
require "../../dao_pdo/image.php";
extract($_REQUEST);
$order_count= order_count_by_customerID();
if(exist_param('order-detail')){
 $order_detail_list = order_detail_selectAll_by_orderID($id_order);
 $order_detail_all = [];
      foreach($order_detail_list as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push($order_detail_all,$item);
      }
      $VIEW_NAME = "detail_order.php";
}elseif(exist_param('edit-order')){
    $id_order  = $_REQUEST['id_order'];
    $result = order_select_one($id_order);
    extract($result);
    $VIEW_NAME  = "edit_order.php";
}elseif(exist_param('btn-update')){
       $tinh_trang = $_POST['tinh_trang'];
       $id_order = $_POST['id_order'];
       $id_customer = $_POST['id_customer'];
       $errorrs = [];
    if(empty($tinh_trang)){
      $errorrs['tinh_trang'] = "Vui lòng nhập tình trạng đơn hàng";
     }
     if(count($errorrs)>0){
       $_SESSION['tinh_trang'] = $errorrs['tinh_trang'];
       header("Location:".$ADM_URL."/order/index.php?edit-order&id_customer=$id_customer&id_order=$id_order");
     }else{
       unset($_SESSION['tinh_trang']);
       order_update_tinh_trang($tinh_trang,$id_order);
       setcookie("update","Bạn đã update thành công!", time()+1);
       header("Location:".$ADM_URL."/order/index.php?view-order&id_customer=$id_customer");
     }
}elseif(exist_param('date_order')){
$search_list = order_by_date_order($date_order);
$VIEW_NAME = 'search.php';
}
else{
$order_list = order_SelectAll();
$VIEW_NAME = "list_order_by_customer.php";  
}
require "../layout-adm.php";
?>