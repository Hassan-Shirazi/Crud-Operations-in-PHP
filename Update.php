<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$con = mysqli_connect("localhost","root","","crud");

$getId = $_GET['id'];

$Select = "SELECT * FROM `form` where id = $getId";

$data = mysqli_query($con , $Select);

$fetch = mysqli_fetch_assoc($data);

$getName =$fetch['name'];
$getAge = $fetch['age'];
$getPH = $fetch['Ph'];
$getFee = $fetch['fee'];

if(isset($_REQUEST['updateBtn'])){

  $name = $_REQUEST['name'];
  $age = $_REQUEST['age'];
  $ph = $_REQUEST['ph'];
  $fee = $_REQUEST['fee'];

  $query = "UPDATE `form` SET `name`='$name',`age`='$age',`Ph`='$ph',`fee`='$fee' WHERE id = '$getId'";

  mysqli_query($con ,$query);
  header("Location: table.php");
  exit;
}

?>

<div class="container mt-5">
  <h2>Update Record</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $getName ;?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Age</label>
      <input type="number" class="form-control" name="age" value="<?php echo $getAge ;?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Phone Number</label>
      <input type="tel" class="form-control" name="ph" value="<?php echo $getPH; ?>"required>
    </div>

    <div class="mb-3">
      <label class="form-label">Fee Status</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="fee" value="0" <?php echo($getFee == 0 ? "checked" : '');?>>
        <label class="form-check-label">Pay</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="fee" value="1"<?php  echo ($getFee == 1 ? "checked": '');?> >
        <label class="form-check-label">Not Pay</label>
      </div>
    </div>

    <button type="submit" name="updateBtn" class="btn btn-success">Update</button>
    <a href="table.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
