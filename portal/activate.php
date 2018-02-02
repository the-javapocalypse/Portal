<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/21/2018
 * Time: 2:07 PM
 */

include ("config.php");

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $tablename = "loginsystem.users";
    $query = $db->prepare("UPDATE $tablename SET status='1' WHERE token=?");

    if($query->execute([$token])){
        echo "<script>location='index.php?succ=".urldecode("Account Activated")."'</script>";
        exit();
    }


}



?>