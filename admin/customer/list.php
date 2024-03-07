

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
<h3 class="text-center mt-4 text-red-700 mb-4">LIST CUSTOMER</h3>
<script>
<?php if(isset($_COOKIE['update'])){
?>
  alert("<?=$_COOKIE['update']?>")
<?php
} ?>
<?php if(isset($_COOKIE['delete'])){
?>
  alert("<?=$_COOKIE['delete']?>")
<?php
} ?>
</script>
   <form action="index.php" method="post">
   <table class="table  table-striped">
      <tr>
         <th>ID CUSTOMER</th>
         <th>NAME CUSTOMER</th>
         <th>ACTIVATED</th>
         <th>IMAGE</th>
         <th>EMAIL</th>
         <th>ROLE</th>
         <th>OPTION</th>

      </tr>
      <?php
      if(!empty($customers)){

      }
      foreach ($customers as $item){
         extract($item);

      ?>
      <tr>
         <td><?=$id_customer?></td>
         <td><?=$ho_ten?></td>
         <td><?= ($kich_hoat == 1) ? 'Kích hoạt' : 'Chưa kích hoạt' ?></td>
         <td><img src="../../upload/<?=$hinh_anh?>" alt=""></td>
         <td><?=$email?></td>
         <td><?= ($vai_tro == 1) ? 'Admin' : 'Khách hàng' ?></td>
         <td>
            <a class="btn btn-primary" href="index.php?btn-edit&id_customer=<?=$id_customer?>"><i class="bi bi-pencil-fill"></i></a>            
            </tr>
            
      <?php
      }?>
   </table>
   </form>
   
</body>

</html>