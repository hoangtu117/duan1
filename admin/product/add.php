
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h3 class="text-center mt-4 text-red-700">ADD NEW PRODUCT</h3>
<div class="ml-[400px] mt-5">
    <form action="index.php" method="post" enctype="multipart/form-data">
    <div class="row">
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">NAME PRODUCT:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="text" name="name_product" id=""> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['name_product']) ? $_SESSION['errors_hh']['name_product'] : "" ?></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">DATE ADD:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="date" name="ngay_nhap" id=""> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['ngay_nhap']) ? $_SESSION['errors_hh']['ngay_nhap'] : "" ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">OLD PRICE:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="number" name="gia_goc" id=""> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['gia_goc']) ? $_SESSION['errors_hh']['gia_goc'] : "" ?></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">NEW PRICE:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="number" name="gia_moi" id=""> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['gia_moi']) ? $_SESSION['errors_hh']['gia_moi'] : "" ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">ID_CATEGORY:</label>
            <select name="id_cate" id="" class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]">
    
            <?php if(!empty($category)){
                    foreach($category as $item){
                        extract($item);
                        ?>
                    <option value="<?=$id_cate?>"><?= $name_cate ?></option>
                        <?php
                    }
            } ?>
            </select><br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['id_cate']) ? $_SESSION['errors_hh']['id_cate'] : "" ?></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">ID_TAG:</label>
            <select name="id_tag" id="" class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]">
    
            <?php if(!empty($tags)){
                    foreach($tags as $item){
                        extract($item);
                        ?>
                    <option value="<?=$id_tag?>"><?= $name_tag ?></option>
                        <?php
                    }
            } ?>
            </select><br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['id_tag']) ? $_SESSION['errors_hh']['id_tag'] : "" ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
                <label for="" class=" min-w-[150px] font-[700]">IMAGE:</label>
                <input class="form-control-file border border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="file" name="hinh_anh" id=""> <br>
                <p></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">SPECIAL:</label>
                <select name="dac_biet" id="" class="form-control ">
                  <option value="0">Normal</option>
                  <option value="1">Special</option>
                </select>
                <p class="text-danger"><?= isset($_SESSION['errors_hh']['dac_biet']) ? $_SESSION['errors_hh']['dac_biet'] : "" ?></p>
          </div>
        </div>
        <div class="mt-6">
            <label for="" class=" min-w-[150px] font-[700]">DESCRIPTION:</label>
            <textarea class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="text" name="mo_ta" id=""></textarea> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['mo_ta']) ? $_SESSION['errors_hh']['mo_ta'] : "" ?></p>
        </div>
        <p class="mt-[20px]">

            <button class="btn btn-primary" type="submit" name="btn-add">ADD</button>
            <button class="btn btn-warning" type="reset" >RESET</button>
            <a class="btn btn-primary" href="index.php?btn-list">LIST</a>
        </p>
    </form>
</div>
</body>

</html>
