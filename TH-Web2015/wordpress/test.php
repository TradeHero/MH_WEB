<?php
$info = shell_exec('ifconfig eth0');
echo "<pre>$info</pre>";
?>
