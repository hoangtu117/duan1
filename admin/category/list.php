<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<h3 class="text-center mt-4 mb-4 text-primary">LIST CATEGORY</h3>
     <p style="text-align: right;">
        <a class="btn btn-primary ml-2" href="index.php?add_category">ADD NEW</a>
        <button class="btn btn-primary" type="submit" name="btn-delete-select" onclick="return confirm('Bạn có muốn xóa tất cả loại hàng đã chọn này không?')">DELETE SELECTED</button>
     </p>
   <form action="index.php" method="post">
      <table class="table  table-striped mt-4">
          <tr>
            <th>CHOOSE</th>
            <th>ID CATEGORY</th>
            <th>NAME CATEGORY</th>
            <th>OPTION</th>
          </tr>
          <?php if(!empty($results)){
            foreach($results as $item){
                 extract($item);
                 ?>
                 <tr>
                 <td><input type="checkbox" <?php echo isset($flag)? "checked":"" ?> value="<?= $id_cate  ?>" name="<?= $id_cate  ?>"></td>
                 <td><?= $id_cate  ?></td>
                 <td><?= $name_cate  ?></td>
                 <td>
                      <a class="btn btn-primary" href="index.php?btn-edit&id_cate=<?= $id_cate  ?>"><i class="bi bi-pencil-fill"></i></a>
                      <a class="btn btn-danger" href="index.php?btn-delete&id_cate=<?= $id_cate  ?>" onclick="return confirm('Bạn có muốn xóa loại hàng này không?')"><i class="bi bi-trash3-fill"></i></a>
                 </td>
                 </tr>
                 <?php 
            }
          } ?>
      </table>
   </form>
   <script>
<?php if(isset($_COOKIE['update'])){
?>
  alert("<?=$_COOKIE['update']?>")
<?php
} ?>
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
</script>
</body>
</html>
