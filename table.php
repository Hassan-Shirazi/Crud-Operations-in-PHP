<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Table with Update and Delete Actions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container mt-5">
    <h2>Records Table</h2>

    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Phone Number</th>
          <th>Fee</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      <?php
        // Database connection
        $table_con = mysqli_connect("localhost", "root", "", "crud");

        // Fetch all records
        $s_query = "SELECT * FROM `form`";
        $s_complete = mysqli_query($table_con, $s_query); 

        while($data = mysqli_fetch_assoc($s_complete)) {
          $id = $data['id'];
          $name = $data['name'];
          $age = $data['age'];
          $ph = $data['Ph'];
          $fee = $data['fee'];

          $paid = $fee == 0 ? "Pay" : "Not Pay";

          echo "
            <tr>
              <td>$name</td>
              <td>$age</td>
              <td>$ph</td>
              <td>$paid</td>
              <td>
                
                <form method='post' style='display:inline;'>
               <a href='Update.php?id=$id' class='btn btn-success btn-sm'>Update</a>

                  <input type='hidden' name='btnn' value='$id'>
                  <button type='submit' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</button>
                </form>
              </td>
            </tr>
          ";
        }

        // Handle delete
        if (isset($_POST['btnn'])) {
          $getId = $_POST['btnn'];
          $delsql = "DELETE FROM `form` WHERE id = $getId"; 
          mysqli_query($table_con, $delsql);
          header("Location: table.php");
        }
      ?>

      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
