<?php
session_start();
include('includes/head1.php');
include('includes/header1.php');
include('connection.php');
?>

<?php
$uname = $_SESSION['user_name'];

if ($uname == true) {
} else {
  header('location:index.php');
}
?>
<!-- UPDATE `banner` SET `id`='[value-1]',`image`='[value-2]' WHERE 1 -->

<?php
if (isset($_POST['submit'])) {
  $id = $_GET['id'];


  $file = $_FILES['file']["name"];
  $tempname = $_FILES['file']["tmp_name"];
  $folder = 'img/' . $file;
  move_uploaded_file($tempname, $folder);

  $query = mysqli_query($conn, "UPDATE banner set image='$folder' WHERE id='$id'");

  if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='banner.php'; </script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
}
?>




<form action="" method="POST" class="table-padding my-5" enctype="multipart/form-data">
  <h2 style="text-align:center;">Update Banner</h2>

  <?php
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM banner where id='$id'");
  while ($row = mysqli_fetch_array($sql)) {
  ?>
    <div style="text-align:center;" class="product-contant-update">
      <div class="img-img-update">
        <img src="<?php echo $row['image']; ?>" height="200px" width="300px">

      </div>


      <div class="update-product">
        <input type="file" class="" name="file">
      <?php } ?>
      <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
      </div>
    </div>

</form>



<?php include('includes/footer1.php') ?>