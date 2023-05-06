<?php
include('connection.php');
session_start();

// Check if the search button is clicked
if(isset($_POST['search'])){
  $task_status = mysqli_real_escape_string($con, $_POST['task_status']);

  // Search query
  $query = "SELECT * FROM `task` WHERE task_status='$task_status'";
  $result = mysqli_query($con, $query);
}
else {
  // Default query
  $query = "SELECT * FROM `task`";
  $result = mysqli_query($con, $query);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <title>To do List</title>
  </head>
  <body>
    <div class="container my-5">
      <div class="row"> 
        <div class="col-lg-4 m-auto">
          <h3>Todo List</h3>          
          <form method="POST" action="">
            <div class="form-group">
              <label for="statusFormControlSelectComplete">Show tasks by status</label>       
              <select class="form-control" id="statusFormControlSelectComplete" name="task_status">
                <option>Incomplete</option>
                <option>In progress</option>
                <option>Complete</option>
              </select>
            </div>                        
            <button type="submit" name="search" class="btn btn-primary">Search</button>
          </form>  
        </div>
      </div>
    </div>
    <div class="container">
      <a href="create.php" class="btn btn-primary my-5">Add Task</a>

      <table class="table">
        <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Due Date</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th> 
        </tr>
        </thead>
        <tbody>
        <?php 
        if(mysqli_num_rows($result) > 0) {
          while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $task_name=$row['task_name'];
            $task_description=$row['task_description'];
            $task_due_date=$row['task_due_date'];
            $task_status=$row['task_status'];
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$task_name.'</td>
            <td>'.$task_description.'</td>
            <td>'.$task_due_date.'</td>
            <td>'.$task_status.'</td>
            <td>
            <button class="btn btn-primary"><a href="edit.php?editid='.$id.'""
            class="text-light"> Edit </a></button>
            <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'"
            class="text-light">Delete</a></button>
            </td>
            </tr>'; 
          }
        } else {
          echo '<tr><td colspan="6">No tasks found</td></tr>';
        }
        ?>
        </tbody>
      </table>
      <div class="container">
        <button type="back" class="btn btn-dark btn-sm" onclick="document.location='create.php'">Back</button>
        <?php include('inc/footer.php'); ?> </div>