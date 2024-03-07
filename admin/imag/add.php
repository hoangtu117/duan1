<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them moi san pham</title>
    <style>
        .wrap{
            width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h3 class="text-center mt-5 text-primary">ADD NEW IMAGE</h3>
     <div class="wrap">
     <form action="index.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="" class="text-dark">FILE IMAGE:</label>
            <input class="form-control-file border border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]"  type="file" name="name_image" >
            <p class="text-danger"><?= isset($_SESSION['name_image'])?$_SESSION['name_image'] :""?></p>
            <input type="hidden" name="id_product" value="<?=$_GET['id_product']?>">
        </div>
        <button class="btn btn-primary" type="submit" name="btn-add">ADD</button>
        <a class="btn btn-primary" href="index.php?view-image&id_product=<?=$_GET['id_product']?>">BACK</a>
      </form>
     </div>
     
</body>
</html>