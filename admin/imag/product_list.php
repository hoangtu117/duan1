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
      .page a{
         text-decoration: none;
         color: black;
      }
   </style>
</head>
<body>
<h3 class="text-center mt-4 text-red-700">LIST PRODUCT IMAGE</h3>
<form action="index.php" method="post">
   <div class="search-form">
      <input type="text" name="keyword" class=" border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" placeholder="Name product...">
      <button type="submit" class="" name="btn-search"><i class="bi bi-search"></i></button>
   </div>

</form>
   <form action="index.php" method="post" >
      <table class="table  table-striped">
           <tr>
            <th class="w-[20px]">ID PRODUCT</th>
            <th>NAME PRODUCT</th>
            <th>IMAGE</th>
            <th>OPTION</th>
           </tr>
           <?php if(!empty($product_all)){

            foreach($product_all as $item){
               extract($item);
               ?>
               <tr>
                  <td><?= $id_product ?></td>
                  <td><?= $name_product ?></td>
                  <td><img src="../../upload/<?= $item[9] ?>" alt=""  ></td>
                  <td>
                      <a class="btn btn-primary" href="index.php?view-image&id_product=<?= $id_product  ?>"><i class="bi bi-eye"></i></a>
                  </td>
               </tr>
               <?php
            }
           } ?>
      </table>
   </form>
   <?php
   if($total_page>1){

?>
<p class="page text-center">
<span  class="btn btn-primary fw-bold "><a href="index.php?btn-list&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?>"><</a></span>
    <?php if($curentPage > 1 ){
    ?>
      <span  class="btn btn-danger fw-bold "><a  href="index.php?btn-list&page=<?= ($curentPage-1) ?>"><?= ($curentPage-1) ?></a></span>
    <?php
    } ?>
      <span  class="btn btn-danger fw-bold "><a  href="index.php?btn-list&page=<?= $curentPage ?>"><?= $curentPage ?></a></span>
    <?php if(($curentPage + 1) <= $total_page){
    ?>
      <span  class="btn btn-danger fw-bold "><a  href="index.php?btn-list&page=<?= ($curentPage+1) ?>"><?= ($curentPage+1) ?></a></span>
    <?php
    } ?> 
    
    <span  class="btn btn-primary fw-bold "><a href="index.php?btn-list&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?>">></a></span>
<?php
}
?>
</body>
</html>