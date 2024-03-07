<?php
require_once "pdo.php";
function product_selectAll(){
    $sql = "select * from products";
    return pdo_query($sql);
}
function product_selectone($id_product){
    $sql = "select * from products where id_product = ?"; 
    return pdo_query_one($sql,$id_product);
}
function product_insert($name_product,$gia_goc,$gia_moi,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$id_cate){
    $sql = "insert into products(name_product,gia_goc,gia_moi,ngay_nhap,mo_ta,dac_biet,so_luot_xem,id_cate) values (?,?,?,?,?,?,?,?)";
   return pdo_execute($sql,$name_product,$gia_goc,$gia_moi,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$id_cate);
}

function product_delete($id_product){
    $sql = "delete from products where id_product = ?";
   return pdo_execute($sql,$id_product);
}

function product_update($id_product,$name_product,$gia_goc,$gia_moi,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$id_cate){
    $sql = "update products set  name_product =?,gia_goc=?,gia_moi=?,ngay_nhap=?,mo_ta=?,dac_biet=?,so_luot_xem=?,id_cate=? where id_product = ?";
   return pdo_execute($sql,$name_product,$gia_goc,$gia_moi,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$id_cate,$id_product);
}
function product_update_id_cate($id_product,$id_cate){
    $sql = "update products set  id_cate=? where id_product = ?";
   return pdo_execute($sql,$id_cate,$id_product);
}
function product_top_5(){
    $sql = 'SELECT * FROM products where so_luot_xem > 0 ORDER BY so_luot_xem DESC limit 0,5 ';
    return pdo_query($sql);
}
function product_dacbiet(){
    $sql = "SELECT * FROM products where dac_biet = 1";
    return pdo_query($sql);
}
function product_tang_luot_xem($id_product){
    $sql = "UPDATE products SET so_luot_xem = so_luot_xem + 1 where id_product = ?";
    pdo_execute($sql,$id_product);
}
function product_by_id_cate($id_cate){
    $sql = "SELECT * FROM products where id_cate = ?";
    return pdo_query($sql,$id_cate);
}
function product_page($start,$limit=6){
    $sql = "SELECT * FROM products LIMIT $start, $limit";
    return pdo_query($sql);
}
function product_count_by_cateID(){
    $sql = "select categories.name_cate,count(id_product)as count,categories.id_cate from products inner join categories on products.id_cate = categories.id_cate group by(products.id_cate)";
    return pdo_query($sql);
}
function product_detail_byID($id_product){
    $sql = "select products.*, tags.name_tag,categories.name_cate,categories.id_cate from products inner join product_tag on products.id_product = product_tag.id_product 
    inner join tags on tags.id_tag = product_tag.id_tag inner join categories on categories.id_cate = products.id_cate where product_tag.id_product = ? ";
    return pdo_query_one($sql,$id_product);
}
function product_by_id_tag($id_tag){
    $sql = "select products.*from products inner join product_tag on products.id_product = product_tag.id_product 
    inner join tags on tags.id_tag = product_tag.id_tag where product_tag.id_tag = ?";
    return pdo_query($sql,$id_tag);
}
function product_range_price($range_down,$range_up){
    $sql  = "select * from products where gia_moi >= ? AND gia_moi <= ?";
    return pdo_query($sql,$range_down,$range_up);
}
?>