<?php
  try{
    $DB = new PDO("mysql:host=localhost;dbname=test",'root',''); 
  }catch(PDOExeption $e){
    echo $e;
  }
  
  $dataPerPage = 5;
  $sql1 = "SELECT * FROM users";
  $page = ceil($DB->query($sql1)->rowCount()/$dataPerPage);

  echo json_encode(array('page'=>$page));
?>