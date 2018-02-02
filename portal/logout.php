<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/30/2018
 * Time: 8:25 PM
 */


include ("header.php");


session_destroy();
echo "<script>location='index.php?succ=".urldecode("Logged Out.")."'</script>";


?>