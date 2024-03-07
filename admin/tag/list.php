<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<h3 class="text-center mt-4 text-primary mb-4">LIST TAGS</h3>
     <p style="text-align: right;">
        <a class="btn btn-primary ml-2" href="index.php?add-tag">ADD</a>
        <button class="btn btn-danger" type="submit" name="btn-delete-select" onclick="return confirm('Bạn có muốn xóa tất cả tag đã chọn này không?')">DELETE SELECTED</button>
     </p>
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
   <form action="index.php" method="post">
      <table class="table  table-striped">
          <tr>
            <th>CHOOSE</th>
            <th>ID TAG</th>
            <th>NAME TAG</th>
            <th>EDIT</th>
          </tr>
          <?php if(!empty($results)){
            foreach($results as $item){
                 extract($item);
                 ?>
                 <tr>
                 <td><input type="checkbox" <?php echo isset($flag)? "checked":"" ?> value="<?= $id_tag  ?>" name="<?= $id_tag  ?>"></td>
                 <td><?= $id_tag  ?></td>
                 <td><?= $name_tag  ?></td>
                 <td>
                      <a class="btn btn-primary" href="index.php?btn-edit&id_tag=<?= $id_tag  ?>"><i class="bi bi-pencil-fill"></i></a>
                      <a class="btn btn-danger" href="index.php?btn-delete&id_tag=<?= $id_tag  ?>" onclick="return confirm('Bạn có muốn xóa tag này không?')"><i class="bi bi-trash3-fill"></i></a>
                 </td>
                 </tr>
                 <?php 
            }
          } ?>
      </table>
   </form>
</body>
</html>
