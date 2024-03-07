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
<h3 class="text-center mt-4 text-red-700 mb-4">UPDATE OR DELETE ALL PRODUCTS FOR DELETE CATEGORY</h3>
   <form action="index.php" method="post" >
      <table class="table  table-striped">
           <tr>
            <th class="w-[20px]">CHOOSE</th>
            <th class="w-[20px]">ID PRODUCT</th>
            <th>NAME PRODUCT</th>
            <th>IMAGE</th>
            <th>OPTION</th>
           </tr>
           <?php if(!empty($products)){

            foreach($products as $item){
               extract($item)
               ?>
               <tr>
                  <td><input type="checkbox" <?php echo isset($flag)? "checked":"" ?>  value="<?= $id_product ?>" name="<?= $id_product ?>"></td>
                  <td><?= $id_product ?></td>
                  <td><?= $name_product ?></td>
                  <td><img src="../../upload/<?= $item[9] ?>" alt=""  ></td>
                  <td>
                      <a class="btn btn-danger" href="index.php?btn-delete-hh&id_product=<?= $id_product  ?>" onclick="return confirm('Bạn có muốn xóa hàng hóa này không?')"><i class="bi bi-trash3-fill"></i></a>
                  </td>
               </tr>
               <?php
            }
           } ?>
      </table>
      <div class="mt-6 mb-20">
        <label for="" class=" min-w-[150px] font-[700]">LIST CATEGORY:</label>
        <select name="category" class=" border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]">
            <?php if(isset($category)){
                foreach ($category as $item){
                    extract($item)
                    ?>
                    <option value="<?=$id_cate?>"><?= $name_cate?></option>
                    <?php
                }
            }  ?>
        </select>
      </div>
      <p>
        <input type="hidden" name="id_cate" value=<?=$_GET['id_cate']?>>
        <a class="btn btn-primary" href="index.php?btn-list">LIST CATEGORY</a>
         <button class="btn btn-danger" type="submit" name="btn-delete-select-hh" onclick="return confirm('Bạn có muốn xóa tất cả hàng hóa đã chọn này không?')">DELETE SELECTED</button>
         <button class="btn btn-primary" type="submit" name="btn-update-select-hh" onclick="return confirm('Bạn có muốn update tất cả hàng hóa đã chọn này không?')">UPDATE SELECTED</button>
      </p>
   </form>
</body>
</html>