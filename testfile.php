<?php
$fh = fopen("testfile.txt", 'w') or die("Создать файл не удалось");

$text = <<<_END
Строка_1
Строка_2
Строка_3
_END;

fwrite($fh, $text) or die("Сбой записи файла");
fclose($fh);
echo "Файл 'testfile.txt' записан успешно";
