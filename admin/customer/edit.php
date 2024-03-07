

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
<h3 class="text-center mt-4 text-red-700">EDIT CUSTOMER</h3>
    <div class="wrap">
    <form action="index.php" method="post" enctype="multipart/form-data">
       <div class="">
           <label class=" min-w-[120px] font-[700]" for="">ACTIVATED:</label>
        <select name="kich_hoat" id="" class="form-control">
            <option value="0" <?= ($kich_hoat==0)? "selected":""?>>Hủy kích hoạt</option>
            <option value="1" <?= ($kich_hoat==1)? "selected":""?>>Kích hoạt</option>
        </select>
           <p><p class="text-red-700"><?= isset($_SESSION['errors_kh']['kich_hoat'])?$_SESSION['errors_kh']['kich_hoat'] :""?></p></p>
       </div>
       <div class="">
           <label class=" min-w-[120px] font-[700]" for="">ROLE:</label>
           <select name="vai_tro" id="" class="form-control">
            <option value="0" <?= ($vai_tro==0)? "selected":""?>>Khách hàng</option>
            <option value="1" <?= ($vai_tro==1)? "selected":""?>>Admin</option>
        </select>
           <p><p class="text-red-700"><?= isset($_SESSION['terrors_kh']['vai_tro'])?$_SESSION['errors_kh']['vai_tro'] :""?></p></p>
       </div>
       <input type="hidden" name="old_img" value="<?= $hinh ?>">
       <input type="hidden" name="id_customer" id="" value="<?= $id_customer ?>"> <br>
       <p class="mt-[20px]">

           <button class="btn btn-primary" type="submit" name="btn-update">UPDATE</button>
           <a class="btn btn-danger" href="index.php?btn-list">CANCEL</a>
       </p>
   </form>
    </div>
</body>

</html>
