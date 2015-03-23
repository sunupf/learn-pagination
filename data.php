<?php
  try{
    $DB = new PDO("mysql:host=localhost;dbname=test",'root',''); 
  }catch(PDOExeption $e){
    echo $e;
  }

   $page=1;
    if(isset($_GET['page'])){
      $page = (int) $_GET['page'];  
    }
  
  $sql = "SELECT * FROM users";
  $totalPage = ceil($DB->query($sql)->rowCount()/5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Users</title>
  <link rel="stylesheet" href="bower_components/uikit/css/uikit.gradient.min.css">
</head>
<body>
  <table class="uk-table" id="users-table">
    <caption>Users Table</caption>
    <thead>
      <tr>
        <th>Email</th>
        <th>Nama</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <ul class="uk-pagination">
   <?php
    if($page == 1){
    ?>
      <li class="">First</li>
    <?php
        }else{
    ?>
      <li><a href="?page=1">First</a></li>
    <?php 
        }
    ?>
    <?php
      for($i=1;$i<=$totalPage;$i++){
        if($page == $i){
    ?>
      <li class="uk-active"><span><?php echo $i ?></span></li>
    <?php
        }else{
    ?>
      <li class=""><span><a href="?<?php echo "page=".$i?>"><?php echo $i ?></a></span></li>
    <?php 
        }
      }
    ?>
    <li><span>Last</span></li>
</ul>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script>
    $.ajax({
      url:"getData.php",
      type:"get",
      data:"page=<?php echo $page;?>",
      dataType:'json',
      success:function(data){
        var  tbody = $('#users-table tbody');
        console.log(data);
        for(i=0;i<data.length;i++){
          tbody.append("<tr>"+
          "<td>"+data[i].email+"</td>"+
          "<td>"+data[i].nama+"</td>"+
          "<td>"+data[i].password+"</td>"+
          "</tr>")
        }
      }
    });
  </script>
</body>
</html>