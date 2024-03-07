<?php
require_once "pdo.php";
function tag_selectAll(){
    $sql = "select * from tags";
    return pdo_query($sql);
}

function tag_insert($name_tag){
    $sql = "insert into tags(name_tag) values (?)";
   return pdo_execute($sql,$name_tag);
}

function tag_delete($id_tag){
    $sql = "delete from tags where id_tag = ?";
   return pdo_execute($sql,$id_tag);
}

function tag_select_one($id_tag){
    $sql = "select * from tags where id_tag = ?";
    return pdo_query_one($sql,$id_tag);
}

function tag_update($name_tag,$id_tag){
    $sql = "update tags set name_tag = ? where id_tag = ?";
  return  pdo_execute($sql,$name_tag,$id_tag);

}

?>