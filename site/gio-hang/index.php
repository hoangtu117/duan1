<?php 
require "../../bootstrap.php";
require "../../dao_pdo/category.php";
require "../../dao_pdo/order.php";
require "../../dao_pdo/order_detail.php";
// $categories  = cate_selectAll();
if(exist_param('cart')){
    $VIEW_NAME = "gio-hang/cart.php";
}elseif(exist_param('checkout')){
    if(!empty($_SESSION['cart'])){
        $VIEW_NAME = 'gio-hang/checkout.php';
    }else{
        echo "
            <script>
            window.location.href = '".$SITE_URL."/trang-chinh/?shop';
            </script>
            ";
    }
}elseif(exist_param('btn-add-cart')){
    if(isset($_SESSION['cart'])){
        $name_product_all  = array_column($_SESSION['cart'],'name_product');
        if(in_array($_POST['name_product'],$name_product_all)){
            echo "
            <script>
            alert('Sản phẩm đã có sẵn trong giỏ hàng.');
            window.location.href = '".$SITE_URL."/gio-hang/?cart';
            </script>
            ";
        }else{
            $count  = count($_SESSION['cart']);
            $_SESSION['cart'][$count]  = $_POST;
            echo "
            <script>
            alert('Sản phẩm vừa được thêm vào trong giỏ hàng.');
            window.location.href = '".$SITE_URL."/trang-chinh/?shop';
            </script>
            ";
        }
    }else{
        $_SESSION['cart'][0] = $_POST;
        echo "
        <script>
        alert('Sản phẩm vừa được thêm vào trong giỏ hàng.');
        window.location.href = '".$SITE_URL."/trang-chinh/?shop';
        </script>
        ";
    }
}elseif(exist_param('btn-remove')){
     foreach($_SESSION['cart'] as $keys=> $values){
        if($values['name_product']==$_POST['name_product']){
            unset($_SESSION['cart'][$keys]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "
        <script>
        alert('Bạn đã xóa thành công.');
        window.location.href = '".$SITE_URL."/gio-hang/?cart';
        </script>
        ";
        }
     }
}
elseif(exist_param('btn-remove-cart')){
    foreach($_SESSION['cart'] as $keys=> $values){
       if($values['name_product']==$_POST['name_product']){
           unset($_SESSION['cart'][$keys]);
           $_SESSION['cart'] = array_values($_SESSION['cart']);
           echo "
       <script>
       alert('Bạn đã xóa thành công.');
       window.location.href = '".$SITE_URL."/gio-hang/?cart';
       </script>
       ";
       }
    }
}elseif(exist_param('Mod_quantity')){
  $mod_quantity = $_POST['Mod_quantity'];
  $name_product = $_POST['name_product'];
  foreach($_SESSION['cart'] as $keys=>$values){
    if($values['name_product']==$name_product){
        $_SESSION['cart'][$keys]['so_luong'] = $mod_quantity;
        echo "
       <script>
       window.location.href = '".$SITE_URL."/gio-hang/?cart';
       </script>
       ";
    }
  }
}elseif(exist_param('btn-purchase')){
   extract($_REQUEST);
   $date_order = date(("Y-m-d "));
   $checkout_errors = [];
   if(empty(trim($ho_ten))){
       $checkout_errors['ho_ten'] = "Vui lòng nhập đầy đủ họ tên.";
   }else{
       if(!preg_match( "/^[a-zA-Z_ÀÁÂÃÈÉÊẾÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêếìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\ ]+$/" , $ho_ten )){ 
        $checkout_errors['ho_ten'] = "Chỉ cho phép bảng chữ cái và khoảng trắng";

       }
   }
   if(empty(trim($address))){
       $checkout_errors['address'] = "Vui lòng nhập đầy đủ địa chỉ.";
    }else{
        if(!preg_match('/^[a-z0-9A-Z_ÀÁÂÃÈÉÊẾÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêếìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ,\-\/\ ]+$/',$address)){
            $checkout_errors['address'] = "Định dạng địa chỉ không đúng";
        }
    }
   if(empty(trim($email))){
      $checkout_errors['email'] = "Vui lòng nhập đầy đủ email.";
   }else{
    if(!filter_var( $email , FILTER_VALIDATE_EMAIL)){
        $checkout_errors['email'] = "Định dạng email không hợp lệ";
    }
   }
   if(empty(trim($phone))){
       $checkout_errors['phone'] = "Vui lòng nhập đầy đủ phone number.";
    }else{
        if(!preg_match ( "/^[0-9]*$/" ,  $phone )){
            $checkout_errors['phone'] = "Chỉ cho phép giá trị số.";
        }
        if(strlen  ( $phone ) != 10){
         $checkout_errors['phone'] ="Số điện thoại di động phải chứa 10 chữ số.";
        }
    }
    if(count($checkout_errors)>0){
        $_SESSION['checkout_errors']  = $checkout_errors;
        header("location:".$SITE_URL."/gio-hang/?checkout");
    }else{
        unset( $_SESSION['checkout_errors']);
        $result  = order_insert($id_customer,$date_order,$tinh_trang="Đang chuẩn bị hàng",$ho_ten,$address,$email,$phone);
        if($result){
          $last_id  =  $result->lastInsertId();
          $_SESSION['order_id'] = $last_id;
          foreach($_SESSION['cart'] as $cart){
              extract($cart);  
            $detail =   order_detail_insert($last_id ,$id_product,$so_luong);
            if($detail){
              echo "
             <script>
             window.location.href = '".$SITE_URL."/gio-hang/?complete_order';
             </script>
             ";
            }
      
      
          }
        }
    }
}elseif(exist_param('complete_order')){
    $_SESSION['complete']= $_SESSION['cart'];
    unset($_SESSION['cart']);
    $VIEW_NAME = "complete_order.php";
}elseif(exist_param('back-shop')){
    echo "
             <script>
             window.location.href = '".$SITE_URL."/trang-chinh/?shop';
             </script>
             ";
}
require "../layout.php";
?>