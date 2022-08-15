<?php
session_start();
$id=$_SESSION["a_id"];
if(!isset($_SESSION["a_id"]) || empty($_SESSION["a_id"]))
{ 
    header("location:index.php");
}
?>