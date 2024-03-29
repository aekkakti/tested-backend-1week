<?php
$data = 'abc' . PHP_EOL . 'def' . PHP_EOL;
file_put_contents(__DIR__ . 'file.txt', $data, FILE_APPEND);
echo $data;
