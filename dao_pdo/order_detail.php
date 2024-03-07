<?php
require_once "pdo.php";
function order_detail_selectAll_by_orderID($id_order){
   $sql  = "select order_detail.*,products.* from order_detail inner join products on products.id_product = order_detail.id_product where id_order = ?";
   return pdo_query($sql,$id_order);
}
function order_detail_insert($id_order,$id_product,$so_luong){
    $sql = "insert into order_detail(id_order,id_product,so_luong) values (?,?,?)";
   return pdo_execute($sql,$id_order,$id_product,$so_luong);
}

function order_detail_delete($id_order_detail){
    $sql = "delete from order_detail where id_order_detail = ?";
  return  pdo_execute($sql,$id_order_detail);
}

function order_detail_update($id_order_detail,$id_order,$id_product,$so_luong){
    $sql = "update order_detail set id_order = ?,id_product=?,so_luong = ? where id_order_detail = ?";
  return  pdo_execute($sql,$id_order,$id_product,$so_luong,$id_order_detail);

}
?>