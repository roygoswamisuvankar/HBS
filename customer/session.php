<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dbconfig.php';
include_once 'session.php';
   
session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connect,"select phone, name from user where phone = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['phone'];
   $login_session1 = $row['name'];
   //$login_session2 = $row['email'];*/
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>

