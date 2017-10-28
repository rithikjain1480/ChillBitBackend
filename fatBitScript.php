<?php include "mysqliFatBit.php" ?>
<html>
  <head>
    <title>FatBit Script</title>
  </head>
  <body>
    <?php
      //echo $_GET["userPass"];
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(is_null($_POST['userPass'])){
          $username = $_POST['username'];
          $title = $_POST['title'];
          $location = $_POST['location'];
          $possibleGoing = $_POST['possibleGoing'];
          $startTime = $_POST['startTime'];
          $endTime = $_POST['endTime'];
          $notes = $_POST['notes'];

          $query = "INSERT INTO `posts` VALUES('$username', NULL, '$title', '$location', 1, '$possibleGoing', '$startTime', '$endTime', '$notes');";
          $response = mysqli_query($dbc, $query);

          if($response){
             echo 'Success';
          } else {
            echo "Error: "  . mysqli_error($dbc);
          }
        }
        else {
          $username = $_POST['username'];
          $userPass = $_POST['userPass'];
          $hobby = $_POST['hobby'];

          $query = "INSERT INTO `user` VALUES(NULL, '$username', '$userPass', '$hobby');";
          $response = mysqli_query($dbc, $query);

          if($response){
             echo 'Success';
          } else {
            echo "Error: "  . mysqli_error($dbc);
          }
        }
      }
      elseif ($_SERVER['REQUEST_METHOD']=='LOGIN'){
        $username = $_GET['username'];
        echo "$username";
        $query = "SELECT * FROM `user` WHERE `username`='$username';";
        $response = mysqli_query($dbc, $query);
        if($response){
          $results = mysqli_fetch_array($response);
          echo json_encode($results);
        }
      }
      // else {
      //   $query = "SELECT * FROM user WHERE userID=4;";
      //   $response = mysqli_query($dbc, $query);
      //   $results = mysqli_fetch_array($response);
      //   echo json_encode($results);
      // }

      // while ($row = mysqli_fetch_assoc($response)) {
      //    echo "test ".$row['email'];
      // }
    ?>
  </body>
</html>
