<?php
  require('../../bootstrap.php');
  require('../../dao_pdo/tag.php');
  require('../../dao_pdo/product_tag.php');
  require('../../dao_pdo/product.php');
  require('../../dao_pdo/image.php');
 extract($_REQUEST);
  if(exist_param('btn-list')){
    $results = tag_selectAll();
    $VIEW_NAME = 'list.php';
  }elseif(exist_param('add-tag')){
    $VIEW_NAME = 'add.php';
  }
  elseif(exist_param('btn-edit')){
   $id_tag  = $_REQUEST['id_tag'];
   $result = tag_select_one($id_tag);
   extract($result);
   $VIEW_NAME  = "edit.php";
  }elseif(exist_param('btn-update')){
      $name_tag = $_POST['name_tag'];
      $id_tag = $_POST['id_tag'];
      $errorrs = [];
   if(empty($name_tag)){
     $errorrs['name_tag'] = "Vui lòng nhập đầy đủ tên tag";
    }
    if(count($errorrs)>0){
      $_SESSION['name_tag'] = $errorrs['name_tag'];
      header("Location:".$ADM_URL."/tag/index.php?btn-edit&id_tag=$id_tag");
    }else{
      unset($_SESSION['name_tag']);
      tag_update($name_tag,$id_tag);
      setcookie("update","Bạn đã update thành công!", time()+1);
      header("Location:".$ADM_URL."/tag/index.php?btn-list");
    }
  }
  elseif(exist_param('btn-delete')){
      $products = product_by_id_tag($id_tag);
      $product_all = [];
      foreach($products as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push($product_all,$item);
      }
      $tag_all = tag_selectAll();
      $tags  = [];
      foreach($tag_all as $item){
           if($item['id_tag']!=$id_tag){
            array_push($tags,$item);
           }
      }
      if(count($products )> 0){
            $VIEW_NAME = "chitiet_tag.php";
      }else{
        tag_delete($id_tag);
        setcookie("delete","Bạn đã xóa thành công!", time()+1);
        header("Location:".$ADM_URL."/tag/index.php?btn-list");
      }
  }
  elseif(exist_param('btn-add')){
   $name_tag = $_POST['name_tag'];
   $errorrs = [];
   if(empty($name_tag)){
     $errorrs['name_tag'] = "Vui lòng nhập đầy đủ tên tag";
    }
    if(count($errorrs)>0){
     $_SESSION['name_tag'] = $errorrs['name_tag'];
     header("Location:".$ADM_URL."/tag/index.php");
   }else{
    unset($_SESSION['name_tag']);
     tag_insert($name_tag);
     setcookie("add","Bạn đã thêm mới thành công!", time()+1);
     header("Location:".$ADM_URL."/tag/index.php?btn-list");
   }
  }elseif(exist_param('btn-delete-select')){
    $data = $_POST;
    if(is_array($data)){
      foreach($data as $key=>$value){
            $id_tag = $value;
            tag_delete($id_tag);
      }
    }
    setcookie("delete","Bạn đã xóa thành công!", time()+1);
    header("Location:".$ADM_URL."/tag/index.php?btn-list");

  }
  elseif(exist_param('btn-delete-hh')){
    $product = product_selectone($id_product);
    extract($product);
    product_delete($id_product);
    setcookie("delete","Bạn đã xóa thành công!", time()+1);
    header("Location:".$ADM_URL."/tag/index.php?btn-delete&id_tag=$id_tag");
  }elseif(exist_param('btn-delete-select-hh')){
    $data = $_POST;
    $id_tag = $_POST['id_tag'];
    $data = array_filter($data);
    $end_data=  array_pop($data);
  if(is_array($data)){
    foreach($data as $key=>$value){
      $id_product = $value;
      product_delete($id_product);
    }
  }
  setcookie("delete","Bạn đã xóa thành công!", time()+1);
  header("Location:".$ADM_URL."/tag/index.php?btn-delete&id_tag=$id_tag");
  }elseif(exist_param('btn-update-select-hh')){
    $data = $_POST;
    $id_tag = $_POST['id_tag'];
    $tag = $_POST['tag'];
    $data = array_filter($data);
    $end_data=  array_pop($data);
    if(is_array($data)){
      foreach($data as $key=>$value){
            $id_product = $value;
            $product_tag = product_tag_selectOne_by_tagID($id_tag,$id_product);
            product_tag_update($id_product,$tag,$product_tag['id_product_tag']);
      }
    }
    header("Location:".$ADM_URL."/tag/index.php?btn-delete&id_tag=$id_tag");
  }
  else{
    $results = tag_selectAll();
    $VIEW_NAME = 'list.php';
  }
  require('../layout-adm.php');

?>