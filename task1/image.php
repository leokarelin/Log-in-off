<?php
    $imFn = "images/my_photo.jpg";
    $mime = mime_content_type($imFn);
    if (!$mime) exit;
    echo file_get_contents($imFn);

    $countFn = "count.txt";
    fclose(fopen($countFn, "a+b"));
    $countF = fopen($countFn, "r+t") or die("Не могу открыть файл $countFn");
    if (!flock($countF, LOCK_EX)) die("Не могу получить блокировку!");
   
    $count = fgets($countF);
    ftruncate($countF);
    fseek($countF, 0, SEEK_SET);
    fputs($countF, $count+1);

    fflush($countF);
    flock($countF, LOCK_UN);
    fclose($countF);

?>