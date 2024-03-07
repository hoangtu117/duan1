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
      .order-table tr{
         height: 30px;
      }
   </style>
</head>

<body>
<h3 class="text-center mt-4 text-red-700 mb-4">LIST ORDER </h3>
<form action="index.php" method="post">
   <div class="search-form">
      <input type="date" name="date_order" class=" border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" placeholder="Date order...">
      <button type="submit" class="btn btn-primary" name="btn-search"><i class="bi bi-search"></i></button>
   </div>

</form>
<script>
<?php if(isset($_COOKIE['update'])){
?>
  alert("<?=$_COOKIE['update']?>")
<?php
} ?>
</script>
   <form action="index.php" method="post">
   <table class="order-table table table-striped">
      <tr>
         <th>ID ORDER</th>
         <th>NAME CUSTOMER</th>
         <th>DATE ORDER</th>
         <th>STATUS</th>
         <th>ADDRESS</th>
         <!-- <th>EMAIL</th> -->
         <th>PHONE</th>
         <th>OPTION</th>

      </tr>
      <?php
      if(!empty($order_list)){

      }
      foreach ($order_list as $item){
         extract($item);

      ?>
      <tr style="height: 10px;">
         <td><?=$id_order?></td>
         <td><?=$ho_ten?></td>
         <td><?=$date_order?></td>
         <td><?=$tinh_trang ?></td>
         <td><?=$address?></td>
         <!-- <td><?=$email?></td> -->
         <td><?=$phone?></td>
         <td>
            <a class="btn btn-primary" href="index.php?order-detail&id_order=<?=$id_order?>"><i class="bi bi-eye"></i></a>  
            <a class="btn btn-primary" href="index.php?edit-order&id_order=<?=$id_order?>"><i class="bi bi-pencil-fill"></i></a>          
            </tr>
            
      <?php
      }?>
   </table>
   </form>
   
</body>

</html>