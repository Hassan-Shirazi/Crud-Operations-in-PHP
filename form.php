<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form with Bootstrap</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container mt-5">
    <h2>Form Example</h2>
    <form method = "post">
      <!-- Name Input -->
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" name = "name" required>
      </div>

      <!-- Age Input -->
      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" placeholder="Enter your age" name = "age" required>
      </div>

      <!-- Number Input -->
      <div class="mb-3">
        <label for="number" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="number" placeholder="Enter your phone number" name = "ph" required>
      </div>

      <!-- Fee Radio Buttons -->
      <div class="mb-3">
        <label class="form-label">Select Fee</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="fee" id="fee1" value="0" required>
          <label class="form-check-label" for="fee1">Pay</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="fee" id="fee2" value="1">
          <label class="form-check-label" for="fee2">Not Pay</label>
        </div>
      </div>

      <!-- Submit Button -->
      <button name = 'btn' type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



  <?php
     

     $form_con = mysqli_connect("localhost","root","","crud");
   if(isset($_REQUEST['btn'])){
      $name = $_REQUEST['name'];
      $age = $_REQUEST['age'];
      $ph = $_REQUEST['ph'];
      $fee = $_REQUEST['fee'];

      $f_query  = "INSERT INTO `form`(`name`, `age`, `Ph`, `fee`) VALUES ('$name','$age','$ph','$fee')";


     $f_complete = mysqli_query($form_con , $f_query);
       }
  ?>

</body>
</html>
