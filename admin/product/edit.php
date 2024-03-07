<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 class="text-center mt-4 text-red-700">EDIT PRODUCT</h3>
    <div class="ml-[400px] mt-5">
        
        <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">NAME PRODUCT:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="text" name="name_product" id="" value="<?= $name_product ?>"> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['name_product']) ? $_SESSION['errors_hh']['name_product'] : "" ?></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">DATE ADD:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="date" name="ngay_nhap" id="" value="<?= $ngay_nhap ?>"> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['ngay_nhap']) ? $_SESSION['errors_hh']['ngay_nhap'] : "" ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">OLD PRICE:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="number" name="gia_goc" id="" value="<?= $gia_goc ?>"> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['gia_goc']) ? $_SESSION['errors_hh']['gia_goc'] : "" ?></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">NEW PRICE:</label>
            <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="number" name="gia_moi" id="" value="<?= $gia_moi ?>"> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['gia_moi']) ? $_SESSION['errors_hh']['gia_moi'] : "" ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">ID_CATEGORY:</label>
            <select name="id_cate" id="" class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]">
                    <?php if (!empty($category)) {
                        foreach ($category as $item) {
                            if ($id_cate == $item['id_cate']) {
                    ?>
                                <option selected value="<?= $item['id_cate'] ?>"><?= $item['name_cate'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?= $item['id_cate'] ?>"><?= $item['name_cate'] ?></option>
                    <?php

                            }
                        }
                    } ?>
                </select><br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['id_cate']) ? $_SESSION['errors_hh']['id_cate'] : "" ?></p>
          </div>
          <div class="col">
            <label for="" class=" min-w-[150px] font-[700]">ID_TAG:</label>
            <select name="id_tag" id="" class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]">
                    <?php if (!empty($tags)) {
                        foreach ($tags as $item) {
                            if ($name_tag == $item['name_tag']) {
                    ?>
                                <option selected value="<?= $item['id_tag'] ?>"><?= $item['name_tag'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?= $item['id_tag'] ?>"><?= $item['name_tag'] ?></option>
                    <?php

                            }
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
                <input class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="text" name="dac_biet" id="" value="<?= $dac_biet ?>"> <br>
                <p class="text-danger"><?= isset($_SESSION['errors_hh']['dac_biet']) ? $_SESSION['errors_hh']['dac_biet'] : "" ?></p>
          </div>
        </div>
        <div class="mt-6">
            <label for="" class=" min-w-[150px] font-[700]">DESCRIPTION:</label>
            <textarea class="form-control border-[2px] border-solid border-black h-[37px] rounded-[5px] min-w-[300px]" type="text" name="mo_ta" id=""><?=$mo_ta?></textarea> <br>
            <p class="text-danger"><?= isset($_SESSION['errors_hh']['mo_ta']) ? $_SESSION['errors_hh']['mo_ta'] : "" ?></p>
        </div>    
            <?php if (!empty($tags)) {
                        foreach ($tags as $item) {
                            if ($name_tag == $item['name_tag']) {
                    ?>
                            <input type="hidden" name='tag_old' value="<?=$item['id_tag'] ?>">
                            <?php
                            }
                        }
                    } ?>
            <input type="hidden" name="id_product" value="<?= $id_product ?>">
            <p class="mt-[20px]">

                <button class="btn btn-primary" type="submit" name="btn-update">UPDATE</button>
                <a class="btn btn-danger" href="index.php?btn-list">CANCEL</a>
            </p>
        </form>
    </div>
</body>

</html>