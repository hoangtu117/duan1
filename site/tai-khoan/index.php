<?php
require "../../bootstrap.php";
require "../../dao_pdo/customer.php";
require "../../dao_pdo/order_detail.php";
require "../../dao_pdo/order.php";
require_once "../../dao_pdo/product.php";
require "../../dao_pdo/image.php";
require '../../dao_pdo/category.php';
extract($_REQUEST);
// $categories  = cate_selectAll();
if(exist_param('login')){
    if(isset( $_SESSION['user'])){
        header("location:".$SITE_URL."/trang-chinh/index.php");
    }else{
        $VIEW_NAME = "tai-khoan/login.php";
    }
}
elseif(exist_param('my_account')){
    if(isset( $_SESSION['user'])){
        if(exist_param('id_order')){
            extract($_REQUEST);
            $order_detail_orderID = order_detail_selectAll_by_orderID($id_order);
            $order_detail_orderID_img = [];
            foreach($order_detail_orderID as $item){
                extract($item);
                $result =   image_select_one_image_by_productID($id_product);
                array_push($item,$result[0]['name_image']);
                array_push($order_detail_orderID_img,$item);
            }          
        }elseif(exist_param('id_order_detail')){
            echo "ok";
            die;
        }
        else{
    
            $order_by_userID =  order_by_customerID($_SESSION['user']['id_customer']);
            $order_all_by_userID = [];
            foreach($order_by_userID as $order){
                extract($order);
                $total = 0;
                $order_detail_orderID = order_detail_selectAll_by_orderID($id_order);
                foreach($order_detail_orderID as $item){
                    extract($item);
                    $total = $total + $so_luong*$gia_moi;
                    
                }
                array_push($order,$total);
                array_push($order_all_by_userID,$order);
            }
        }
        $VIEW_NAME = "tai-khoan/my_account.php"; 
    }else{
        $VIEW_NAME = "tai-khoan/login.php";
    }
      
}
elseif(exist_param('register')){
    $VIEW_NAME = "tai-khoan/register.php";   
}elseif(exist_param('btn-login')){
    $errorrs = [];
    if(empty(trim($id_customer))){
      $errorrs['id_customer'] = "Vui lòng nhập đầy đủ tài khoản";
     }
     if(empty(trim($mat_khau))){
        $errorrs['mat_khau'] = "Vui lòng nhập đầy đủ mật khẩu";
       }
     if(count($errorrs)>0){
      $_SESSION['errors'] = $errorrs;
      header("Location:".$SITE_URL."/tai-khoan/?login");
    }else{
     unset($_SESSION['errors']);
     $customer = customer_selectone($id_customer);
     if(!empty($customer)){
         if($customer['mat_khau']==$mat_khau){
             $_SESSION['user']  = $customer;
             header("location:".$SITE_URL."/trang-chinh/index.php");
         }else{
             echo "
             <script>
             alert('Tài khoản hoặc mật khẩu không đúng vui lòng thử lại.');
             window.location.href  = '".$SITE_URL."/tai-khoan/?login';
             </script>
             ";
         }
     }else{
         echo "
         <script>
         alert('Tài khoản hoặc mật khẩu không đúng vui lòng thử lại .');
         window.location.href  = '".$SITE_URL."/tai-khoan/?login';
         </script>
         ";
     }
    }
}elseif(exist_param('btn-register')){
    $errorrs = [];
    $id_customer = $_POST['id_customer'];
    $ho_ten = $_POST['ho_ten'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $image_name = $_FILES['hinh_anh']['name'];
    $check_mat_khau = $_POST['check_mat_khau'];
    

    if(empty(trim($id_customer))){
      $errorrs['id_customer'] = "Vui lòng nhập đầy đủ tài khoản";
    }
    if(empty(trim($mat_khau))){
        $errorrs['mat_khau'] = "Vui lòng nhập đầy đủ mật khẩu";
    }
    if(empty(trim($ho_ten))){
        $errorrs['ho_ten'] = "Vui lòng nhập đầy đủ họ tên";
    }
    if(empty(trim($email))){
          $errorrs['email'] = "Vui lòng nhập đầy đủ email";
    }
    if(empty(trim($image_name))){
            $errorrs['image_name'] = "Vui lòng nhập file ảnh";
    }
    if(empty(trim($check_mat_khau))){
              $errorrs['check_mat_khau'] = "Vui lòng nhập đầy đủ confirm mật khẩu";
    }else{
        if($check_mat_khau!==$mat_khau){
            $errorrs['check_mat_khau'] = "Confirm mật khẩu không chính xác vui lòng nhập lại";
        }
    }
     if(count($errorrs)>0){
      $_SESSION['errors'] = $errorrs;
      header("Location:".$SITE_URL."/tai-khoan/?register");
    }else{
        unset( $_SESSION['errors']);

        if($mat_khau==$check_mat_khau){
    
            $hinh_anh = saveFile('hinh_anh');
           $result = customer_insert($id_customer,$mat_khau,$ho_ten,$kich_hoat=1,$hinh_anh,$email,$vaitro=0);
           if($result){
            echo "
                <script>
                alert('Bạn đã đăng ký thành công vui lòng đăng nhập để sử dụng dịch vụ!');
                window.location.href  = '".$SITE_URL."/tai-khoan/?login';
                </script>
                ";
           }else{
            echo "
            <script>
            alert('Đăng ký không thành công vui lòng thử lại.');
            window.location.href  = '".$SITE_URL."/tai-khoan/?register';
            </script>
            ";
           }
        }
    }

}
elseif(exist_param('logout')){
    unset($_SESSION['user']);
    header("location:".$SITE_URL."/trang-chinh/index.php");
}elseif(exist_param('btn-delete')){
    extract($_REQUEST);
    $result  = order_delete($id_order);
    if($result){
        if(isset($_SESSION['user'])){
            unset($_SESSION['cart']);
            echo "
            <script>
            alert('Bạn đã hủy đơn hàng thành công!')
            window.location.href = '".$SITE_URL."/tai-khoan/?my_account&my_order';
            </script>
            ";
        }else{
            unset($_SESSION['cart']);
            echo "
            <script>
            alert('Bạn đã hủy đơn hàng thành công!')
            window.location.href = '".$SITE_URL."/trang-chinh/index.php';
            </script>
            ";
        }
        
    }
    die;
}
require "../layout.php";
