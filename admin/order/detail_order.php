

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
<h3 class="text-center mt-4 text-red-700">DETAIL ORDER</h3>
   <form action="index.php" method="post">
   <table class="table  table-striped">
      <tr>
         <th>ID PRODUCT</th>
         <th>NAME PRODUCT</th>
         <th>IMAGE</th>
         <th>PRICE</th>
         <th>QUANTITY</th>
      </tr>
      <?php
      if(!empty($order_detail_all)){

      }
      foreach ($order_detail_all as $item){
         extract($item);

      ?>
      <tr>
         <td><?=$id_product?></td>
         <td><?=$name_product?></td>
         <td><img src="../../upload/<?=$item[13]?>" alt=""></td>
         <td><?=$gia_moi?></td>
         <td><?=$so_luong ?></td>          
      </tr>
            
      <?php
      }?>
   </table>
   <?php
   if(!isset($_GET['date_order'])){
    ?>
   <a class="btn btn-primary ml-2" href="<?=$ADM_URL?>/order/">BACK</a>
    <?php
   }else{
    ?>
    <a class="btn btn-primary ml-2" href="<?=$ADM_URL?>/order/index.php?date_order=<?=$_GET['date_order']?>">BACK</a>
    <?php
   }
    ?>
   </form>
   
</body>

</html>