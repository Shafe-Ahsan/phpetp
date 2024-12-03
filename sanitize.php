<?php
$comment = "<h1>Hey there what are you doing today</h1>";
echo $comment;
$s = filter_var($comment, FILTER_SANITIZE_STRING);
echo $s;
?>