

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
    <h3 class="text-center mt-5 text-primary">ADD NEW CATEGORY</h3>
     <div class="wrap">
     <form action="index.php" method="post">
        <div>
            <label for="" class="text-dark">NAME CATEGORY:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]"  type="text" name="name_cate" >
            <p class="text-red-700"><?= isset($_SESSION['name_cate'])?$_SESSION['name_cate'] :""?></p>
        </div>
        <button class="btn btn-primary" type="submit" name="btn-add">ADD</button>
        <a class="btn btn-primary" href="index.php?btn-list">LIST</a>
      </form>
     </div>
     
</body>
</html>