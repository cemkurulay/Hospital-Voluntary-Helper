<?php
//database connection information
 $dsn = "mysql:host=localhost;dbname=tdp;charset=utf8mb4" ;
 $user = "root" ; // "root"
 $pass = "" ; // ""

 //database connection
 try {
     $db = new PDO($dsn, $user, $pass) ;
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

 } catch( PDOException $ex) {
     echo "<p>Error occured try later.</p>";
     exit ; 
 }