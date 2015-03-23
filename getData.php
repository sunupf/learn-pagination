<?php
  try{
    $DB = new PDO("mysql:host=localhost;dbname=test",'root',''); 
  }catch(PDOExeption $e){
    echo $e;
  }
  
  $dataPerPage = 5;
  $page = (int)$_GET['page'];
//  $sql = "SELECT * FROM users";
    
  $sql = "SELECT * FROM users LIMIT $dataPerPage OFFSET ".$dataPerPage*($page-1);
  echo json_encode($DB->query($sql)->fetchAll(PDO::FETCH_ASSOC));
?>