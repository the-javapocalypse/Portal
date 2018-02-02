<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/10/2018
 * Time: 5:49 PM
 */


/*
 * Todo: Update database credentials
 *       Update links for  Register::registerUser, Register::resetPasswordRequest, Register::resetPassword,
 *
 */



include_once ("classes.php");

session_start();

$con = new Connection("localhost","root","portal","");
$db = $con->EstablishConn();






?>