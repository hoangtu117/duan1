<?php 
require_once "pdo.php";

function image_selectAll_by_productID($id_product){
    $sql = "select * from images where id_product = ?";
    return pdo_query($sql,$id_product);
}
function image_insert($name_image,$id_product){
    $sql = "insert into images(name_image,id_product) values (?,?)";
   return pdo_execute($sql,$name_image,$id_product);
}
function image_select_one_image_by_productID($id_product){
    $sql = "select name_image from images where id_product = ? LIMIT 1";
    return pdo_query($sql,$id_product);
}
function image_delete($id_image){
    $sql = "delete from images where id_image = ?";
   return pdo_execute($sql,$id_image);
}
function image_update($name_image,$id_product,$id_image){
    $sql = "update images set name_image = ?,id_product= ? where id_image = ?";
   return pdo_execute($sql,$name_image,$id_product,$id_image);

}
function image_select_one($id_image){
    $sql = "select * from images where id_image = ?";
    return pdo_query_one($sql,$id_image);
}
?>