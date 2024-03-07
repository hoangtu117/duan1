<?php
require('../../bootstrap.php');
require('../../dao_pdo/product.php');
require "../../dao_pdo/category.php";
require "../../dao_pdo/image.php";
require "../../dao_pdo/tag.php";
require '../../dao_pdo/product_tag.php';
extract($_REQUEST);
$tags = tag_selectAll();
$category = cate_selectAll();
$results = product_selectAll();
if(exist_param('btn-list')){
  unset( $_SESSION['errors_hh']);
  $countproduct = count($results);
  $limit = 6;
  $total_page = ceil($countproduct/$limit);
  if(!isset($_GET['page'])){
     $curentPage = 1;
     $curentStart = ($curentPage-1)*$limit;
     $products = product_page($curentStart,6);
     $product_all = [];
     foreach($products as $item){
      extract($item);
      $result =   image_select_one_image_by_productID($id_product);
      array_push($item,$result[0]['name_image']);
      array_push($product_all,$item);
    }
  }
  if(isset($_GET['page'])){
    $curentPage = $_GET['page'];
    
    if($curentPage<=0){
      $curentPage = 1;
    }
    if($curentPage > $total_page){
      $curentPage = $total_page;
    }
    $curentStart = ($curentPage-1)*$limit;
    $products = product_page($curentStart); 
    $product_all = [];
     foreach($products as $item){
      extract($item);
      $result =   image_select_one_image_by_productID($id_product);
      array_push($item,$result[0]['name_image']);
      array_push($product_all,$item);
    }
  }
  $VIEW_NAME = 'list.php';

}elseif(exist_param('add_product')){
  $VIEW_NAME  = "add.php";
}
elseif(exist_param('btn-search')){
  $keys =trim(strtolower( $_POST['keyword']));
  $item1 = product_selectAll();
  $total =[];
  foreach ($item1 as $hh){
      if(strpos(trim(strtolower($hh['name_product'])),$keys)!== false){
          array_push($total,$hh);
      }
  }
  if(count($total)> 0){
      $product = [];
      foreach($total as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push( $product,$item);
      }
  }
  $VIEW_NAME = "search.php";
}
elseif(exist_param('btn-edit')){
 $id_product  = $_REQUEST['id_product'];
 $result = product_detail_byID($id_product);
 extract($result);
 $VIEW_NAME  = "edit.php";
}elseif(exist_param('btn-update')){
    $errors = [];
    $name_product = $_POST['name_product'];
    $gia_goc = $_POST['gia_goc'];
    $gia_moi = $_POST['gia_moi'];
    $ngay_nhap  =$_POST["ngay_nhap"];
    $mo_ta  =$_POST['mo_ta'];
    $dac_biet =$_POST['dac_biet'];
    $so_luot_xem =0;
    $id_cate = $_POST['id_cate'];
    $id_product = $_POST['id_product'];
    $id_tag = $_POST['id_tag'];
    $id_tag_old = $_POST['tag_old'];
    if(empty($name_product)){
      $errors['name_product'] = "Vui lòng nhập tên hàng hóa";
    }
    if(empty($gia_goc)){
      $errors['gia_goc'] = "Vui lòng nhập giá gốc";
    }
    if(empty($gia_moi)){
      $errors['gia_moi'] = "Vui lòng nhập giá mới";
    }
    if(empty($dac_biet)&&$dac_biet!=0){
      $errors['dac_biet'] = "Vui lòng nhập đặc biệt";
    }
    if(empty($ngay_nhap)){
      $errors['ngay_nhap']  = "Vui lòng nhập ngày nhập";
    }
    if(empty($mo_ta )){
      $errors['mo_ta']  = "Vui lòng nhập mô tả";
    }
    if(empty($id_cate )){
      $errors['id_cate']  = "Vui lòng nhập mã loại";
    }
    if(count(array_filter($errors))>0){
      $_SESSION['errors_hh']  = $errors;
      header("Location:".$ADM_URL."/product/index.php?btn-edit&id_product=$id_product");
    }else{
      unset($_SESSION['errors_hh']);
     $con= product_update($id_product,$name_product,$gia_goc,$gia_moi,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$id_cate);
     if($con){
      $product_tag = product_tag_selectOne_by_tagID($id_tag_old,$id_product);
      $result = product_tag_update($id_product,$id_tag,$product_tag['id_product_tag']);
     }

      setcookie("update","Bạn đã update thành công!", time()+1);
      header("Location:".$ADM_URL."/product/index.php?btn-list");
    }
}
elseif(exist_param('btn-delete')){
    product_delete($id_product);
    setcookie("delete","Bạn đã xóa thành công!", time()+1);
    header("Location:".$ADM_URL."/product/index.php?btn-list");
}
elseif(exist_param('btn-add')){
  $errors=[];
    $name_product = $_POST['name_product'];
    $gia_goc = $_POST['gia_goc'];
    $gia_moi = $_POST['gia_moi'];
    $ngay_nhap  =$_POST["ngay_nhap"];
    $mo_ta  =$_POST['mo_ta'];
    $dac_biet =$_POST['dac_biet'];
    $so_luot_xem = 0;
    $id_cate = $_POST['id_cate'];
    $id_tag = $_POST['id_tag'];
    $hinh_anh = saveFile("hinh_anh");
    if(empty($name_product)){
      $errors['name_product'] = "Vui lòng nhập tên hàng hóa";
    }
    if(empty($gia_goc)){
      $errors['gia_goc'] = "Vui lòng nhập giá gốc";
    }
    if(empty($gia_moi)){
      $errors['gia_moi'] = "Vui lòng nhập giá mới";
    }
    if(empty($dac_biet)&&$dac_biet!=0){
      $errors['dac_biet'] = "Vui lòng nhập đặc biệt";
    }
    if(empty($ngay_nhap)){
      $errors['ngay_nhap']  = "Vui lòng nhập ngày nhập";
    }
    if(empty($mo_ta )){
      $errors['mo_ta']  = "Vui lòng nhập mô tả";
    }
    if(empty($id_cate )){
      $errors['id_cate']  = "Vui lòng nhập mã loại";
    }
    if(count(array_filter($errors))>0){
      $_SESSION['errors_hh']  = $errors;
      header("Location:".$ADM_URL."/product/index.php?add_product");
    }else{
      unset( $_SESSION['errors_hh']);
      $con = product_insert($name_product,$gia_goc,$gia_moi,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$id_cate); 
      if($con){
        $last_id = $con ->lastInsertId();
        product_tag_insert($last_id,$id_tag);
        image_insert($hinh_anh,$last_id);
      }
      setcookie("add","Bạn đã thêm mới thành công!", time()+1);
      $VIEW_NAME = 'list.php';
      header("Location:".$ADM_URL."/product/index.php?btn-list");
    }
}elseif(exist_param('btn-delete-select')){
  $data = $_POST;
  if(is_array($data)){
    foreach($data as $key=>$value){
      $id_product = $value;
      product_delete($id_product);
    }
  }

  setcookie("delete","Bạn đã xóa thành công!", time()+1);
  header("Location:".$ADM_URL."/product/index.php?btn-list");
}
else{
  unset( $_SESSION['errors_hh']);
  $countproduct = count($results);
  $limit = 6;
  $total_page = ceil($countproduct/$limit);
  if(!isset($_GET['page'])){
     $curentPage = 1;
     $curentStart = ($curentPage-1)*$limit;
     $products = product_page($curentStart,6);
     $product_all = [];
     foreach($products as $item){
      extract($item);
      $result =   image_select_one_image_by_productID($id_product);
      array_push($item,$result[0]['name_image']);
      array_push($product_all,$item);
    }
  }
  if(isset($_GET['page'])){
    $curentPage = $_GET['page'];
    
    if($curentPage<=0){
      $curentPage = 1;
    }
    if($curentPage > $total_page){
      $curentPage = $total_page;
    }
    $curentStart = ($curentPage-1)*$limit;
    $products = product_page($curentStart); 
    $product_all = [];
     foreach($products as $item){
      extract($item);
      $result =   image_select_one_image_by_productID($id_product);
      array_push($item,$result[0]['name_image']);
      array_push($product_all,$item);
    }
  }
  $VIEW_NAME = 'list.php';
}
require('../layout-adm.php')

?>