<?php
require_once "pdo.php";
function product_tag_selectOne_by_tagID($id_tag,$id_product){
    $sql = "select * from product_tag where id_tag = ? and id_product=?";
    return pdo_query_one($sql,$id_tag,$id_product);
}
function product_tag_selectAll_by_tagID($id_tag){
  $sql = "select * from product_tag where id_tag = ?";
  return pdo_query($sql,$id_tag);
}

function product_tag_insert($id_product,$id_tag){
    $sql = "insert into product_tag(id_product,id_tag) values (?,?)";
  return  pdo_execute($sql,$id_product,$id_tag);
}

function product_tag_delete($id_product_tag){
    $sql = "delete from product_tag where id_producta_tag=?";
  return  pdo_execute($sql,$id_product_tag);
}
function product_tag_update($id_product,$id_tag,$id_product_tag){
    $sql = "update product_tag set id_product = ?,id_tag=? where id_product_tag = ?";
   return pdo_execute($sql,$id_product,$id_tag,$id_product_tag);

}
?>