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
<h3 class="text-center mt-4 text-red-700 mb-4">LIST SEARCH PRODUCT </h3>
<form action="index.php" method="post">
   <div class="search-form">
      <input type="text" name="keyword" class=" border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" placeholder="Name product...">
      <button type="submit" class="btn btn-primary" name="btn-search"><i class="bi bi-search"></i></button>
   </div>

</form>
   <form action="index.php" method="post" >
      <table class="table  table-striped">
           <tr>
            <th class="w-[20px]">CHOOSE</th>
            <th>NAME PRODUCT</th>
            <th>OLD PRICE</th>
            <th>NEW PRICE</th>
            <th>IMAGE</th>
            <th>DATE ADDED</th>
            <th>SPECIAL</th>
            <th>OPTION</th>
           </tr>
           <?php if(!empty($product)){

            foreach($product as $item){
               extract($item)
               ?>
               <tr>
                  <td><input type="checkbox" <?php echo isset($flag)? "checked":"" ?>  value="<?= $id_product ?>" name="<?= $id_product ?>"></td>
                  <td><?= $name_product ?></td>
                  <td><?= $gia_goc ?></td>
                  <td><?= $gia_moi ?></td>
                  <td><img src="../../upload/<?= $item[9] ?>" alt=""  ></td>
                  <td><?= $ngay_nhap ?></td>
                  <td><?= ($dac_biet==1)?"Special":"Normal" ?></td>
                  <td>
                      <a class="btn btn-primary" href="index.php?btn-edit&id_product=<?= $id_product  ?>"><i class="bi bi-pencil-fill"></i></a>
                      <a class="btn btn-danger" href="index.php?btn-delete&id_product=<?= $id_product  ?>" onclick="return confirm('Bạn có muốn xóa hàng hóa này không?')"><i class="bi bi-trash3-fill"></i></a>
                  </td>
               </tr>
               <?php
            }
           }else{
            ?>
            <tr>
               <td colspan="12" class="text-center text-danger">Không có sản phẩm nào bạn muốn tìm!!!</td>
            </tr>
            <?php
           } ?>
      </table>
      <p>
         <a class="btn btn-primary" href="index.php?add_product">ADD NEW</a>
         <button class="btn btn-danger" type="submit" name="btn-delete-select" onclick="return confirm('Bạn có muốn xóa tất cả hàng hóa đã chọn này không?')">DELETE SELECTED</button>
      </p>
   </form>
</body>
</html>