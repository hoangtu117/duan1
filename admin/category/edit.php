
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
<h3 class="text-center mt-4 text-red-700">EDIT CATEGORY</h3>
<div class="wrap">
<form action="index.php" method="post">
    <div>
        <label for="" class=" min-w-[120px] font-[700]">NAME CATEGORY:</label>
        <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]"  type="text" name="name_cate" id="" value="<?= $name_cate ?>"> 
        <p class="text-red-700"><?= isset($_SESSION['name_cate'])?$_SESSION['name_cate'] :""?></p>
    </div>
        <input type="hidden" name="id_cate" id="" value="<?= $id_cate ?>">
        <button class="btn btn-primary"  type="submit" name="btn-update">UPDATE</button>
        <a class="btn btn-danger" href="index.php?btn-list">CANCEL</a>
    </form>
</div>

</body>
</html>