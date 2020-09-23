<html>
   <head>
    <meta charset="UTF-8">
    <meta name="description" content="Internet Programming Assignment1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Sulthan Auliya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
</html>
<?php
session_start();

if(empty($_SESSION['permission'])){
   include ('home.php');
}else{

   switch ($_SESSION['permission']){
      case 'A':
      case 'a':    
         include ("admin.php");
      break;
      case 'C':
      case 'c':
         include ("customer.php");
      break;
      default:
      include ('home.php');
   }
}