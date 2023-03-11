<form method="post">
 <label>ID:</label>
    <input type="number" id="ID"><br>
    <label>Task Name:</label>
    <input type="text" name="name"><br>
    <label>Task Description:</label>
    <input type="text" name="desc"><br>
    <label>Task Due Date:</label>
    <input type="date" name="date"><br>
    <label>Status:</label>
   <select name="status">
        <option value="incomplete">Incomplete</option>
        <option value="in progress">In Progress</option>
        <option value="complete">Complete</option>
   </select>

    <br><button type="submit" name="submit" > Submit</button>
    <button> <a href="index.php">Back </button>
<form>
