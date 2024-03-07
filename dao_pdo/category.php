<?php 
require_once "pdo.php";

//Hàm truy vấn cả bảng loại hàng
function cate_selectAll(){
    $sql = "select * from categories";
    return pdo_query($sql);
}

//Hàm thêm loại hàng

function cate_insert($name_cate){
    $sql = "insert into categories(name_cate) values (?)";
   return pdo_execute($sql,$name_cate);
}


//Xóa loại hàng
function cate_delete($id_cate){
    $sql = "delete from categories where id_cate = ?";
  return  pdo_execute($sql,$id_cate);
}

function cate_select_one($id_cate){
    $sql = "select * from categories where id_cate = ?";
    return pdo_query_one($sql,$id_cate);
}

function cate_update($name_cate,$id_cate){
    $sql = "update categories set name_cate = ? where id_cate = ?";
  return  pdo_execute($sql,$name_cate,$id_cate);

}
?>