<?php
  require('../../bootstrap.php');
  require('../../dao_pdo/category.php');
  require('../../dao_pdo/product.php');
  require('../../dao_pdo/image.php');
 extract($_REQUEST);
  if(exist_param('btn-list')){
    $results = cate_selectAll();
    $VIEW_NAME = 'list.php';
  }elseif(exist_param('add_category')){
    $VIEW_NAME = 'add.php';
  }
  elseif(exist_param('btn-edit')){
   $id_cate  = $_REQUEST['id_cate'];
   $result = cate_select_one($id_cate);
   extract($result);
   $VIEW_NAME  = "edit.php";
  }elseif(exist_param('btn-update')){
      $name_cate = $_POST['name_cate'];
      $id_cate = $_POST['id_cate'];
      $errorrs = [];
   if(empty($name_cate)){
     $errorrs['name_cate'] = "Vui lòng nhập đầy đủ loại hàng";
    }
    if(count($errorrs)>0){
      $_SESSION['name_cate'] = $errorrs['name_cate'];
      header("Location:".$ADM_URL."/category/index.php?btn-edit&id_cate=$id_cate");
    }else{
      unset($_SESSION['name_cate']);
      cate_update($name_cate,$id_cate);
      setcookie("update"," Bạn đã update thành công!", time()+1);
      header("Location:".$ADM_URL."/category/index.php?btn-list");
    }
  }
  elseif(exist_param('btn-delete')){
      $hanghoa = product_by_id_cate($id_cate);
      $products = [];
      foreach($hanghoa as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push($products,$item);
      }
      $category_all = cate_selectAll();
      $category  = [];
      foreach($category_all as $item){
           if($item['id_cate']!=$id_cate){
            array_push($category,$item);
           }
      }
      if(count($hanghoa)> 0){
            $VIEW_NAME = "chitietdanhmuc.php";
      }else{
        cate_delete($id_cate);
        setcookie("delete","Bạn đã xóa thành công!", time()+1);
        header("Location:".$ADM_URL."/category/index.php?btn-list");
      }
  }
  elseif(exist_param('btn-add')){
   $name_cate = $_POST['name_cate'];
   $errorrs = [];
   if(empty($name_cate)){
     $errorrs['name_cate'] = "Vui lòng nhập đầy đủ loại hàng";
    }
    if(count($errorrs)>0){
     $_SESSION['name_cate'] = $errorrs['name_cate'];
     header("Location:".$ADM_URL."/category/index.php");
   }else{
    unset($_SESSION['name_cate']);
     cate_insert($name_cate);
     setcookie("add","Bạn đã thêm mới thành công!", time()+1);
     header("Location:".$ADM_URL."/category/index.php?btn-list");
   }
  }elseif(exist_param('btn-delete-select')){
    $data = $_POST;
    if(is_array($data)){
      foreach($data as $key=>$value){
            $id_cate = $value;
            cate_delete($id_cate);
      }
    }
    setcookie("delete","Bạn đã xóa thành công!", time()+1);
    header("Location:".$ADM_URL."/category/index.php?btn-list");

  }
  elseif(exist_param('btn-delete-hh')){
    $product = product_selectone($id_product);
    extract($product);
    product_delete($id_product);
    setcookie("delete","Bạn đã xóa thành công!", time()+1);
    header("Location:".$ADM_URL."/category/index.php?btn-delete&id_cate=$id_cate");
  }elseif(exist_param('btn-delete-select-hh')){
    $data = $_POST;
    $id_cate = $_POST['id_cate'];
    $data = array_filter($data);
    $end_data=  array_pop($data);
  if(is_array($data)){
    foreach($data as $key=>$value){
      $id_product = $value;
      product_delete($id_product);
    }
  }
  setcookie("delete","Bạn đã xóa thành công!", time()+1);
  header("Location:".$ADM_URL."/category/index.php?btn-delete&id_cate=$id_cate");
  }elseif(exist_param('btn-update-select-hh')){
    $data = $_POST;
    $id_cate = $_POST['id_cate'];
    $category = $_POST['category'];
    $data = array_filter($data);
    $end_data=  array_pop($data);
    if(is_array($data)){
      foreach($data as $key=>$value){
            $id_product = $value;
            product_update_id_cate($id_product, $category );
      }
    }
    header("Location:".$ADM_URL."/category/index.php?btn-delete&id_cate=$id_cate");
  }
  else{
    $results = cate_selectAll();
    $VIEW_NAME = 'list.php';
  }
  require('../layout-adm.php');

?>