<?php
session_start();
unset($_SESSION["a_id"]);
  require_once "includes/config.php";
     $con = new mysqli (H , U , P , D);  
     $sql= "SELECT * FROM admin ORDER by a_id LIMIT 1";
     $qry= $con->prepare($sql);
     $qry->execute();
     $qry->bind_result($a_id,$name,$email,$userPassword,$role,$status,$created);
     while($qry->fetch()){
       $datelog = date("m/d/Y h:i:sa");
     }
?>