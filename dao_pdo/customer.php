<?php
require_once('pdo.php');
function customer_selectAll(){
    $sql = "select * from customers";
    return pdo_query($sql);
}
function customer_selectone($id_customer){
    $sql = "select * from customers where id_customer = ?";
    return pdo_query_one($sql,$id_customer);
}
function customer_insert($id_customer,$mat_khau,$ho_ten,$kich_hoat,$hinh_anh,$email,$vai_tro){
    $sql = "insert into customers(id_customer,mat_khau,ho_ten,kich_hoat,hinh_anh,email,vai_tro) values (?,?,?,?,?,?,?)";
   return pdo_execute($sql,$id_customer,$mat_khau,$ho_ten,$kich_hoat,$hinh_anh,$email,$vai_tro);
}

function customer_delete($id_customer){
    $sql = "delete from customers where id_customer = ?";
   return pdo_execute($sql,$id_customer);
}

function customer_update($id_customer,$mat_khau,$ho_ten,$kich_hoat,$hinh_anh,$email,$vai_tro){
    $sql = "update customers set  mat_khau=?,ho_ten=?,kich_hoat=?,hinh_anh=?,email=?,vai_tro=? where id_customer = ?";
   return pdo_execute($sql,$mat_khau,$ho_ten,$kich_hoat,$hinh_anh,$email,$vai_tro,$id_customer);
}
function customer_change_password($mat_khau,$id_customer){
    $sql = "UPDATE customers SET mat_khau = ? where id_customer = ?";
   return pdo_execute($sql,$mat_khau,$id_customer);
}
function customer_check_email($email){
    $sql = "select * from customers where email = ?";
    return pdo_query_one($sql,$email);
}
function customer_change_account($id_customer,$hoten,$hinh_anh,$email){
    $sql =  "UPDATE customers SET ho_ten=?,hinh=?,email=? where id_customer = ?";
  return  pdo_execute($sql,$hoten,$hinh_anh,$email,$id_customer);
}
function customer_admin_update($id_customer,$kich_hoat,$vai_tro){
    $sql = "update customers set kich_hoat=?,vai_tro=? where id_customer = ?";
    return pdo_execute($sql,$kich_hoat,$vai_tro,$id_customer);
}
?>