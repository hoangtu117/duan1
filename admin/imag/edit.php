<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .wrap{
            width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
<h3 class="text-center mt-4 text-red-700">EDIT IMAGE</h3>
<div class="wrap">
<form action="index.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="" class=" min-w-[120px] font-[700]">FILE IMAGE:</label>
        <input class="form-control-file border border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]"  type="file" name="name_image" id="" > 
        <p class="text-danger"><?= isset($_SESSION['name_image'])?$_SESSION['name_image'] :""?></p>
    </div>
         <input type="hidden" name="id_product" value="<?=$_GET['id_product']?>">
         <input type="hidden" name="id_image" value="<?=$_GET['id_image']?>">
        <button class="btn btn-primary"  type="submit" name="btn-update">UPDATE</button>
        <a class="btn btn-danger" href="index.php?view-image&id_product=<?=$_GET['id_product']?>">CANCEL</a>
    </form>
</div>

</body>
</html>