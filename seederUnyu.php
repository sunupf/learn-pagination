<?php
  try{
    $DB = new PDO("mysql:host=localhost;dbname=test",'root',''); 
  }catch(PDOExeption $e){
    echo $e;
  }
  
  $email = 'user';
  $nama = "User";
  $password = "user";
    
  $value = "";  
  for($i=0;$i<100;$i++){
    $value .= "('".$email.$i."@gmail.com','".$nama.$i."','".$password.$i."'),";
  }

  $sql = "INSERT INTO users VALUES ".substr($value,0,-1);

  echo $sql;
  $DB->query($sql);
?>