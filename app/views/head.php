<?php

require_once 'dependencies.php';

function head($title = ''){
echo "<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>$title</title>";
dependencies();
echo"
</head>";
}


