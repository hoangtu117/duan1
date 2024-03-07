<?php
require "../../bootstrap.php";
require "../../dao_pdo/product.php";
require "../../dao_pdo/image.php";
require "../../dao_pdo/product_tag.php";
require "../../dao_pdo/category.php";
extract($_REQUEST);
if(exist_param("id_product")){
    // $categories  = cate_selectAll();
    $image_all = image_selectAll_by_productID($id_product);
    $product_detail = product_detail_byID($id_product);
    product_tang_luot_xem($id_product);
    $product_detail_image = [];
            $result =   image_select_one_image_by_productID($product_detail['id_product']);
            array_push($product_detail,$result[0]['name_image']);
            array_push($product_detail_image ,$product_detail);
    $id_cate = $product_detail['id_cate'];
    $product_all_idcate = product_by_id_cate($id_cate);
    $product_relation = [];
    foreach($product_all_idcate as $item){
        extract($item);
        if($id_product!=$product_detail['id_product']){
            extract($item);
            $result =   image_select_one_image_by_productID($id_product);
            array_push($item,$result[0]['name_image']);
            array_push($product_relation,$item);
        }
    }
    $VIEW_NAME  = "chitiet/detail_product.php";
}
require "../layout.php";
?>