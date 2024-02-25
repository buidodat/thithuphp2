<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
</head>
<body>
    <h2>Cập nhật sản phẩm</h2>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        Tên sách: <br> 
        <input type="text" name="tensach" id="" value="<?=$book->tensach?>"><?= $err['tensach']??"" ?> <br>
        Giá: <br> 
        <input type="text" name="gia" id="" value="<?=$book->gia?>"><?= $err['gia']??"" ?> <br>
        Ảnh: <br> 
        <img src="<?= ROOT_PATH."images/".$book->anh?>" alt="" width="100"><br>
        <input type="file" name="anh" id=""><?= $err['anh']??"" ?> <br>
        Mô tả: <br> 
        <textarea name="mota" id="" cols="30" rows="10"><?=$book->mota?></textarea><?= $err['mota']??"" ?> <br>
        Số lượng: <br> 
        <input type="text" name="soluong" id="" value="<?=$book->soluong?>"><?= $err['soluong']??"" ?> <br>
        Danh mục: <br> 
        <select name="maloai" id="">
            <?php foreach($cts as $ct):  ?>
                <option value="<?=$ct->id ?>" <?= $ct->id==$book->maloai?"selected":""?>>
                    <?=$ct->tenloai ?>
                </option>
            <?php endforeach;  ?> 
        </select><br>
        <input type="submit" value="Cập nhật sản phẩm">
    </form>
</body>
</html>