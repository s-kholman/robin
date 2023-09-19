<?php
echo <<<_END
<html>
<head>
<title>
PHP - форма для загрузки файлов на сервер
</title>
</head>
<body>
<form method="post" action="upload.php" enctype="multipart/form-data">
Выберите файл: <input type="file" name="filename" size="10">
<input type="submit" value="Загрузить">
</form>
_END;
$dir = __DIR__;
if ($_FILES)
{
    $name = $_FILES['filename']['name'];
    $name = strtolower(preg_replace("[^A-Za-z0-9.]", "", $name));

    switch ($_FILES['filename']['type'])
    {
        case 'image/jpeg': $ext = 'jpg'; break;
        case 'image/gif': $ext = 'gif'; break;
        case 'image/png': $ext = 'png'; break;
        case 'image/tiff': $ext = 'tif'; break;
        default: $ext = ''; break;
    }
    if($ext)
    {
        $n = "image.$ext";
        move_uploaded_file($_FILES['filename']['tmp_name'], "img/".$n);
        echo "Загруженное изображение '$name' под именем '$n' <br>" . '<img src=img/' . $n . ">";
    }
    else
    {
        echo "'$name' - неприемлемый файл изображения";
    }


}
else
{
    echo "Загрузки изображения ек произошло";
}
echo "</body></html>";