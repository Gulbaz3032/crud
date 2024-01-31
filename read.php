<?php 

$conn = new mysqli("localhost", "root", "", "landing_page");

$sql = "SELECT * FROM students";
$res = $conn->query($sql);

// Third Step
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


//First Step
$rows_per_page = 5;
$total_rows = $res->num_rows;
$total_pages = ceil($total_rows/$rows_per_page);

//Fourth
$offset = ($page - 1) * $rows_per_page;
$sql = "SELECT * FROM students LIMIT $offset, $rows_per_page";
$res = $conn->query($sql);

if ($_POST) { 
    $search_term = $_POST['search_term'];

    $sql2 = "SELECT * FROM students WHERE name LIKE '%{$search_term}%' OR email LIKE '%{$search_term}%'";
    $res = $conn->query($sql2);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        body{
            background: gray;
        }
        .btn{
            padding: 10px;
            border-radius: 10px;
            border: 2px solid black;
            background: green;
        }

    </style>
</head>
<body>
    <div class="btn">
        <a href="index.php">Add new</a>
    </div>
    <form method="post">
        <input type="text" placeholder="Search...." name="search_term">
        <input type="submit" value="Search">
    </form>
    <table class="table w-50 mx-auto">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($res->num_rows > 0) { 
            $id = $offset+1;
            while ($row = $res->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>"><button>Update</button></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a>
                    </td>
                   
                </tr>
            <?php $id++;} } else {
                echo "<script> alert('No Data To show')</script>";
                }?>
        </tbody>
        
    </table>
    <ul class="pagination">
        <?php if ($page > 1) { ?>
         <li class="page-item"><a class="page-link" href="read.php?page=<?php echo $page-1; ?>">Previous</a></li>
         <?php } ?>
         <?php 
     //second step   
     for ($i = 1; $i <= $total_pages; $i++){
        if ($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="read.php?page='.$i.'">'.$i.'</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="read.php?page='.$i.'">'.$i.'</a></li>';
        }
     }
     ?>
     <?php if ($page < $total_pages) { ?>
       <li class="page-item"><a class="page-link" href="read.php?page=<?php echo $page+1; ?>">Next</a></li>
       <?php } ?>
     </ul>
</body>
</html>