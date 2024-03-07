<?php
require_once "pdo.php";
function order_SelectAll(){
    $sql  = "select * from orders";
  return  pdo_query($sql);
}

function order_insert($id_customer,$date_order,$tinh_trang,$ho_ten,$address,$email,$phone){
    $sql = "insert into orders(id_customer,date_order,tinh_trang,ho_ten,address,email,phone) values (?,?,?,?,?,?,?)";
  return  pdo_execute($sql,$id_customer,$date_order,$tinh_trang,$ho_ten,$address,$email,$phone);
}

function order_delete($id_order){
    $sql = "delete from orders where id_order = ?";
   return pdo_execute($sql,$id_order);
}

function order_select_one($id_order){
    $sql = "select * from orders where id_order = ?";
    return pdo_query_one($sql,$id_order);
}

function order_update($id_order,$id_customer,$date_order,$tinh_trang,$ho_ten,$address,$email,$phone){
    $sql = "update orders set id_customer = ?,date_order=?,tinh_trang = ?,ho_ten=?,address=?,email=?,phone=? where id_order = ?";
  return  pdo_execute($sql,$id_customer,$date_order,$tinh_trang,$ho_ten,$address,$email,$phone,$id_order);

}
function order_update_tinh_trang($tinh_trang,$id_order){
  $sql = "update orders set tinh_trang = ? where id_order=?";
  return pdo_execute($sql,$tinh_trang,$id_order);
}
function order_by_customerID($id_customer){
    $sql = "select * from orders where id_customer = ?";
    return pdo_query($sql,$id_customer);

}
function order_count_by_customerID(){
  $sql = "select customers.*,count(orders.id_customer) as number from customers inner join orders on orders.id_customer = customers.id_customer group by(orders.id_customer) ";
  return pdo_query($sql);
}
function order_by_date_order($date_order){
 $sql = "select * from orders where date_order = ?";
 return pdo_query($sql,$date_order);
}
?>