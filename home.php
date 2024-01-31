<?php 

include "config.php";

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $sql1 = "INSERT INTO clients (name, email, city) VALUES ('{$name}', '{$email}', '{$city}')";
    $res1 = $conn->query($sql1);
}

$sql = "SELECT * FROM cities";
$res = $conn->query($sql);

$sql2 = "SELECT cl.id, cl.name, cl.email, ci.city_name FROM clients cl JOIN cities ci ON cl.city = ci.city_id";
$res2 = $conn->query($sql2);

?>
 

<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Page - <?php echo $page_name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head> -->
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Name...">
        <input type="text" name="email" placeholder="Email...">
        <select name="city">
            <option disabled selected>Select a City</option>
            <?php while ($row = $res->fetch_assoc()) { ?>
            <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                <?php } ?>
        </select>
        <input type="submit">
    </form>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Options</th>
        </tr>
        <?php while ($row = $res2->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['city_name']; ?></td>
            <td>
                <a href="updateClient.php?id=<?php echo $row['id']; ?>">Update</a>
        </td>
        </tr>
        <?php } ?>
    </table>
    <?php include "footer.php"; ?>
</body>
</html>