<?php
$conn = mysqli_connect("localhost", "root", "Jreyssecret_7", "new_schema");

$sql = "SELECT * FROM tasks";

$result = mysqli_query($conn, $sql);


if (isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    echo $ID;
    echo $name;
    echo $desc;
    echo $date;
    echo $status;

    // Insert the user data into the database
    $sql = "INSERT INTO tasks VALUES (null,'$ID','$name','$desc', '$date', '$status')";
    mysqli_query($conn, $sql);
  
  }
  

?>

<!DOCTYPE html>
<html>
<head>
  <title> MySQL - PHP connection</title>
</head>


<body>
  <h1>TO DO LIST RECORDS</h1>
  <table border="2">

    <tr>
      <th>ID</th>
      <th>Task Name</th>
      <th>Task Description</th>
      <th>Task Due Date</th>
      <th>Status</th>
    </tr>


    <?php

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['ID']."</td>";
      echo "<td>".$row['task_name']."</td>";
      echo "<td>".$row['task_description']."</td>";
      echo "<td>".$row['task_due_date']."</td>";
      echo "<td>".$row['task_status']."</td>";
    }
   
        ?>

  </table>
  <br>
  <a href="AddUser.php">Add Data</a>
</body>
</html>

<?php
mysqli_close($conn);
?>


