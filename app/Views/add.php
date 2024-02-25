<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h2>Thêm sản phẩm</h2>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        Tên sách: <br> 
        <input type="text" name="tensach" id=""><?= $err['tensach']??"" ?> <br>
        Giá: <br> 
        <input type="text" name="gia" id=""><?= $err['gia']??"" ?> <br>
        Ảnh: <br> 
        <input type="file" name="anh" id=""><?= $err['anh']??"" ?> <br>
        Mô tả: <br> 
        <textarea name="mota" id="" cols="30" rows="10"></textarea><?= $err['mota']??"" ?> <br>
        Số lượng: <br> 
        <input type="text" name="soluong" id=""><?= $err['soluong']??"" ?> <br>
        Danh mục: <br> 
        <select name="maloai" id="">
            <?php foreach($cts as $ct):  ?>
                <option value="<?=$ct->id ?>">
                    <?=$ct->tenloai ?>
                </option>
            <?php endforeach;  ?> 
        </select><br>
        <input type="submit" value="Thêm sản phẩm">
    </form>
</body>
</html>