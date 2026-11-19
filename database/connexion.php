<?php
$host="localhost";
$dbname="tp7-crud";
$username="root";
$password="";
try{


$connexion=new PDO("mysql:host=$host , dbname=$dbname",  $username,$password);
 $connexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Erreur de connexion : " . $e->getMessage());
}




?>