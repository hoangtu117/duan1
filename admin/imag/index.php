<?php 
require "../../bootstrap.php";
require '../../dao_pdo/image.php';
require '../../dao_pdo/product.php';
extract($_REQUEST);
if(exist_param('view-image')){
  $image_all =  image_selectAll_by_productID($id_product);
 $VIEW_NAME  ='image_list.php';
}elseif(exist_param('edit_image')){
$VIEW_NAME = "edit.php";
}elseif(exist_param('btn-update')){
    $name_image = $_FILES['name_image']['name'];
    $id_product = $_POST['id_product'];
    $id_image  = $_POST['id_image'];
   $errorrs = [];
   if(empty($name_image)){
     $errorrs['name_image'] = "Vui lòng chọn file ảnh";
    }
    if(count($errorrs)>0){
     $_SESSION['name_image'] = $errorrs['name_image'];
     header("Location:".$ADM_URL."/imag/index.php?edit_image&id_image=$id_image&id_product=$id_product");
   }else{
    unset($_SESSION['name_image']);
    image_update($name_image,$id_product,$id_image);
     setcookie("update","Bạn đã update thành công!", time()+1);
     header("Location:".$ADM_URL."/imag/index.php?view-image&id_product=$id_product");
   }
}elseif(exist_param('btn-search')){
  $keys =trim(strtolower( $_POST['keyword']));
  $item1 = product_selectAll();
  $total =[];
  foreach ($item1 as $hh){
      if(strpos(trim(strtolower($hh['name_product'])),$keys)!== false){
          array_push($total,$hh);
      }
  }
  if(count($total)> 0){
      $products = [];
      foreach($total as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push( $products,$item);
      }
  }
  $VIEW_NAME = "search.php";
}
elseif(exist_param('add_image')){
    $VIEW_NAME = 'add.php';
}elseif(exist_param('btn-delete')){
    image_delete($id_image);
    setcookie("delete","Bạn đã xóa thành công!", time()+1);
    header("Location:".$ADM_URL."/imag/index.php?view-image&id_product=$id_product");

}elseif(exist_param('btn-add')){
    $name_image = $_FILES['name_image']['name'];
    $id_product = $_POST['id_product'];
   $errorrs = [];
   if(empty($name_image)){
     $errorrs['name_image'] = "Vui lòng chọn file ảnh";
    }
    if(count($errorrs)>0){
     $_SESSION['name_image'] = $errorrs['name_image'];
     header("Location:".$ADM_URL."/imag/index.php?add_image&id_product=$id_product");
   }else{
    unset($_SESSION['name_image']);
    $image = saveFile('name_image');
     image_insert($image,$id_product);
     setcookie("add","Bạn đã thêm mới thành công!", time()+1);
     header("Location:".$ADM_URL."/imag/index.php?view-image&id_product=$id_product");
   }
}
else{
    $results = product_selectAll();
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
    $VIEW_NAME = "product_list.php";
}
require '../layout-adm.php';
?>