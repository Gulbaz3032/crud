<?php
session_start();

if (isset($_SESSION['name'])){
  header('location: dashboard.php');
}


$connection = new mysqli("localhost", "root", "", "landing_page");
if ($_POST){

    $email = $_POST['email'];
    $password = base64_encode($_POST['password']);

    $sql = "SELECT *  FROM users WHERE password = '{$password}' AND email = '{$email}' OR name = '{$email}'";
    $res = $connection->query($sql);

    if ($res->num_rows > 0) {
        // echo "User exist";
        $user_data = $res->fetch_assoc();
        $_SESSION['name'] = $user_data['name'];
        $_SESSION['email'] = $user_data['email'];
        header('location: dashboard.php');
        // $user();  
    } else {
        echo "Wrong Email or password";   
    }

    
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        body{
       background: gray;

        }
        .input{
          padding: 10px;
          border-radius: 20px;
          text-size: 10px;
          color: black;
        }
</style>
</head>
<body>
  <form method="POST">
    <input class="input" type="email" required name="email" placeholder="Enter Your Email or username">
    <input class="input" type="password" required name="password" placeholder="Enter Your Password">
    <input class="input" type="Submit">

  </form>
    
</body>
</html>


<!-- <?php
$connection = new mysqli("localhost", "root", "", "landing_page");

if ($_POST){

    $fullname = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    $sql = "INSERT INTO students (name, email, password, mobile) VALUES ('{$fullname}', '{$email}', '{$password}', '{$number}')";
    $res = $connection->query($sql);

    if ($res == 1) {
      echo "Success";
    } else {
      echo "Failure";
    }
    
}


?>
