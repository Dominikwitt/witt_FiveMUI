<?php
$username = "USER"; // username
$password = "PASSWORD"; // password of the database
$hostname = "LOCALHOST/IP"; // host of the database
$namebase = "DATABASE"; // name of the database

// Attempt to connect to the database
try
 {
  $bdd = new PDO('mysql:host='.$hostname.';dbname='.$namebase.'', $username, $password);
 }
  catch (Exception $e)
 {
  // If an error is thrown, display the message
  die('Erreur : ' . $e->getMessage());
 }
 ?>
