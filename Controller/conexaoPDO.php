<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=minder', "root", "");
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}

?>