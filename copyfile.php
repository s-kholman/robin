<?php
copy('testfile.txt', 'testfile2.txt') or die("Копирование невозможно");
echo "Файл успешно скопирован в 'tetsfile2.txt'";