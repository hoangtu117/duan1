<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      img{
         height: 100px;
         width: 100px;
      }
   </style>
</head>
<body>
<script>
<?php if(isset($_COOKIE['add'])){
?>
  alert("<?=$_COOKIE['add']?>")
<?php
} ?>

<?php if(isset($_COOKIE['delete'])){
?>
  alert("<?=$_COOKIE['delete']?>")
<?php
} ?>
<?php if(isset($_COOKIE['update'])){
?>
  alert("<?=$_COOKIE['update']?>")
<?php
} ?>
</script>
<h3 class="text-center mt-4 mb-4 text-red-700">LIST IMAGE</h3>
      <p style="text-align: right;">
         <a class="btn btn-primary" href="index.php?add_image&id_product=<?=$_GET['id_product']?>">ADD NEW</a>
         <a class="btn btn-primary" href="index.php">BACK</a>
      </p>
   <form action="index.php" method="post" >
      <table class="table  table-striped">
           <tr>
            <th class="w-[20px]">ID IMAGE</th>
            <th>IMAGE</th>
            <th>OPTION</th>
           </tr>
           <?php if(!empty($image_all)){

            foreach($image_all as $item){
               extract($item);
               ?>
               <tr>
                  <td><?= $id_image ?></td>
                  <td><img src="../../upload/<?= $name_image ?>" alt=""  ></td>
                  <td>
                      <a class="btn btn-primary" href="index.php?edit_image&id_image=<?= $id_image  ?>&id_product=<?=$_GET['id_product']?>"><i class="bi bi-pencil-fill"></i></a>
                      <a class="btn btn-danger" href="index.php?btn-delete&id_image=<?= $id_image  ?>&id_product=<?=$_GET['id_product']?>" onclick="return confirm('Bạn có muốn xóa image hóa này không?')"><i class="bi bi-trash3-fill"></i></a>
                  </td>
               </tr>
               <?php
            }
           } ?>
      </table>
   </form>
</body>
</html>