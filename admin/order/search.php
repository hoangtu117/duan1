<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      img{
         width: 100px;
         height: 100px;
      }
   </style>
</head>

<body>
<h3 class="text-center mt-4 text-red-700">LIST ORDER BY DATE ORDER</h3>
<script>
<?php if(isset($_COOKIE['update'])){
?>
  alert("<?=$_COOKIE['update']?>")
<?php
} ?>
</script>
   <form action="index.php" method="post">
   <table class="table  table-striped">
      <tr>
         <th>ID ORDER</th>
         <th>NAME CUSTOMER</th>
         <th>DATE ORDER</th>
         <th>STATUS</th>
         <th>EMAIL</th>
         <th>PHONE</th>
         <th>OPTION</th>

      </tr>
      <?php
      if(!empty($search_list)){

         foreach ($search_list as $item){
            extract($item);
   
         ?>
         <tr>
            <td><?=$id_order?></td>
            <td><?=$ho_ten?></td>
            <td><?=$date_order?></td>
            <td><?=$tinh_trang ?></td>
            <td><?=$email?></td>
            <td><?=$phone?></td>
            <td>
               <a class="btn btn-primary" href="index.php?order-detail&date_order=<?=$date_order ?>&id_order=<?=$id_order?>"><i class="bi bi-eye"></i></a>  
               <a class="btn btn-primary" href="index.php?edit-order&date_order=<?=$date_order ?>&id_order=<?=$id_order?>"><i class="bi bi-pencil-fill"></i></a>          
               </tr>
               
         <?php
         }
      }else{
         ?>
         <tr>
            <td colspan="7" style="color: red;">Không có dữ liệu nào!</td>
         </tr>
         <?php
      }
?>
   </table>
   <a class="btn btn-primary ml-2" href="<?=$ADM_URL?>/order/index.php">BACK</a>
   </form>
   
</body>

</html>