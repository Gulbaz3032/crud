<?php 

require "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql1 = "SELECT * FROM clients WHERE id = $id";
$res1 = $conn->query($sql1);
$row1 = $res1->fetch_assoc();


$sql = "SELECT * FROM cities";
$res = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<body>
<form method="post">
        <input type="text" value="<?php echo $row1['name']; ?>" name="name" placeholder="Name...">
        <input type="text" value="<?php echo $row1['email']; ?>" name="email" placeholder="Email...">
        <select name="city">
            <option disabled selected>Select a City</option>
            <?php while ($row = $res->fetch_assoc()) {
                if ($row['city_id'] == $row1['city']) {
                    $selected = "selected";
                } else {
                    $selected = "";
                } ?>
            <option <?php echo $selected; ?> value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                <?php } ?>
        </select>
        <input type="submit">
    </form>
    <?php include "footer.php"; ?>
</body>
</html>