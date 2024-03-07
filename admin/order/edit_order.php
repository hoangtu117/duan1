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
<h3 class="text-center mt-4 text-red-700">EDIT ORDER</h3>
<div class="wrap">
<form action="index.php" method="post">
    <div>
        <label for="" class=" min-w-[120px] font-[700]">STATUS:</label>
        <select name="tinh_trang" id="" class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]">
            <option value="Đang chuẩn bị hàng" <?= (isset($tinh_trang)&&$tinh_trang==="Đang chuẩn bị hàng")?"selected":""?>>Đang chuẩn bị hàng</option>
            <option value="Đang giao hàng" <?= (isset($tinh_trang)&&$tinh_trang==="Đang giao hàng")?"selected":""?>>Đang giao hàng</option>
            <option value="Đã giao hàng" <?= (isset($tinh_trang)&&$tinh_trang==="Đã giao hàng")?"selected":""?>>Đã giao hàng</option>
        </select><br>
        <p class="text-red-700"><?= isset($_SESSION['tinh_trang'])?$_SESSION['tinh_trang'] :""?></p>
    </div>
        <input type="hidden" name="id_order" id="" value="<?= $id_order ?>">
        <button class="btn btn-primary"  type="submit" name="btn-update">UPDATE</button>
        <a class="btn btn-danger" href="index.php">CANCEL</a>
    </form>
</div>

</body>
</html>