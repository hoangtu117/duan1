
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
<h3 class="text-center mt-4 text-red-700">EDIT TAG</h3>
<div class="wrap">
<form action="index.php" method="post">
    <div>
        <label for="" class=" min-w-[120px] font-[700]">NAME TAG:</label>
        <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]"  type="text" name="name_tag" id="" value="<?= $name_tag ?>"> 
        <p class="text-red-700"><?= isset($_SESSION['name_tag'])?$_SESSION['name_tag'] :""?></p>
    </div>
        <input type="hidden" name="id_tag" id="" value="<?= $id_tag ?>">
        <button class="btn btn-primary"  type="submit" name="btn-update">UPDATE</button>
        <a class="btn btn-danger" href="index.php?btn-list">CANCEL</a>
    </form>
</div>

</body>
</html>