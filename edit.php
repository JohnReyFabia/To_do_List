
<?php

include 'connection.php';
$id = $_GET['editid']; 
$sql="SELECT * FROM `task` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $id=$row['id'];
    $task_name=$row['task_name'];
    $task_description=$row['task_description'];
    $task_due_date=$row['task_due_date'];
    $task_status=$row['task_status'];

if(isset($_POST['edit'])){
  $task_name = $_POST['task_name'];
  $task_description = $_POST['task_description'];
  $task_due_date = $_POST['task_due_date'];
  $task_status = $_POST['task_status'];

  $sql = "UPDATE `task` set id=$id, task_name='$task_name',task_description='$task_description',task_due_date='$task_due_date',task_status='$task_status' where id=$id ";
  
  $result = mysqli_query($con, $sql);
  if ($result) {
    header('Location: index.php');
  } else {
    die(mysqli_error($con));
  }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>To do List</title>
  </head>
  <body>
  
      <div class="container my-5">
           <div class="row"> 
                <div class="col-lg-4 m-auto">
                <form method="post">
                      <div class="form-group">
                          <label >Task name</label>
                          <input type="text" class="form-control" placeholder="Enter your task name" name="task_name" autocomplete="off"
                                    value= <?php echo $task_name; ?>>
                      </div>
                      <div class="form-group">
                          <label >Task Description</label>
                          <input type="text" class="form-control" placeholder="Enter your task Description" name="task_description"  autocomplete="off"
                                  value= <?php echo $task_description; ?>>
                      </div>
                      <div class="form-group">
                          <label >Task Due Date</label>
                          <input type="date" class="form-control" placeholder="Enter your task Due date" name="task_due_date"  autocomplete="off"
                                  value= <?php echo $task_due_date; ?>>
                      </div>
                      <div class="form-group">
                          <label >Task status:</label>       
                          <select class="form-control" name="task_status" value= <?php echo $task_status; ?>>
                                <option>Incomplete</option>
                                <option>In progress</option>
                                <option>Complete</option>
                          </select>
                      </div>                      
                      <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                </form>  
                </div>
            </div>
      </div>
</div>
<?php include('inc/footer.php'); ?>