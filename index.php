<?php
$connection = new mysqli("localhost", "root", "", "landing_page");
if ($_POST){

    $fullname = $_POST['full_name'];
    $email = $_POST['email'];
    $password = base64_encode($_POST['password']);
    $number = $_POST['number'];

    $sql = "INSERT INTO users (name, email, password, number) VALUES ('{$fullname}', '{$email}', '{$password}', '{$number}')";
    $res = $connection->query($sql);

    if ($res == 1) {
      echo "Success";
    } else {
      echo "Failure";
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
        .form{
          align-items: center;
          margin-left: 40%;
          margin-top: 16%;
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
  <form method="POST" class="form">
    <input class="input" type="text" required name="full_name" placeholder="Enter Your Name"><br>
    <input class="input" type="email" required name="email" placeholder="Enter Your Email Addres"><br>
    <input class="input" type="password" required name="password" placeholder="Enter Your Password"><br>
    <input class="input" type="number" required name="number" placeholder="Enter Your Phone Number"><br>
    <input class="input" type="Submit"><br>

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
  <form method="POST">
    <input type="text" required name="full_name" placeholder="Enter Your Name">
    <input type="email" required name="email" placeholder="Enter Your Email Addres">
    <input type="password" required name="password" placeholder="Enter Your Password">
    <input type="number" required name="number" placeholder="Enter Your Phone Number">
    <input type="Submit">

  </form>
    
</body>
</html> -->