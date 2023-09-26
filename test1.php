<?php
echo "<pre>";
var_dump(time());
exec("ping -n 1 -w 100 " . "192.168.0.20" . " 2>NUL > NUL && (echo 0) || (echo 1)", $output, $status);
if (!$output[0]) {
    var_dump($output[0]);
} else {
    var_dump($output[0]);
}
var_dump(time());