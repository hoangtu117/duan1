<?php
require_once "../../bootstrap.php";
require "../../dao_pdo/category.php";
require "../../dao_pdo/product.php";
require "../../dao_pdo/image.php";
require "../../dao_pdo/tag.php";
require "../../dao_pdo/product_tag.php";
// $categories  = cate_selectAll();
extract($_REQUEST);
if(exist_param('about')){
    
    $VIEW_NAME = "trang-chinh/about.php";
}
elseif(exist_param('contact')){
    
    $VIEW_NAME = "trang-chinh/contact.php";
}
elseif(exist_param('shop')){
    if(exist_param('search')){
        if(exist_param('btn-search')){

         $search  = trim(strtolower($search));
        }else{
            $search = $_REQUEST['key'];
        }

        $product_all = product_selectAll();
        if(exist_param('sort')){
          $count = count($product_all);
          $tmp = array();
          if($sort=="price-asc"){
             for($i= 0;$i < $count;$i++){
                    for($j=$i+1 ;$j <  $count;$j++){
                      if($product_all[$i]['gia_goc'] > $product_all[$j]['gia_goc']){
                         $tmp = $product_all[$i] ;
                        $product_all[$i] = $product_all[$j];
                        $product_all[$j]  = $tmp;
                      }
                    }
             }
          }
          if($sort=="price-desc"){
            for($i= 0;$i < $count;$i++){
                   for($j=$i+1 ;$j <  $count;$j++){
                     if($product_all[$i]['gia_goc'] < $product_all[$j]['gia_goc']){
                        $tmp = $product_all[$i] ;
                       $product_all[$i] = $product_all[$j];
                       $product_all[$j]  = $tmp;
                     }
                   }
            }
         }
        }
        $search_all = [];
        foreach($product_all as $item){
            extract($item);
            $result =   image_select_one_image_by_productID($id_product);
            array_push($item,$result[0]['name_image']);
            $name_product = trim(strtolower($name_product));
            if(strpos($name_product,$search)!==false){
                array_push($search_all,$item);
            }
        }
        $counthanghoa = count($search_all);
        $count_all = $counthanghoa;
          $limit = 6;
         $total_page = ceil($counthanghoa/$limit);
        if(!isset($_GET['page'])){
           $curentPage = 1;
           $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_search =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty( $search_all[$i])){
                array_push( $products_page_search, $search_all[$i]);
            }
           }
           $count_product_in_page = count($products_page_search);
        }
        if(isset($_GET['page'])){
          $curentPage = $_GET['page'];
          
          if($curentPage<=0){
            $curentPage = 1;
          }
          if($curentPage > $total_page){
            $curentPage = $total_page;
          }
          $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_search =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty( $search_all[$i])){
                array_push( $products_page_search, $search_all[$i]);
            }
           }
           $count_product_in_page = ($curentPage-1)*6 + count($products_page_search);
        }
    }elseif(exist_param("id_cate")){
         $product_all  = product_by_id_cate($id_cate);
         if(exist_param('sort')){
          $count = count($product_all);
          $tmp = array();
          if($sort=="price-asc"){
             for($i= 0;$i < $count;$i++){
                    for($j=$i+1 ;$j <  $count;$j++){
                      if($product_all[$i]['gia_goc'] > $product_all[$j]['gia_goc']){
                         $tmp = $product_all[$i] ;
                        $product_all[$i] = $product_all[$j];
                        $product_all[$j]  = $tmp;
                      }
                    }
             }
          }
          if($sort=="price-desc"){
            for($i= 0;$i < $count;$i++){
                   for($j=$i+1 ;$j <  $count;$j++){
                     if($product_all[$i]['gia_goc'] < $product_all[$j]['gia_goc']){
                        $tmp = $product_all[$i] ;
                       $product_all[$i] = $product_all[$j];
                       $product_all[$j]  = $tmp;
                     }
                   }
            }
         }
        }
         $product_id_cate = [];
         foreach($product_all as $item){
            extract($item);
            $result =   image_select_one_image_by_productID($id_product);
            array_push($item,$result[0]['name_image']);
            array_push($product_id_cate,$item);
        }
        $counthanghoa = count($product_id_cate);
        $count_all = $counthanghoa;
          $limit = 6;
         $total_page = ceil($counthanghoa/$limit);
        if(!isset($_GET['page'])){
           $curentPage = 1;
           $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_cate =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty( $product_id_cate[$i])){
                array_push( $products_page_cate, $product_id_cate[$i]);
            }
           }
           $count_product_in_page = count($products_page_cate);
        }
        if(isset($_GET['page'])){
          $curentPage = $_GET['page'];
          
          if($curentPage<=0){
            $curentPage = 1;
          }
          if($curentPage > $total_page){
            $curentPage = $total_page;
          }
          $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_cate =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty( $product_id_cate[$i])){
                array_push( $products_page_cate, $product_id_cate[$i]);
            }
           }
           $count_product_in_page =($curentPage-1)*6 + count($products_page_cate);
        }
    }
    elseif(exist_param("id_tag")){
       $product_all = product_by_id_tag($id_tag);
       if(exist_param('sort')){
        $count = count($product_all);
        $tmp = array();
        if($sort=="price-asc"){
           for($i= 0;$i < $count;$i++){
                  for($j=$i+1 ;$j <  $count;$j++){
                    if($product_all[$i]['gia_goc'] > $product_all[$j]['gia_goc']){
                       $tmp = $product_all[$i] ;
                      $product_all[$i] = $product_all[$j];
                      $product_all[$j]  = $tmp;
                    }
                  }
           }
        }
        if($sort=="price-desc"){
          for($i= 0;$i < $count;$i++){
                 for($j=$i+1 ;$j <  $count;$j++){
                   if($product_all[$i]['gia_goc'] < $product_all[$j]['gia_goc']){
                      $tmp = $product_all[$i] ;
                     $product_all[$i] = $product_all[$j];
                     $product_all[$j]  = $tmp;
                   }
                 }
          }
       }
      }
       $product_id_tag = [];
       foreach($product_all as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push($product_id_tag,$item);
    }
         $counthanghoa = count($product_id_tag);
         $count_all = $counthanghoa;
          $limit = 6;
         $total_page = ceil($counthanghoa/$limit);
        if(!isset($_GET['page'])){
           $curentPage = 1;
           $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_tag =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty($product_id_tag[$i])){
                array_push( $products_page_tag,$product_id_tag[$i]);
            }
           }
           $count_product_in_page = count($products_page_tag);
        }
        if(isset($_GET['page'])){
          $curentPage = $_GET['page'];
          
          if($curentPage<=0){
            $curentPage = 1;
          }
          if($curentPage > $total_page){
            $curentPage = $total_page;
          }
          $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_tag =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty($product_id_tag[$i])){
                array_push( $products_page_tag,$product_id_tag[$i]);
            }
           }
           $count_product_in_page =($curentPage-1)*6 + count($products_page_tag);
        }
    }
    elseif(exist_param('filter')){
        if(exist_param('btn-filter')){

            $range = explode("-",str_replace("$","",$range_price));
           $range_down = trim($range[0]);
           $range_up =trim($range[1]);
        }else{

            $range_down = $_REQUEST['range_down'];
            $range_up = $_REQUEST['range_up'];
        }
     $product_all = product_range_price($range_down,$range_up);
     if(exist_param('sort')){
      $count = count($product_all);
      $tmp = array();
      if($sort=="price-asc"){
         for($i= 0;$i < $count;$i++){
                for($j=$i+1 ;$j <  $count;$j++){
                  if($product_all[$i]['gia_goc'] > $product_all[$j]['gia_goc']){
                     $tmp = $product_all[$i] ;
                    $product_all[$i] = $product_all[$j];
                    $product_all[$j]  = $tmp;
                  }
                }
         }
      }
      if($sort=="price-desc"){
        for($i= 0;$i < $count;$i++){
               for($j=$i+1 ;$j <  $count;$j++){
                 if($product_all[$i]['gia_goc'] < $product_all[$j]['gia_goc']){
                    $tmp = $product_all[$i] ;
                   $product_all[$i] = $product_all[$j];
                   $product_all[$j]  = $tmp;
                 }
               }
        }
     }
    }
     $product_range_all=[];
     foreach($product_all as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push($product_range_all,$item);
    }    
        $counthanghoa = count($product_range_all);
        $count_all = $counthanghoa;
          $limit = 6;
         $total_page = ceil($counthanghoa/$limit);
        if(!isset($_GET['page'])){
           $curentPage = 1;
           $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_filter =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty($product_range_all[$i])){
                array_push( $products_page_filter,$product_range_all[$i]);
            }
           }
           $count_product_in_page = count($products_page_filter);
        }
        if(isset($_GET['page'])){
          $curentPage = $_GET['page'];
          
          if($curentPage<=0){
            $curentPage = 1;
          }
          if($curentPage > $total_page){
            $curentPage = $total_page;
          }
          $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page_filter =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty($product_range_all[$i])){
                array_push( $products_page_filter,$product_range_all[$i]);
            }
           }
           $count_product_in_page =($curentPage-1)*6 + count($products_page_filter);
        }
    }
    else{
      $product_all = product_selectAll();
      if(exist_param('sort')){
        $count = count($product_all);
        $tmp = array();
        if($sort=="price-asc"){
           for($i= 0;$i < $count;$i++){
                  for($j=$i+1 ;$j <  $count;$j++){
                    if($product_all[$i]['gia_goc'] > $product_all[$j]['gia_goc']){
                       $tmp = $product_all[$i] ;
                      $product_all[$i] = $product_all[$j];
                      $product_all[$j]  = $tmp;
                    }
                  }
           }
        }
        if($sort=="price-desc"){
          for($i= 0;$i < $count;$i++){
                 for($j=$i+1 ;$j <  $count;$j++){
                   if($product_all[$i]['gia_goc'] < $product_all[$j]['gia_goc']){
                      $tmp = $product_all[$i] ;
                     $product_all[$i] = $product_all[$j];
                     $product_all[$j]  = $tmp;
                   }
                 }
          }
       }
      }
        $all_product = [];
        foreach($product_all as $item){
            extract($item);
            $result =   image_select_one_image_by_productID($id_product);
            array_push($item,$result[0]['name_image']);
            array_push($all_product,$item);
        }
        $results =  $all_product;
        $counthanghoa = count($results);
        $count_all = $counthanghoa;
        $limit = 6;
        $total_page = ceil($counthanghoa/$limit);
        if(!isset($_GET['page'])){
           $curentPage = 1;
           $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty( $all_product[$i])){
                array_push( $products_page, $all_product[$i]);
            }
           }
           $count_product_in_page = count( $products_page);
        }
        if(isset($_GET['page'])){
          $curentPage = $_GET['page'];
          
          if($curentPage<=0){
            $curentPage = 1;
          }
          if($curentPage > $total_page){
            $curentPage = $total_page;
          }
          $start_index = ($curentPage - 1)*6;
           $end_index = $curentPage*6;
           $products_page =[];
           for($i = $start_index;$i< $end_index;$i++){
            if(!empty( $all_product[$i])){
                array_push( $products_page, $all_product[$i]);
            }
           }
           $count_product_in_page =($curentPage-1)*6 + count( $products_page);
        }
    }
    $product_tag = tag_selectAll();
    $number_cate = product_count_by_cateID();
    $VIEW_NAME = "trang-chinh/shop.php";
}
elseif(exist_param('blog')){
    
    $VIEW_NAME = "trang-chinh/blog.php";
}
elseif(exist_param('detail')){
    header("location:".$SITE_URL."/chitiet/index.php?id_product=".$id_product);
}
else{
   $categories  = cate_selectAll();
    $dacbiet = product_dacbiet();
    $top_5 = product_top_5();
    $best_sale = [];
    $product_all = product_selectAll();
    $new_arrival = [];
    foreach($product_all as $item){
        extract($item);
        $result =   image_select_one_image_by_productID($id_product);
        array_push($item,$result[0]['name_image']);
        array_push($new_arrival,$item);
       }
       foreach($top_5 as $item){
           extract($item);
           $result =   image_select_one_image_by_productID($id_product);
           array_push($item,$result[0]['name_image']);
           array_push($best_sale,$item);
        }
    $deal_of_days = [];
    foreach($dacbiet as $item){
     extract($item);
     $result =   image_select_one_image_by_productID($id_product);
     array_push($item,$result[0]['name_image']);
     array_push($deal_of_days,$item);
    }
 $VIEW_NAME="trang-chinh/home.php";
}
require "../layout.php";
?>